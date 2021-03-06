<?php

class TransactionsController extends \BaseController {

	/**
	 * Display a listing of transactions
	 *
	 * @return Response
	 */
	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    $this->beforeFilter('auth', array('except' => array()));
	}

	public function index()
	{
		$transactions = Transaction::all();

		return View::make('transactions.index', compact('transactions'));
	}

	/**
	 * Show the form for creating a new transaction
	 *
	 * @return Response
	 */
	public function create()
	{
		$simulations = Simulation::all();
		return  View::make('transactions.create', compact('simulations'));
	}

	/**
	 * Store a newly created transaction in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Transaction::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$transaction = new Transaction();

		$transaction->title = Input::get('title');

		$transaction->user_id = Auth::id();

		$transaction->type = Input::get('type');

		$transaction->amount = Input::get('amount');

		$transaction->frequency = Input::get('frequency');

		$transaction->simulation_id = Input::get('simulation_id');

		$transaction->save();

		// $data['user_id'] = Auth::id();

		// $transaction = Transaction::create($data);

		$newId = $transaction->id;

		$simulation = Simulation::with('transaction')->findOrFail(Input::get('simulation_id'));

		$approx_daily = 0;

		foreach ($simulation->transaction as $transaction) {
			$simplified = 0;
			Log::info($transaction->frequency);
			Log::info($transaction->amount);
			switch($transaction->frequency) {
				case 'monthly':
					$simplified = $transaction->amount * 12 / 365;
					break;
				case 'weekly':
					$simplified = $transaction->amount * 52 / 365;
					break;
				case 'daily':
					$simplified = $transaction->amount;
					break;
			}
			Log::info($simplified);
			if ($transaction->type == 'credit') {
				$approx_daily += $simplified;
			} else {
				$approx_daily -= $simplified;
			}
		}

		$simulation->approx_daily_value = $approx_daily;
	
		$simulation->save();

		$simulations = Simulation::all();

		if (Request::ajax()) {
			return Response::json(array(
				'success' => true,
				'message' => 'New Transaction Added Successfully',
				'approx_daily' => $simulation->approx_daily_value,
				'newId' => $newId
			));
		} else {
			return Redirect::route('simulations.index');
		}
	}

	/**
	 * Display the specified transaction.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$transaction = Transaction::findOrFail($id);

		return View::make('transactions.show', compact('transaction'));
	}

	/**
	 * Show the form for editing the specified transaction.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$transaction = Transaction::find($id);

		return View::make('transactions.edit', compact('transaction'));
	}

	/**
	 * Update the specified transaction in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$transaction = Transaction::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Transaction::$rules);

		$id = $transaction->id;

		if ($validator->fails())
		{
			Log::info($data);
			Log::info($validator->messages()->toJson());
			if (Request::ajax()) {
				return Response::json(array(
					'success' => false,
					'message' => $validator->messages()->toJson()
				));
			} else {
				return Redirect::back()->withErrors($validator)->withInput();
			}
		}


		$transaction->update($data);

		$simulation = Simulation::with('transaction')->findOrFail(Input::get('simulation_id'));

		$approx_daily = 0;
		
		foreach ($simulation->transaction as $transaction) {
						
			switch($transaction->frequency) {
				case 'monthly':
					$simplified = $transaction->amount * 12 / 365;
					break;
				case 'weekly':
					$simplified = $transaction->amount * 52 / 365;
					break;
				case 'daily':
					$simplified = $transaction->amount;
					break;
			}
					
			if ($transaction->type == 'credit') {
				$approx_daily += $simplified;
			} else {
				$approx_daily -= $simplified;
			}
		}

		$simulation->approx_daily_value = $approx_daily;
	
		$simulation->save();

		if(Request::ajax()) {
			Log::info('Update succeeded!');
			return Response::json(array(
				'success' => true,
				'message' => "Transaction $id updated successfully!",
				'id' => $id
			));
		} else {
			return Redirect::route('transactions.index');
		}

	}

	/**
	 * Remove the specified transaction from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted_transaction = Transaction::find($id);

		$simulation = Simulation::with('transaction')->findOrFail($deleted_transaction->simulation_id);

		Transaction::destroy($id);
		
		$approx_daily = 0;
		
		foreach ($simulation->transaction as $transaction) {
						
			switch($transaction->frequency) {
				case 'monthly':
					$simplified = $transaction->amount * 12 / 365;
					break;
				case 'weekly':
					$simplified = $transaction->amount * 52 / 365;
					break;
				case 'daily':
					$simplified = $transaction->amount;
					break;
			}
					
			if ($transaction->type == 'credit') {
				$approx_daily += $simplified;
			} else {
				$approx_daily -= $simplified;
			}
		}

		$simulation->approx_daily_value = $approx_daily;
	
		$simulation->save();

		if (Request::ajax()) {
			return Response::json(array(
				'message' => 'Success!',
				'approx_daily' => $simulation->approx_daily_value
			));
		} else {
			return Redirect::route('transactions.index');
		}
	}
}
