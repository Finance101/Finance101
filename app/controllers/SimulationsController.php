<?php

class SimulationsController extends \BaseController {

	/**
	 * Display a listing of simulations
	 *
	 * @return Response
	 */
	public function index()
	{
		$simulations = Simulation::all();

		return View::make('simulations.index', compact('simulations'));
	}

	/**
	 * Show the form for creating a new simulation
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('simulations.create');
	}

	/**
	 * Store a newly created simulation in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Simulation::$rules);

		$data['user_id'] =  Auth::id();

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Simulation::create($data);

		return Redirect::route('simulations.index');


	}


	/**
	 * Display the specified simulation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$simulation = Simulation::with('transaction')->findOrFail($id);

		return View::make('simulations.show', compact('simulation'));
	}

	/**
	 * Show the form for editing the specified simulation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$simulation = Simulation::with('transactions')->find($id);

		return View::make('simulations.edit', compact('simulation'));
	}

	/**
	 * Update the specified simulation in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$simulation = Simulation::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Simulation::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$simulation->update($data);

		return Redirect::route('simulations.index');

		$approx_daily = 0;
		
		foreach ($user->transaction as $transaction) {
						
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

			$user->approx_daily_change = $approx_daily;

			$user->save();
		}
	}

	/**
	 * Remove the specified simulation from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Simulation::destroy($id);

		return Redirect::route('simulations.index');
	}

}
