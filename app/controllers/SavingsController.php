<?php

class SavingsController extends \BaseController {

	/**
	 * Display a listing of savings
	 *
	 * @return Response
	 */
	public function index()
	{
		$savings = Saving::all();

		return View::make('savings.index', compact('savings'));
	}

	/**
	 * Show the form for creating a new saving
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('savings.create');
	}

	/**
	 * Store a newly created saving in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Saving::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Saving::create($data);

		return Redirect::route('savings.index');
	}

	/**
	 * Display the specified saving.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$saving = Saving::findOrFail($id);

		return View::make('savings.show', compact('saving'));
	}

	/**
	 * Show the form for editing the specified saving.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$saving = Saving::find($id);

		return View::make('savings.edit', compact('saving'));
	}

	/**
	 * Update the specified saving in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$saving = Saving::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Saving::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$saving->update($data);

		return Redirect::route('savings.index');
	}

	/**
	 * Remove the specified saving from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Saving::destroy($id);

		return Redirect::route('savings.index');
	}

}
