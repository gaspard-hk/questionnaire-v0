<?php

class AudittrailController extends BaseController {

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
            $audittrails = AuditTrailList::all();
            return View::make('audittrail.list')->with('audittrails',$audittrails);
        }
        
        public function postDelete()        
        {
            if(Input::get('From') == '') $From = '0000-01-01'; else $From = Input::get('From');
            if(Input::get('To') == '') $To = '9999-12-31'; else $To = Input::get('To');
            AuditTrail::where('created_at', '>=',$From)
                          ->where('created_at','<=',$To)->delete();            
            
            return Redirect::route('audittrail-list');
        }           
        
        public function postDatatable()
        {
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
                Log::info(ini_get('post_max_size'));
                
                $draw = Input::get('draw');
                $start = Input::get('start');
                $length = Input::get('length');
                $searchvalue = Input::get('search')['value'];
                
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
                        
                $orderbydir = Input::get('order')[0]['dir'];
                
                if($searchvalue == ''){
                    $recordq = DB::table('vw_MemberList');
                }else{
                    $recordq = DB::table('vw_MemberList')->where('customername','like','%'.$searchvalue.'%')
                        ->orWhere('customertel','like','%'.$searchvalue.'%')
                        ->orWhere('memberno','like','%'.$searchvalue.'%');
                }
                
                $recordcount = $recordq->count();        
                $countall = MemberList::all()->count();
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
               
                return array(
                        "draw"=> $draw,
                        "recordsTotal"=> $countall,
                        "recordsFiltered"=> $recordcount,
                        "data" => $recordToDT,
                    );
                 
                
        }
        
}
