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

	public function showIndex()
	{
                //return 'Home.';
                //$u = User::get(1);
                //return View::make('layout.template1');
		return Redirect::route('account-signin');
	}
        
        public function showLogin()
        {
                //return 'Home.';
                //return View::make('template1');
                return View::make('layout.template1');
        }
        

        
}
