<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class OnlineController extends BaseController {

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
                //$questionnaires = QuestionnaireList::all();
                return View::make('online.list');//->with('questionnaires',$questionnaires);

	}
        
        public function getEdit()
	{                
                $questionnaire = QuestionnaireList::where('id','=',Input::get('id'))->first()->toArray();
                return View::make('online.edit')->with('questionnaire',$questionnaire);

	}
        
        
        public function postDatatable(){
                /*
                Log::info(Input::get('draw'));
                Log::info(Input::get('start'));
                Log::info(Input::get('length'));
                Log::info(Input::get('search')['value']);
                Log::info(Input::get('order')[0]['column']);
                Log::info(Input::get('order')[0]['dir']);
              */
                $draw = Input::get('draw');
                $start = Input::get('start');
                $length = Input::get('length');
                $searchvalue = Input::get('search')['value'];
                
                $orderbyname = '';
                switch(Input::get('order')[0]['column']){
                    case 0:
                        $orderbyname = 'shopnamechi';
                        break;
                    case 1:
                        $orderbyname = 'staffname';
                        break;
                    case 2:
                        $orderbyname = 'customername';
                        break;
                    case 3:
                        $orderbyname = 'updated_at';
                        break;
                    default:
                        $orderbyname = 'shopnamechi';
                }
                        
                $orderbydir = Input::get('order')[0]['dir'];
                
                if($searchvalue == ''){
                    $recordq = DB::table('vw_questionnairelist');
                }else{
                    $recordq = DB::table('vw_questionnairelist')->where('shopnamechi','like','%'.$searchvalue.'%')
                        ->orWhere('staffname','like','%'.$searchvalue.'%')
                        ->orWhere('customername','like','%'.$searchvalue.'%');
                }
                
                $recordcount = $recordq->count();        
                $countall = QuestionnaireList::all()->count();
                $records = $recordq->skip($start)->take($length)->orderBy($orderbyname,$orderbydir)->get();
                
                $recordToDT = array();
                foreach($records as $recordarr)
                {
                    $recordToDT[] = array(
                        $recordarr->shopnamechi,
                        $recordarr->staffname,
                        $recordarr->customername,
                        $recordarr->updated_at,
                        '<form action="'.URL::route('online-edit').'" method="get">'.
                        '<input type="hidden" name="id" value="'.$recordarr->id.'">'.
			'<input type="submit" value="編輯">'.
			Form::token().
                        '</form>'
                    );
                }
               
                return array(
                        "draw"=> $draw,
                        "recordsTotal"=> $countall,
                        "recordsFiltered"=> $recordcount,
                        "data" => $recordToDT,
                    );
                 
                
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
            /*
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
            }   else {*/
            $questionnaire = Questionnaire::findOrFail(Input::get('id'));
            $questionnaire->shopnamechi = Input::get('shopnamechi');
            $questionnaire->shopnamechi = Input::get('shopnamechi');
            $questionnaire->visiteddate = Input::get('visiteddate');
            $questionnaire->explanation = Input::get('explanation');
            $questionnaire->attitude = Input::get('attitude');
            $questionnaire->sincerity = Input::get('sincerity');
            $questionnaire->manner = Input::get('manner');
            $questionnaire->efficiency = Input::get('efficiency');
            $questionnaire->tidiness = Input::get('tidiness');
            $questionnaire->reception =Input::get('reception');
            $questionnaire->room = Input::get('room');
            $questionnaire->customername = Input::get('customername');
            $questionnaire->customertel = Input::get('customertel');
            $questionnaire->memberno = Input::get('memberno');
            $questionnaire->staffname =Input::get('staffname');
            $questionnaire->comment = Input::get('comment');
                    
            $questionnaire->save();
                
            return Redirect::route('online-list');
        }
        
        public function postDelete(){
            $userid = Auth::id();
            $username = Auth::user()->username;
            $audittrailcreate = AuditTrail::create (array(                    
                    'IP' => Request::getClientIP(),
                    'action' => 'User:'.$username .' (id: '.$userid.') deletes questionnaire '.Input::get('id'), 
            ));
            $delete = Questionnaire::destroy(Input::get('id'));

            if ($delete){
                return Redirect::route('online-list');                
            }
        }
}
