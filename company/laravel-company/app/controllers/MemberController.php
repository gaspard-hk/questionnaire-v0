<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MemberController extends BaseController {

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

                return View::make('member.list');
        }
        
        public function postReset(){
                Member::truncate();                                
                return Redirect::route('member-list');
        }
        
        public function postDeleteEmptyRow(){
                Member::where("memberno",'=','')->forceDelete();
                return Redirect::route('member-list');
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
                            
                //Log::info(ini_get('upload_max_filesize'));
                //ini_set('post_max_size', '5M');
                //Log::info(ini_get('post_max_size'));
                //ini_set("memory_limit","512M");
                $draw = Input::get('draw');
                $start = Input::get('start');
                $length = Input::get('length');
                $searchvalue = Input::get('search')['value'];
                Log::info('membercheckpoint1');
                $orderbyname = '';
                switch(Input::get('order')[0]['column']){
                    case 0:
                        $orderbyname = 'memberno';
                        break;
                    case 1:
                        $orderbyname = 'customername';
                        break;
                    case 2:
                        $orderbyname = 'customertel';
                        break;
                    case 3:
                        $orderbyname = 'updated_at';
                        break;
                    default:
                        $orderbyname = 'memberno';
                }
                //Log::info('membercheckpoint2');
                $orderbydir = Input::get('order')[0]['dir'];
                
                if($searchvalue == ''){
                    $recordq = DB::table('member');
                }else{
                    $recordq = DB::table('member')->where('customername','like','%'.$searchvalue.'%')
                        ->orWhere('customertel','like','%'.$searchvalue.'%')
                        ->orWhere('memberno','like','%'.$searchvalue.'%');
                }
                
                
                $recordcount = $recordq->count();                        
                $countall = MemberList::count();                
                $records = $recordq->skip($start)->take($length)->orderBy($orderbyname,$orderbydir)->get();
                
                
                $recordToDT = array();
                foreach($records as $recordarr)
                {
                    $recordToDT[] = array(
                        $recordarr->memberno,
                        $recordarr->customername,
                        $recordarr->customertel,
                        $recordarr->updated_at,
                    );
                }
                    //Log::info($recordToDT);
                
                return array(
                        "draw"=> $draw,
                        "recordsTotal"=> $countall,
                        "recordsFiltered"=> $recordcount,
                        "data" => $recordToDT,
                    );
                 
                
        }
        
        public function postImport()
        {
            if (Input::hasFile('memberexcelfile')){
                
                $file = Input::file('memberexcelfile');
                $filepath = __DIR__.'/../../uploadfiles/member/';

                $now = new DateTime();                 
                $filename = 'MemberImport-'.$now->format('YmdHis').'.xls';
                $file->move($filepath,$filename);
                ini_set('max_execution_time', 3600);

                $c = Excel::filter('chunk')->load($filepath.$filename)->chunk(100000,  function($reader) {                                        
                    $sheets = $reader->all();
                    
                    $sheetcount = 0;
                    $membercount = 0;
                    $memberArray = array();
                    $nowdatetime = date('Y-m-d H:i:s');
                    foreach ($sheets as $sheet)
                    {                    
                        if ($sheetcount > 0) break;
                        foreach ($sheet as $row){
                            if($membercount % 200 == 0){
                                if ($membercount != 0){
                                    $create = DB::table('member')->insert ($memberArray);
                                    $memberArray = array();                                
                                }
                            }
                            //if ($row[3] = '' && $row[4] = '' && $row[5] = '') break;
                            //if (!is_null($row[3]) && !empty(trim($row[3])) &&  is_numeric($row[3]) && !(strpos($row[3],'-'))){
                            if (!is_null($row[3]) && !empty(trim($row[3]))  ){
                                $customertel = $row[5];
                                if (!is_null($customertel) && is_numeric(str_replace('-','',trim($customertel))))
                                        $custmomertel = str_replace('-','',$customertel);                                
                                    
                                $memberArray[] = array(
                                                'memberno' => trim($row[3]),
                                                'customername' => $row[4],
                                                    
                                                'customertel' => $customertel, 
                                                'created_at' => $nowdatetime,
                                                'updated_at' => $nowdatetime,
                                            );
                            }
                            $membercount++;
                        }
                        $create = DB::table('member')->insert($memberArray);
                        $sheetcount ++;
                    }
                                       
                });
                return  Redirect::route('member-list');
             }
        }
}
