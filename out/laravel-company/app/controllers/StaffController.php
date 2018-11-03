<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class StaffController extends BaseController {

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
                $staffs = StaffList::all();
                return View::make('staff.list')->with('staffs',$staffs);
        }
        
        public function postImport()
        {
            if (Input::hasFile('staffexcelfile')){
                //return '1';
                $file = Input::file('staffexcelfile');
                $filepath = __DIR__.'/../../uploadfiles/staff/';
                
                $now = new DateTime();                 
                $filename = 'staffImport-'.$now->format('YmdHis').'.xls';
                $file->move($filepath,$filename);
                
                Staff::truncate();
                $c = Excel::load($filepath.$filename, function($reader) {                                        
                    $reader->noHeading();
                    //var_dump($reader);
                    $sheets = $reader->all();
                    
                    $sheetcount = 0;
                    $staffcount = 0;
                    foreach ($sheets as $sheet)
                    {
                        if ($sheetcount > 0) break;
                        foreach ($sheet as $row){
                            if($staffcount > 0){
                                //Log::info('row[1] = '.$row[1]); 
                                //update
                                $staff = Staff::where('staffname', '=',$row[2])->first();
                                if (is_null($staff)){
                                //    Log::info('Insert begins'); 
                                    $create = Staff::create (array(
                                        'staffname' => $row[2],
                                        'shopname' => $row[3]
                                    ));
                                
                                }else{                                
                                    $staff->staffname = $row[2];
                                    $staff->shopname = $row[3];                                    
                                    $staff->save();                                
                                }
                                
                            }                            
                            $staffcount++;
                        }
                        $sheetcount ++;
                    }
                                       
                })->get();
                 
                return  Redirect::route('staff-list');
             }
        }
}
