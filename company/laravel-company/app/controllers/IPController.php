<?php

class IPController extends BaseController {

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
        public function getList()
	{       
            $ipfilters = IPFilterList::all();
                
            $ipfiltersset =  Setting::where('Key','=','ipfilter')->first()->toArray();

            return View::make('ipfilter.list',array(
                'ipfilters' => $ipfilters,
                'ipfiltersset' => $ipfiltersset
            ));
	}   
        
        public function getIP()
        {
                return View::make('ipfilter.checkip');
        }
        public function postSet(){
            $userid = Auth::id();
            $username = Auth::user()->username;
            $audittrailcreate = AuditTrail::create (array(                    
                'IP' => Request::getClientIp(),
                'action' => 'User:'.$username.'(id: '.$userid.') set IP filter '.Input::get('setting'), 
            )); 
                
            $ipfilter = Setting::where('Key','=','ipfilter')->first();
            $ipfilter->Value = Input::get('setting');
            $ipfilter->save();
            return Redirect::route('ipfilter-list');
        }
        
        public function postCreate(){
            $userid = Auth::id();
            $username = Auth::user()->username;
            $audittrailcreate = AuditTrail::create (array(                    
                'IP' => Request::getClientIp(),
                'action' => 'User:'.$username.'(id: '.$userid.') creates IP filter '.Input::get('ipfilter'), 
            ));
            
            $ipfilter = Input::get('ipfilter');
                
            $validator = Validator::make(Input::all(),
                    array(                                                
                        'ipfilter' => 'required'
                    )
            );
            
            if($validator->fails())
            {
                //return '1';
                return Redirect::route('ipfilter-list')
                        ->withErrors($validator)
                        ->withInput();
            }   else {
                $create = IPFilter::create (array(
                   'ip' => Input::get('ipfilter'),                    
                ));
            }    
                if ($create){
                    return Redirect::route('ipfilter-list');
                }
        }
        
        public function postDelete(){
                $userid = Auth::id();
                $username = Auth::user()->username;
                $audittrailcreate = AuditTrail::create (array(                    
                    'IP' => Request::getClientIp(),
                    'action' => 'User:'.$username.'(id: '.$userid.')  deletes IP filter '.Input::get('id'), 
                ));
                $id = Input::get('id');

                $delete = IPFilter::destroy($id);
                
                if ($delete){
                    return Redirect::route('ipfilter-list');
                            
                }else{
                    //error message;
                }
        }
}


