<?php

class AccountController extends BaseController {

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
		return Redirect::route('account-signin');
	}
        
        public function getSignin()
        {
            return View::make('account.signin');
        }
        
        public function postSignin()
        {
            $validator = Validator::make(Input::all(),
                    array(
                        'username' => 'required',
                        'password' => 'required'
                    )
            );
                        
            if($validator->fails())
            {
                //return '1';
                return Redirect::route('account-signin')
                        ->withErrors($validator)
                        ->withInput();
            }   else {
                
                $count = FailLoginCount::where('IP', '=',Request::getClientIp())->count();                
                if($count > 2) {
                    return Redirect::route('account-signin')
                        ->withErrors(array('password' => 'Tried 3 times. Please wait 15 mins'))
                        ->withInput();
                }

                $auth = Auth::attempt(array(
                    'username' => Input::get('username'),
                    'password' => Input::get('password')                    
                ));
                
                
                if($auth){
                    $userid = Auth::id();
                    $type = UsersList::where('id', $userid)->first()['type'];
                    Session::set('usertype', $type); 
                    $username = Auth::user()->username;
                    $audittrailcreate = AuditTrail::create (array(                    
                        'IP' => Request::getClientIp(),
                        'action' => 'User:'.$username.'('.$userid.') Login '.Input::get('username'), 
                    ));
                    
                    $faillogin = FailLogin::where('IP','=',Request::getClientIp())->delete();
                    return Redirect::intended('/admin');
                }else{
                    $audittrailcreate = AuditTrail::create (array(                    
                        'IP' => Request::getClientIp(),
                        'action' => 'Login fail', 
                    ));
                    $faillogin = FailLogin:: create(array(
                         'IP' => Request::getClientIp()
                    ));
                    return Redirect::route('account-signin')
                        ->withErrors(array('password' => 'Account/Password incorrect.'))
                        ->withInput();
                }
            }
            return View::make('account.signin-error');
                
        }
        
        public function getSignOut()
        {
            Auth::logout();
            return Redirect::route('account-signin');            
        }

        public function getCreate()
        {
            
            return View::make('account.create');
        }
        
        public function getCreateNoUser()
        {
            
            return View::make('account.create-nouser');
        }
        
        public function postCreate()
        {
                $userid = Auth::id();
                $username = Auth::user()->username;
                $audittrailcreate = AuditTrail::create (array(                    
                    'IP' => Request::getClientIp(),
                    'action' => 'User:'.$username.'(id: '.$userid.') Create user account '.Input::get('username'), 
                ));  
                
            $validator = Validator::make(Input::all(),
                    array(
                        //'username' => 'required|unique:users',
                        'username' => 'required|unique:users,deleted_at,NULL',
                        'password' => 'required'
                    )
            );
            
            if($validator->fails())
            {
                //return '1';
                return Redirect::route('account-list')
                        ->withErrors($validator)
                        ->withInput();
            }   else {
                $create = User::create (array(
                    'username'   => Input::get('username'),
                    'type'       => Input::get('type'),
                    'password'  => Hash::make( Input::get('password') ),
                    'active' => '1'
                ));
                
                if ($create){
                    $users = UsersList::all();
                    
                    return View::make('account.list')->with('users', $users);
                    //return Redirect::route('test')
                            
                }
                /*
                $userObj = new User;
                $userObj->username = Input::get('username');
                $userObj->password = Input::get('password');
                $userObj->save();
                 * 
                 */
            }            
            
            return View::make('account.signin');
        }
        
        public function postCreateNoUser()
        {
                //return  'Request::getClientIp();                
                $audittrailcreate = AuditTrail::create (array(                    
                    'IP' => Request::getClientIp(),
                    'action' => 'Special user creates user account '.Input::get('username'), 
                ));  
                
            $validator = Validator::make(Input::all(),
                    array(
                        //'username' => 'required|unique:users',
                        'username' => 'required|unique:users,deleted_at,NULL',
                        'type'       => Input::get('type'),
                        'password' => 'required'
                    )
            );
            
            if($validator->fails())
            {
                //return '1';
                return Redirect::route('account-list')
                        ->withErrors($validator)
                        ->withInput();
            }   else {
                $create = User::create (array(
                   'username' => Input::get('username'),
                    'password' => Hash::make( Input::get('password') ),
                        'active' => '1'
                ));
                
                if ($create){
                    $users = UsersList::all();
                    
                    return View::make('account.list')->with('users', $users);
                    //return Redirect::route('test')
                            
                }
                /*
                $userObj = new User;
                $userObj->username = Input::get('username');
                $userObj->password = Input::get('password');
                $userObj->save();
                 * 
                 */
            }            
            
            return View::make('account.signin');
        }
        
        public function getList()
        {
            
                //return 'Home.';
                //return View::make('template1');
                //$user = User::find(1);
                //$user = '1'; //
                //$user =  User::find(0);
                //return View::make('login');
            $users = UsersList::all();
            
            return View::make('account.list')->with('users', $users);
        }
        
        public function postDelete(){
                
                $userid = Auth::id();
                $username = Auth::user()->username;
                $audittrailcreate = AuditTrail::create (array(                    
                    'IP' => Request::getClientIP(),
                    'action' => 'User:'.$username .' (id: '.$userid.') deletes user id '.Input::get('id'), 
                ));  
                $delete = User::destroy(Input::get('id'));
                
                if ($delete){
                    $users = UsersList::all();
                    
                    return View::make('account.list')->with('users', $users);
                    //return Redirect::route('test')
                            
                }else{
                    //error message;
                }
                
        }
        
        public function postDeleteNoUser(){                
                $audittrailcreate = AuditTrail::create (array(                    
                    'action' => 'Special user deletes user id '.Input::get('id'), 
                ));  
                $delete = User::destroy(Input::get('id'));
                
                if ($delete){
                    $users = UsersList::all();
                    
                    return View::make('account.list')->with('users', $users);
                    //return Redirect::route('test')
                            
                }else{
                    //error message;
                }
                
        }

        
        public function getEdit()
        {
            return Redirect::route('admin');
        }
        public function postEdit()
        {
            $user = UsersList::where('id','=',Input::get('id'))->first()->toArray();
                    
            return View::make('account.edit')->with('user', $user);
        }

        public function postModify()
        {
            $userid = Input::get('id');
            /*
            $audittrailcreate = AuditTrail::create (array(                    
                'IP' => Request::getClientIp(),
                'action' => 'User:'.$username.'('.$userid.') Modify user account '.Input::get('username'), 
            ));  
             * 
             */
            
            $validator = Validator::make(Input::all(),
                    array(                        
                        'oldpassword' => 'required',
                        'password' => 'required',
                        'repassword' => 'required'                        
                    )
            );
            
            if($validator->fails())
            {                      
                return Redirect::route('account-edit-post')
                        ->with('id',$userid);
            }   else {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make(Input::get('password'));
                $user->type = Input::get('type');
                $user->save();
                
                $users = UsersList::all();
                    
                return View::make('account.list')->with('users', $users);
            }
            
            return View::make('account.list');
        }
}
