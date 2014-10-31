<?php

class SimulationsController extends \BaseController {

	public function __construct()
	{
		// call base controller constructor
		parent::__construct();

		// run auth filter before all methods on this controller except index and show
		$this->beforeFilter('auth', array('except' => array()));
	}
	/**
	 * Display a listing of simulations
	 *
	 * @return Response
	 */	

	public function index()
	{
		$simulations = Simulation::with('user')->where('user_id', Auth::id())->get();

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

		$newSimulation = Simulation::create($data);

		if (Request::ajax()) {
			return Response::json(array(
				'success' => true,
				'message' => '',
				'sim_id' => $newSimulation->id
			));
		} else {
			return Redirect::route('simulations.index');
		}

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

		if(Request::ajax()) {
			$response_array = [];
			foreach ($simulation->transaction as $key => $transaction) {
				
			}
			Response::json($response_array);
		} else {
			return View::make('simulations.show', compact('simulation'));
		}

	}

	/**
	 * Show the form for editing the specified simulation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$simulation = Simulation::with('transactions', 'user')->find($id);

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
