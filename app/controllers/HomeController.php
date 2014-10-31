<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showGetStarted');
	|
	*/
	public function showGetStarted()
	{
		return View::make('getStarted');
	}

	public function createFirstBudget()
	{
		// create a new budget
		// create a transaction for that budget
		// redirec to show for new budget
	}

	public function showWelcome()
	{
			return View::make('hello');
	}

	
}



