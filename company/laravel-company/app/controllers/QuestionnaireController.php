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
        
        public function postQ2()
        {
            $shops_id = Input::get('shops_id');
            $number_of_staff = Input::get('number_of_staff');
            $inputmethod = Input::get('inputmethod');
            if ($inputmethod == 'same'){
                for ($i = 1; $i <= $number_of_staff; $i++){
                    $valid = $this->validateQ2(1);
                    if ($valid){
                        $staffname = Input::get('staffname'.$i);
                        $create = Questionnaire::create (array(
                            'shops_id'                  => Input::get('shops_id'),
                            'shopnamechi'               => Input::get('shopnamechi'),
                            'visiteddate'               => Input::get('visiteddate'),
                            'customername'              => Input::get('customername'),
                            'customertel'               => Input::get('customertel'),
                            'memberno'                  => Input::get('memberno'),
                            'staffname'                 => $staffname,
                            'type'                      => Input::get('type'.$i),
                            'lifeexplanation'           => Input::get('lifeexplanation1'),
                            'lifetechnique'             => Input::get('lifetechnique1'),
                            'lifecomfort'               => Input::get('lifecomfort1'),
                            'lifecourtesy'              => Input::get('lifecourtesy1'),
                            'lifeefficiency'            => Input::get('lifeefficiency1'),
                            'lifeappearance'            => Input::get('lifeappearance1'),
                            'medicalprofessionalism'    => Input::get('medicalprofessionalism1'),
                            'medicaltechnique'          => Input::get('medicaltechnique1'),
                            'medicalattitude'           => Input::get('medicalattitude1'),
                            'medicalexplanation'        => Input::get('medicalexplanation1'),
                            'callcourtesy'              => Input::get('callcourtesy1'),
                            'callexplanation'           => Input::get('callexplanation1'),
                            'callefficiency'            => Input::get('callefficiency1'),
                            'reception'                 => Input::get('reception1'),
                            'room'                      => Input::get('room1'),
                            'comment'                   => Input::get('comment1'),
                            'IP'                        => Request::getClientIP()
                        ));
                    }else{
                        return View::make('questionnaire.q-error');                        
                    }
                }
                return View::make('questionnaire.q3');
            }elseif ($inputmethod == 'different'){
                for ($i = 1; $i <= $number_of_staff; $i++){
                    $valid = $this->validateQ2($i);
                    if ($valid){
                        $create = Questionnaire::create (array(
                            'shops_id'                  => Input::get('shops_id'),
                            'shopnamechi'               => Input::get('shopnamechi'),
                            'visiteddate'               => Input::get('visiteddate'),
                            'customername'              => Input::get('customername'),
                            'customertel'               => Input::get('customertel'),
                            'memberno'                  => Input::get('memberno'),
                            'staffname'                 => Input::get('staffname'.$i),
                            'type'                      => Input::get('type'.$i),
                            'lifeexplanation'           => Input::get('lifeexplanation'.$i),
                            'lifetechnique'             => Input::get('lifetechnique'.$i),
                            'lifecomfort'               => Input::get('lifecomfort'.$i),
                            'lifecourtesy'              => Input::get('lifecourtesy'.$i),
                            'lifeefficiency'            => Input::get('lifeefficiency'.$i),
                            'lifeappearance'            => Input::get('lifeappearance'.$i),
                            'medicalprofessionalism'    => Input::get('medicalprofessionalism'.$i),
                            'medicaltechnique'          => Input::get('medicaltechnique'.$i),
                            'medicalattitude'           => Input::get('medicalattitude'.$i),
                            'medicalexplanation'        => Input::get('medicalexplanation'.$i),
                            'callcourtesy'              => Input::get('callcourtesy'.$i),
                            'callexplanation'           => Input::get('callexplanation'.$i),
                            'callefficiency'            => Input::get('callefficiency'.$i),
                            'reception'                 => Input::get('reception'.$i),
                            'room'                      => Input::get('room'.$i),
                            'comment'                   => Input::get('comment'.$i),
                            'IP'                        => Request::getClientIP()
                        ));
                    }else{
                        return View::make('questionnaire.q-error');
                    }                    
                }
                return View::make('questionnaire.q3');
            }else{
                return View::make('questionnaire.q-error');
            }
        }
        
        
        private function validateQ2($no)
        {
            $validator1 = Validator::make(Input::all(),
                array(
                    'shops_id'                      => 'required',
                    'visiteddate'                   => 'required',
                    'type'.$no                      => 'required',
                    'callcourtesy'.$no              => 'required',
                    'callexplanation'.$no           => 'required',
                    'callefficiency'.$no            => 'required',
                    'reception'.$no                 => 'required',
                    'room'.$no                      => 'required'
                )
            );
            
            if (Input::get('type'.$no) == 'life'){
                $validator2 = Validator::make(Input::all(),
                    array(
                        'lifeexplanation'.$no           => 'required',
                        'lifetechnique'.$no             => 'required',
                        'lifecomfort'.$no               => 'required',
                        'lifecourtesy'.$no              => 'required',
                        'lifeefficiency'.$no            => 'required',
                        'lifeappearance'.$no            => 'required',
                    )
                );
            }elseif (Input::get('type'.$no) == 'medical'){
                $validator2 = Validator::make(Input::all(),
                    array(
                        'medicalprofessionalism'.$no    => 'required',
                        'medicaltechnique'.$no          => 'required',
                        'medicalattitude'.$no           => 'required',
                        'medicalexplanation'.$no        => 'required',
                    )
                );
            }else{
                $validator2 = false;
            }
            
            return $validator1 && $validator2;
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


