<?php

class GoalsController extends \BaseController {

	/**
	 * Display a listing of goals
	 *
	 * @return Response
	 */
	public function index()
	{
		$goals = Goal::all();

		return View::make('goals.index', compact('goals'));
	}

	/**
	 * Show the form for creating a new goal
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('goals.create');
	}

	/**
	 * Store a newly created goal in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Goal::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Goal::create($data);

		return Redirect::route('goals.index');
	}

	/**
	 * Display the specified goal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$goal = Goal::findOrFail($id);

		return View::make('goals.show', compact('goal'));
	}

	/**
	 * Show the form for editing the specified goal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$goal = Goal::find($id);

		return View::make('goals.edit', compact('goal'));
	}

	/**
	 * Update the specified goal in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$goal = Goal::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Goal::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$goal->update($data);

		return Redirect::route('goals.index');
	}

	/**
	 * Remove the specified goal from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Goal::destroy($id);

		return Redirect::route('goals.index');
	}

}
