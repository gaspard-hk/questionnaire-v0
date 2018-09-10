<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminController extends BaseController {

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

	public function getAdmin()
	{
                //return 'Home.';
                //$u = User::get(1);
                return View::make('admin.welcome');
		//return Redirect::route('account-signin');
	}
        
        public function getShops()
        {
                return View::make('admin.shop');
        }
        
        public function getStatistic()
	{
                return View::make('admin.statistic');

	}
        
        public function getStatisticOnline()
	{
                return View::make('admin.statistic-online');

	}       

        
}
