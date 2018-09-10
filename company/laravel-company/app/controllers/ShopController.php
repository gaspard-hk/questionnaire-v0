<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ShopController extends BaseController {

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

        public function getlist()
        {
                $shops = ShopList::all();
                return View::make('shop.list')->with('shops',$shops);
        }
        
        public function postDelete()
        {
                $userid = Auth::id();
                $audittrailcreate = AuditTrail::create (array(
                    'IP' => Request::getClientIp(),
                    'action' => $userid.' deletes shop '.Input::get('id'), 
                ));  
                $delete = Shop::destroy(Input::get('id'));
                
                if ($delete){
                    $row = 1;
                    $shops = Shop::all();
                    foreach($shops as $shoparr){
                    $shoparr->position = $row;
                    $shoparr->save();
                    $row++;
                }
                return Redirect::route('shops-list');
                            
                }else{
                    //error message;
                }
                return Redirect::route('shops-list');
        }
        
        public function postUp()
        {
                $userid = Auth::id();
                $audittrailcreate = AuditTrail::create (array(
                    'IP' => Request::getClientIp(),
                    'action' => $userid.' moves up shop '.Input::get('id'), 
                ));  
                $shop = Shop::where('id','=',Input::get('id'))->first();                
                $shopup = Shop::where('position','<',$shop->position)->orderBy('position','DESC')->first();
                
                if (!is_null($shopup)){
                    $tempposition = $shopup->position;
                    $shopup->position = $shop->position;
                    $shop->position = $tempposition;
                    $shop->save();
                    $shopup->save();
                }
                return Redirect::route('shops-list');
        }
        
        public function postDown()
        {
                $userid = Auth::id();
                $audittrailcreate = AuditTrail::create (array(
                    'IP' => Request::getClientIp(),
                    'action' => $userid.' moves down shop '.Input::get('id'), 
                ));  

                $shop = Shop::where('id','=',Input::get('id'))->first();                
                $shopdown = Shop::where('position','>',$shop->position)->orderBy('position','ASC')->first();
                
                if (!is_null($shopdown)){
                    $tempposition = $shopdown->position;
                    $shopdown->position = $shop->position;
                    $shop->position = $tempposition;
                    $shop->save();
                    $shopdown->save();
                }
                return Redirect::route('shops-list');
        }
        
        
        
        
        public function postCreate()
        {
            
            $userid = Auth::id();
                $audittrailcreate = AuditTrail::create (array(
                    //'userid' => $userid,
                    'IP' => Request::getClientIp(),
                    'action' => 'Create shop '.Input::get('shopnamechi'), 
                ));  
                
            $validator = Validator::make(Input::all(),
                    array(
                        //'username' => 'required|unique:users',
                        'shopnamechi' => 'required',
                       
                    )
            );
            
            $position = DB::table('shops')->max('position') + 1;
            
            if($validator->fails())
            {                
                return Redirect::route('shops-list')
                        ->withErrors($validator)
                        ->withInput();
            }   else {               
                $create = Shop::create (array(
                   'shopnamechi' => Input::get('shopnamechi'),
                    'position' => $position
                   //'shopnameeng' => Input::get('shopnameeng'),
                   //'shopnamejap' => Input::get('shopnamejap')
                ));
                
                if ($create){
                    $shops = ShopList::all();
                    
                    return View::make('shop.list')->with('shops', $shops);
                }

            }            
            
            return View::make('account.signin');
        }
}
