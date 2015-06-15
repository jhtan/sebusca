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
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
    {
        $lost = Lost::all();
        $state = new State();
        $state = State::all();
        return View::make('home', ['lost' => $lost, 'state' => $state]);

//		return View::make('hello');
	}

}
