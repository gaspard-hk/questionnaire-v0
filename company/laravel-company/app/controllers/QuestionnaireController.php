<?php

class QuestionnaireController extends BaseController {

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

	public function getQuestionnaire()
	{                
                return Redirect::route('questionnaire-q1');
	}
        
        public function getQ1()
        {
            $ipfilter = Setting::where('Key','=','ipfilter')->first();
            if(!is_null($ipfilter))
                if ($ipfilter->toArray()['Value'] == 'Y'){
                    if (is_null(IPFilter::where('ip','=',Request::getClientIP())->first()) ){
                      return Response::make('Unauthorized', 401);
                    } 
                }
             
            $staffs = StaffList::all()->toArray();
            $shops = ShopList::all()->toArray();
            return View::make('questionnaire.q1')
                    ->with('shops',$shops)
                    ->with('staffs',$staffs);
        }
        
        public function postQ1()
        {            
            $validator = Validator::make(Input::all(),
                    array(
                        'shops_id' => 'required',
                        'visiteddate' => 'required',
//                       'staffname' => 'required'
                    )
            );
                        
            if($validator->fails())
            {                
                return View::make('questionnaire.q-error');
            } else {
                $shop = Shop::where('id','=',Input::get('shops_id'))->first()->toArray();
                $number_of_staff = Input::get('number_of_staff');
                $inputmethod = Input::get('inputmethod');
                if($inputmethod == 'same'){
                    $number_of_form = 1;
                }elseif($inputmethod == 'different'){
                    $number_of_form = $number_of_staff;
                }else{
                    return View::make('questionnaire.q-error');
                }
                
                $staffname = array();
                $number_of_staff = Input::get('number_of_staff');

                for ($i = 1; $i <= $number_of_staff; $i++){
                    $staffname[$i] = Input::get('staffname'.$i );
                }
                
                return View::make('questionnaire.q2')
                ->with('shop',$shop)
                ->with('shops_id', Input::get('shops_id'))
                ->with('visiteddate', Input::get('visiteddate'))
                ->with('number_of_staff', $number_of_staff)
                ->with('number_of_form', $number_of_form)
                ->with('staffname', $staffname)
                ->with('inputmethod', $inputmethod);
            
                //return View::make('questionnaire.q2')                                                
                /*
                return Redirect::route('questionnaire-q2',array(
                        'shop' =>$shop,
                        'shops_id' =>Input::get('shops_id'),
                        'visiteddate' =>Input::get('visiteddate'),
                        'staffname' => Input::get('staffname')));*/
                         
            }
            return View::make('questionnaire.q-error');
            
                
        }
        
        
        public function postQ2single()
        {            
            $validator = Validator::make(Input::all(),
                    array(
                        'shops_id'        => 'required',
                        'visiteddate'   => 'required',
                        'explanation'   => 'required',
                        'attitude'      => 'required',
                        'sincerity'     => 'required',
                        'manner'        => 'required',
                        'efficiency'    => 'required',
                        'tidiness'      => 'required',
                        'reception'     => 'required',
                        'room'          => 'required'						
                    )
            );
                        
            if($validator->fails())
            {                
                return View::make('questionnaire.q-error');
            }   else { 
                //return  Input::get('visiteddate');
                $create1 = Questionnaire::create (array(
                    'shops_id'         => Input::get('shops_id'),
                    'shopnamechi'         => Input::get('shopnamechi'),
                    'visiteddate'    => Input::get('visiteddate'),
                    'explanation' => Input::get('explanation'),
                    'attitude' => Input::get('attitude'),
                    'sincerity' => Input::get('sincerity'),
                    'manner' => Input::get('manner'),
                    'efficiency' => Input::get('efficiency'),
                    'tidiness' => Input::get('tidiness'),
                    'reception' =>Input::get('reception'),
                    'room' => Input::get('room'),
                    'customername' => Input::get('customername'),
                    'customertel' => Input::get('customertel'),
                    'memberno' => Input::get('memberno'),
                    'staffname' =>Input::get('staffname'),
                    'comment' => Input::get('comment'),
                    'IP' => Request::getClientIP()
                ));
                
                
                /*
                $queries = DB::getQueryLog();
                $last_query = end($queries);
                return $last_query;
                 * 
                 */
                return View::make('questionnaire.q3');
            }
            return View::make('questionnaire.q-error');
                        
                
        }
        
        public function postQ2()
        {
            $shops_id = Input::get('shops_id');
            $number_of_staff = Input::get('number_of_staff');
            $inputmethod = Input::get('inputmethod');
            if ($inputmethod == 'same'){
                for ($i = 1; $i <= $number_of_staff; $i++){
                    $valid = validateQ2($i);
                    if ($valid){
                        Input::get('staffname'.$i);
                    }else{
                        return View::make('questionnaire.q-error');                        
                    }
                }
            }elseif ($inputmethod == 'different'){
                for ($i = 1; $i <= $number_of_staff; $i++){
                    $valid = validateQ2($i);
                    if ($valid){
                        Input::get('staffname'.$i);
                    }else{
                        return View::make('questionnaire.q-error');
                    }                    
                }
            }else{
                return View::make('questionnaire.q-error');
            }
        }
        
        
        private function validateQ2($no)
        {
            /*
            $validator = Validator::make(Input::all(),
                array(
                    'shops_id'                      => 'required',
                    'visiteddate'                   => 'required',
                    'type'.$no                      => 'required',
                    'lifeexplanation'.$no           => 'required',
                    'lifetechnique'.$no             => 'required',
                    'lifecomfort'.$no               => 'required',
                    'lifecourtesy'.$no              => 'required',
                    'lifeefficiency'.$no            => 'required',
                    'lifeappearance'.$no            => 'required',
                    'medicalprofessionalism'.$no    => 'required',
                    'medicalexplanation'.$no        => 'required',
                    'medicalattitude'.$no           => 'required',
                    'medicalexplanation'.$no        => 'required',
                    'callcourtesy'.$no              => 'required',
                    'callexplanation'.$no           => 'required',
                    'callefficiency'.$no            => 'required',
                    'reception'.$no                 => 'required',
                    'room'.$no                      => 'required'
                )
            );
            */
            $validator = true;
            return $validator;
        }
        
        
        
        
        public function postQ2different()
        {            
            $validator = Validator::make(Input::all(),
                    array(
                        'shops_id'                  => 'required',
                        'visiteddate'               => 'required',
                        'type'                      => 'required',
                        'lifeexplanation'           => 'required',
                        'lifetechnique'             => 'required',
                        'lifecomfort'               => 'required',
                        'lifecourtesy'              => 'required',
                        'lifeefficiency'            => 'required',
                        'lifeappearance'            => 'required',
                        'medicalprofessionalism'    => 'required',
                        'medicalexplanation'        => 'required',
                        'medicalattitude'           => 'required',
                        'medicalexplanation'        => 'required',
                        'callcourtesy'              => 'required',
                        'callexplanation'           => 'required',
                        'callefficiency'            => 'required',
                        'reception'                 => 'required',
                        'room'                      => 'required'
                    )
            );
                        
            if($validator->fails())
            {                
                return View::make('questionnaire.q-error');
            }   else { 
                //return  Input::get('visiteddate');
                $create1 = Questionnaire::create (array(
                    'shops_id'         => Input::get('shops_id'),
                    'shopnamechi'         => Input::get('shopnamechi'),
                    'visiteddate'    => Input::get('visiteddate'),                    
                    'customername' => Input::get('customername'),
                    'customertel' => Input::get('customertel'),
                    'memberno' => Input::get('memberno'),
                    
                    
                    'explanation' => Input::get('explanation1'),
                    'attitude' => Input::get('attitude1'),
                    'sincerity' => Input::get('sincerity1'),
                    'manner' => Input::get('manner1'),
                    'efficiency' => Input::get('efficiency1'),
                    'tidiness' => Input::get('tidiness1'),
                    'reception' =>Input::get('reception1'),
                    'room' => Input::get('room1'),
                    
                    'staffname' =>Input::get('staffname1'),
                    'comment' => Input::get('comment1'),
                    'IP' => Request::getClientIP()
                ));
                
                $create2 = Questionnaire::create (array(
                    'shops_id'         => Input::get('shops_id'),
                    'shopnamechi'         => Input::get('shopnamechi'),
                    'visiteddate'    => Input::get('visiteddate'),
                    'customername' => Input::get('customername'),
                    'customertel' => Input::get('customertel'),
                    'memberno' => Input::get('memberno'),                    
                    
                    
                    'explanation' => Input::get('explanation2'),
                    'attitude' => Input::get('attitude2'),
                    'sincerity' => Input::get('sincerity2'),
                    'manner' => Input::get('manner2'),
                    'efficiency' => Input::get('efficiency2'),
                    'tidiness' => Input::get('tidiness2'),
                    'reception' =>Input::get('reception2'),
                    'room' => Input::get('room2'),
                    
                    
                    'staffname' =>Input::get('staffname2'),
                    'comment' => Input::get('comment2'),
                    'IP' => Request::getClientIP()
                ));
                /*
                $queries = DB::getQueryLog();
                $last_query = end($queries);
                return $last_query;
                 * 
                 */
                return View::make('questionnaire.q3');
            }
            return View::make('questionnaire.q-error');
                        
                
        }
        public function getQ2MemberNoCheckAjax(){

        }
        
        public function postQ2MemberNoCheckAjax(){
            
            
            $memberinfo = MemberList::where('memberno','=',Input::get('memberno'));
            /*
            if(is_null($memberinfo->first())){
                return Response::json(array('customername' => '', 'customertel' => ''));
            }else{                
                return Response::json(array('customername' => $memberinfo->first()->customername, 'customertel' =>  $memberinfo->first()->customertel));
            }
            */
            
            return $memberinfo->get()->toJson();
        }
        public function postQ2CustomerTelCheckAjax(){
            $memberinfo = MemberList::where('customertel','=',Input::get('customertel'));
            return $memberinfo->get()->toJSON();
        }

        
}


