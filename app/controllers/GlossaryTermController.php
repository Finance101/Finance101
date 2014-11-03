<?php

class GlossaryTermController extends \BaseController {

	/**
	 * Display a listing of goals
	 *
	 * @return Response
	 */
	public function index()
	{
		$glossaryterm = Glossaryterm::all();

		return View::make('glossaryterm.index')->with('glossaryterm', $glossaryterm);
	}

	/**
	 * Show the form for creating a new goal
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created goal in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


	}

	/**
	 * Display the specified goal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		

		return View::make('glossaryterm.show');
	}

	/**
	 * Show the form for editing the specified goal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	}

	/**
	 * Update the specified goal in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}

	/**
	 * Remove the specified goal from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}

}