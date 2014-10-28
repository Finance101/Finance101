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

		$simulations = Simulation::all();

		return Redirect::route('simulations.index');
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

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$transaction->update($data);

		return Redirect::route('transactions.index');
	}

	/**
	 * Remove the specified transaction from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Transaction::destroy($id);

		return Redirect::route('transactions.index');
	}

}
