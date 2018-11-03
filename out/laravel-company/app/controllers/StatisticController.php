<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class StatisticController extends BaseController {

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

        public function getExport()
	{
                return View::make('statistic.export');

	}
        
        public function postExportReport1()
        {
            Excel::create('Statistic_'.Input::get('From') .'_'.Input::get('To') , function($excel) {
                $excel->sheet('All Records', function($sheet) {
                    if(Input::get('From') == '') $From = '0000-01-01'; else $From = Input::get('From');
                    if(Input::get('To') == '') $To = '9999-12-31'; else $To = Input::get('To');
                    $questionnairearray = QuestionnaireStatistic::
                                        where('惠顧日期', '>=',$From)
                                        ->where('惠顧日期','<=',$To)->get()->toArray();
                    $sheet->fromArray($questionnairearray);
                });                 
            })->export('xlsx');            
        }
        
        public function postExportReport2(){

            //$report_model[1] = new ReflectionClass('StatisticReport1Sheet1');
            
            Excel::create('ShopStatistic_'.Input::get('year') .'_'.Input::get('month') , function($excel) {
                $report_names = array();
                $report_names[1] = 'Life Report';
                $report_names[2] = 'Medical Report';
                $report_names[3] = 'Call Centre Report';
                $report_names[4] = 'General Report';
                
                for($i = 1; $i <= 4; $i++){
                    $excel->sheet($report_names[$i], function($sheet) use ($i) {
                        $year = Input::get('year');
                        $month = Input::get('month');                    
                        $Prev1 = strtotime($year.'-'.$month.'-1 -1 months');
                        $Prev1Year = date("Y",$Prev1);
                        $Prev1Month = date("n",$Prev1);
                        $Prev2 = strtotime($year.'-'.$month.'-1 -2 months');
                        $Prev2Year = date("Y",$Prev2);
                        $Prev2Month = date("n",$Prev2);

                        if ($i == 1){
                            $report = StatisticReport1Sheet1::
                                            where(function ($query) use ($year,$month) {
                                                $query->where('Year', '=', $year)->Where('Month', '=', $month);
                                            })->orwhere(function ($query) use ($Prev1Year,$Prev1Month) {
                                                $query->where('Year', '=', $Prev1Year)->Where('Month', '=', $Prev1Month);
                                            })->orwhere(function ($query) use ($Prev2Year,$Prev2Month) {
                                                $query->where('Year', '=', $Prev2Year)->Where('Month', '=', $Prev2Month);
                                            });
                        
                        }elseif ($i == 2){
                            $report = StatisticReport1Sheet2::
                                            where(function ($query) use ($year,$month) {
                                                
                                                $query->where('Year', '=', $year)->Where('Month', '=', $month);
                                            })->orwhere(function ($query) use ($Prev1Year,$Prev1Month) {
                                                $query->where('Year', '=', $Prev1Year)->Where('Month', '=', $Prev1Month);
                                            })->orwhere(function ($query) use ($Prev2Year,$Prev2Month) {
                                                $query->where('Year', '=', $Prev2Year)->Where('Month', '=', $Prev2Month);
                            });
                        }elseif ($i == 3){
                            $report = StatisticReport1Sheet3::
                                            where(function ($query) use ($year,$month) {
                                                $query->where('Year', '=', $year)->Where('Month', '=', $month);
                                            })->orwhere(function ($query) use ($Prev1Year,$Prev1Month) {
                                                $query->where('Year', '=', $Prev1Year)->Where('Month', '=', $Prev1Month);
                                            })->orwhere(function ($query) use ($Prev2Year,$Prev2Month) {
                                                $query->where('Year', '=', $Prev2Year)->Where('Month', '=', $Prev2Month);
                            });
                        }else{
                            $report = StatisticReport1Sheet4::
                                where(function ($query) use ($year,$month) {
                                    $query->where('Year', '=', $year)->Where('Month', '=', $month);
                                })->orwhere(function ($query) use ($Prev1Year,$Prev1Month) {
                                    $query->where('Year', '=', $Prev1Year)->Where('Month', '=', $Prev1Month);
                                })->orwhere(function ($query) use ($Prev2Year,$Prev2Month) {
                                    $query->where('Year', '=', $Prev2Year)->Where('Month', '=', $Prev2Month);
                                });
                                
                        }
                        
                        $reportarray=$report->get()->toArray();
                        
                        if (empty ($reportarray)) {                        
                            $sheet->row(1,array('No data'));
                            return;
                        }
                                            
                        //$array = array();
                        $shoparr = array();
                        $datearr = array();
                        $markarr = array();                    
                        $pivotarr = array();
                        $excelarr = array();
                        $headerarr = array();
                        foreach($reportarray as $arr1){
                            $row = 0;
                            foreach($arr1 as $item){                            
                                if($row == 0) $shoparr[] = $item;
                                if($row == 1) $markarr[] = $item;
                                if($row == 4) $datearr[] = $item;                            
                                $row++;
                            }
                        }
                        
                        
                        for($i = 0; $i < sizeof($datearr); $i++ ){
                                $pivotarr[$shoparr[$i].$datearr[$i]] = $markarr[$i];
                        }                    
                        $shoparr = array_unique($shoparr);
                        $datearr = array($year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                        
                        $row = 0;
                        
                        
                        foreach ($shoparr as $shopitem){
                            $excelarr = array();
                            $excelarr[] = $shopitem;
                            foreach($datearr as $dateitem){
                                if(array_key_exists ( $shopitem.$dateitem ,$pivotarr ))
                                $excelarr[] = $pivotarr[$shopitem.$dateitem];
                            }                        
                            $sheet->row(2+$row,$excelarr);
                            $row++;
                        }
                        
                        //array_unshift($datearr, "");
                        /*
                        foreach($datearr as $dateitem){
                            $headerarr[] = $dateitem;
                        }*/
                        $headerarr = array('',$year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                        $sheet->row(1,$headerarr);
                        $sheet->row(1, function($row) {
                            //$row->setBackground('#000000');
                        }); 
                        //$sheet->fromArray($reportarray);
                    });
                }
            })->export('xlsx');           
        }
        
        public function postExportReport3a(){
            Excel::create('Life Statistic' , function($excel) {
                
                
                
                $year = Input::get('year');
                $month = Input::get('month');                    
                $Prev1 = strtotime($year.'-'.$month.'-1 -1 months');
                $Prev1Year = date("Y",$Prev1);
                $Prev1Month = date("n",$Prev1);
                $Prev2 = strtotime($year.'-'.$month.'-1 -2 months');
                $Prev2Year = date("Y",$Prev2);
                $Prev2Month = date("n",$Prev2);
                //Log::info('aaaaaaaaaaaaaa'.$year.$month.$Prev1.$Prev1Year.$Prev1Month.$Prev2.$Prev2Year.$Prev2Month);
                $report = StatisticReport2Sheet1::
                        where(function ($query) use ($year,$month) {
                            $query->where('Year', '=', $year)->Where('Month', '=', $month);
                        })->orwhere(function ($query) use ($Prev1Year,$Prev1Month) {
                            $query->where('Year', '=', $Prev1Year)->Where('Month', '=', $Prev1Month);
                        })->orwhere(function ($query) use ($Prev2Year,$Prev2Month) {
                            $query->where('Year', '=', $Prev2Year)->Where('Month', '=', $Prev2Month);
                        });
                        

                
                $staffarr = array();    
                $shoparr = array();
                $datearr = array();
                $markarr = array();                    
                $pivotarr = array();
                $pivotshoparr = array();
                $excelarr = array();
                $headerarr = array();                
                $reportarray=$report->get()->toArray();   
                if (empty ($reportarray)) {                        
                    $excel->sheet('No data', function($sheet) {   
                        $sheet->row(1,array('No data'));
                        return;
                    });
                }
                $row = 0;
                foreach($reportarray as $arr1){
                        $row = 0;
                        foreach($arr1 as $item){                            
                            if($row == 0) $staffarr[] = $item;
                            if($row == 1) $markarr[] = $item;
                            if($row == 4) $datearr[] = $item;                            
                            if($row == 5) $shoparr[] = $item;                              
                            $row++;
                        }
                }
                
                for($i = 0; $i < sizeof($datearr); $i++ ){
                        $pivotarr[$shoparr[$i].$datearr[$i].$staffarr[$i]] = $markarr[$i];
                }
                for($i = 0; $i < sizeof($datearr); $i++ ){
                        $pivotshoparr[$shoparr[$i].$staffarr[$i]] = 1;
                }
                
                $shoparr = array_unique($shoparr);
                $datearr = array($year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                $staffarr = array_unique($staffarr);
                
                
                foreach ($shoparr as $shopitem){
                    $excel->sheet($shopitem, function($sheet) use ($year,$month,$Prev1Year,$Prev1Month,$Prev2Year,$Prev2Month,
                                                                    $staffarr,$datearr,$pivotarr,$pivotshoparr,$shoparr,$shopitem) {                        
                        $row = 0;
                        foreach ($staffarr as $staffitem){
                            if(array_key_exists($shopitem.$staffitem, $pivotshoparr)){
                                $excelarr = array();
                                $excelarr[] = $staffitem;
                            
                                foreach($datearr as $dateitem){
                                    if(array_key_exists ( $shopitem.$dateitem.$staffitem ,$pivotarr ))
                                    $excelarr[] = $pivotarr[$shopitem.$dateitem.$staffitem];
                                    else $excelarr[] = "";
                                }                            
                                $sheet->row(2+$row,$excelarr);
                                $row++;
                            }
                        }
                    
                        array_unshift($datearr, "");
                        foreach($datearr as $dateitem){
                            $headerarr[] = $dateitem;
                        }
                        $headerarr = array('',$year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                        $sheet->row(1,$headerarr);
                        $sheet->row(1, function($row) {
                            //$row->setBackground('#000000');
                        }); 
                    
                    });                 
                }
            })->export('xlsx');  
            
        }
        public function postExportReport3b(){
                        Excel::create('Medical Statistic' , function($excel) {
                
                
                
                $year = Input::get('year');
                $month = Input::get('month');                    
                $Prev1 = strtotime($year.'-'.$month.'-1 -1 months');
                $Prev1Year = date("Y",$Prev1);
                $Prev1Month = date("n",$Prev1);
                $Prev2 = strtotime($year.'-'.$month.'-1 -2 months');
                $Prev2Year = date("Y",$Prev2);
                $Prev2Month = date("n",$Prev2);
                //Log::info('aaaaaaaaaaaaaa'.$year.$month.$Prev1.$Prev1Year.$Prev1Month.$Prev2.$Prev2Year.$Prev2Month);
                $report = StatisticReport2Sheet2::
                        where(function ($query) use ($year,$month) {
                            $query->where('Year', '=', $year)->Where('Month', '=', $month);
                        })->orwhere(function ($query) use ($Prev1Year,$Prev1Month) {
                            $query->where('Year', '=', $Prev1Year)->Where('Month', '=', $Prev1Month);
                        })->orwhere(function ($query) use ($Prev2Year,$Prev2Month) {
                            $query->where('Year', '=', $Prev2Year)->Where('Month', '=', $Prev2Month);
                        });
                        

                
                $staffarr = array();    
                $shoparr = array();
                $datearr = array();
                $markarr = array();                    
                $pivotarr = array();
                $pivotshoparr = array();
                $excelarr = array();
                $headerarr = array();                
                $reportarray=$report->get()->toArray();         
                if (empty ($reportarray)) {                        
                    $excel->sheet('No data', function($sheet) {   
                        $sheet->row(1,array('No data'));
                        return;
                    });
                }
                $row = 0;
                foreach($reportarray as $arr1){
                        $row = 0;
                        foreach($arr1 as $item){                            
                            if($row == 0) $staffarr[] = $item;
                            if($row == 1) $markarr[] = $item;
                            if($row == 4) $datearr[] = $item;                            
                            if($row == 5) $shoparr[] = $item;                              
                            $row++;
                        }
                }
                
                for($i = 0; $i < sizeof($datearr); $i++ ){
                        $pivotarr[$shoparr[$i].$datearr[$i].$staffarr[$i]] = $markarr[$i];
                }
                for($i = 0; $i < sizeof($datearr); $i++ ){
                        $pivotshoparr[$shoparr[$i].$staffarr[$i]] = 1;
                }
                
                $shoparr = array_unique($shoparr);
                $datearr = array($year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                $staffarr = array_unique($staffarr);
                
                
                foreach ($shoparr as $shopitem){
                    $excel->sheet($shopitem, function($sheet) use ($year,$month,$Prev1Year,$Prev1Month,$Prev2Year,$Prev2Month,
                            $staffarr,$datearr,$pivotarr,$pivotshoparr,$shoparr,$shopitem) {                        
                        $row = 0;
                        foreach ($staffarr as $staffitem){
                            if(array_key_exists($shopitem.$staffitem, $pivotshoparr)){
                                $excelarr = array();
                                $excelarr[] = $staffitem;
                            
                                foreach($datearr as $dateitem){
                                    if(array_key_exists ( $shopitem.$dateitem.$staffitem ,$pivotarr ))
                                    $excelarr[] = $pivotarr[$shopitem.$dateitem.$staffitem];
                                    else $excelarr[] = "";
                                }                            
                                $sheet->row(2+$row,$excelarr);
                                $row++;
                            }
                        }
                    
                        array_unshift($datearr, "");
                        foreach($datearr as $dateitem){
                            $headerarr[] = $dateitem;
                        }
                        $headerarr = array('',$year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                        $sheet->row(1,$headerarr);
                        $sheet->row(1, function($row) {
                            //$row->setBackground('#000000');
                        }); 
                    
                    });                 
                }
            })->export('xlsx');  
        }
        public function postExportReport3c(){
            Excel::create('Call Centre Statistic' , function($excel) {
                
                
                
                $year = Input::get('year');
                $month = Input::get('month');                    
                $Prev1 = strtotime($year.'-'.$month.'-1 -1 months');
                $Prev1Year = date("Y",$Prev1);
                $Prev1Month = date("n",$Prev1);
                $Prev2 = strtotime($year.'-'.$month.'-1 -2 months');
                $Prev2Year = date("Y",$Prev2);
                $Prev2Month = date("n",$Prev2);
                //Log::info('aaaaaaaaaaaaaa'.$year.$month.$Prev1.$Prev1Year.$Prev1Month.$Prev2.$Prev2Year.$Prev2Month);
                $report = StatisticReport2Sheet3::
                        where(function ($query) use ($year,$month) {
                            $query->where('Year', '=', $year)->Where('Month', '=', $month);
                        })->orwhere(function ($query) use ($Prev1Year,$Prev1Month) {
                            $query->where('Year', '=', $Prev1Year)->Where('Month', '=', $Prev1Month);
                        })->orwhere(function ($query) use ($Prev2Year,$Prev2Month) {
                            $query->where('Year', '=', $Prev2Year)->Where('Month', '=', $Prev2Month);
                        });
                        
                
                
                $staffarr = array();    
                $shoparr = array();
                $datearr = array();
                $markarr = array();                    
                $pivotarr = array();
                $pivotshoparr = array();
                $excelarr = array();
                $headerarr = array();                
                $reportarray=$report->get()->toArray();                
                if (empty ($reportarray)) {                        
                    $excel->sheet('No data', function($sheet) {   
                        $sheet->row(1,array('No data'));
                        return;
                    });
                }
                $row = 0;
                foreach($reportarray as $arr1){
                        $row = 0;
                        foreach($arr1 as $item){                            
                            if($row == 0) $staffarr[] = $item;
                            if($row == 1) $markarr[] = $item;
                            if($row == 4) $datearr[] = $item;                            
                            if($row == 5) $shoparr[] = $item;                              
                            $row++;
                        }
                }
                
                for($i = 0; $i < sizeof($datearr); $i++ ){
                        $pivotarr[$shoparr[$i].$datearr[$i].$staffarr[$i]] = $markarr[$i];
                }
                for($i = 0; $i < sizeof($datearr); $i++ ){
                        $pivotshoparr[$shoparr[$i].$staffarr[$i]] = 1;
                }
                
                $shoparr = array_unique($shoparr);
                $datearr = array($year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                $staffarr = array_unique($staffarr);
                
                
                foreach ($shoparr as $shopitem){
                    $excel->sheet($shopitem, function($sheet) use ($year,$month,$Prev1Year,$Prev1Month,$Prev2Year,$Prev2Month,
                            $staffarr,$datearr,$pivotarr,$pivotshoparr,$shoparr,$shopitem) {                        
                        $row = 0;
                        foreach ($staffarr as $staffitem){
                            if(array_key_exists($shopitem.$staffitem, $pivotshoparr)){
                                $excelarr = array();
                                $excelarr[] = $staffitem;
                            
                                foreach($datearr as $dateitem){
                                    if(array_key_exists ( $shopitem.$dateitem.$staffitem ,$pivotarr ))
                                    $excelarr[] = $pivotarr[$shopitem.$dateitem.$staffitem];
                                    else $excelarr[] = "";
                                }                            
                                $sheet->row(2+$row,$excelarr);
                                $row++;
                            }
                        }
                    
                        array_unshift($datearr, "");
                        foreach($datearr as $dateitem){
                            $headerarr[] = $dateitem;
                        }
                        $headerarr = array('',$year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                        $sheet->row(1,$headerarr);
                        $sheet->row(1, function($row) {
                            //$row->setBackground('#000000');
                        }); 
                    
                    });                 
                }
            })->export('xlsx');  
        }
        public function postExportReport3d(){
            Excel::create('General Statistic' , function($excel) {
                $year = Input::get('year');
                $month = Input::get('month');
                $Prev1 = strtotime($year.'-'.$month.'-1 -1 months');
                $Prev1Year = date("Y",$Prev1);
                $Prev1Month = date("n",$Prev1);
                $Prev2 = strtotime($year.'-'.$month.'-1 -2 months');
                $Prev2Year = date("Y",$Prev2);
                $Prev2Month = date("n",$Prev2);
                //Log::info('aaaaaaaaaaaaaa'.$year.$month.$Prev1.$Prev1Year.$Prev1Month.$Prev2.$Prev2Year.$Prev2Month);
                $report = StatisticReport2Sheet4::
                where(function ($query) use ($year,$month) {
                    $query->where('Year', '=', $year)->Where('Month', '=', $month);
                })->orwhere(function ($query) use ($Prev1Year,$Prev1Month) {
                    $query->where('Year', '=', $Prev1Year)->Where('Month', '=', $Prev1Month);
                })->orwhere(function ($query) use ($Prev2Year,$Prev2Month) {
                    $query->where('Year', '=', $Prev2Year)->Where('Month', '=', $Prev2Month);
                });
                    
                    
                    
                $staffarr = array();
                $shoparr = array();
                $datearr = array();
                $markarr = array();
                $pivotarr = array();
                $pivotshoparr = array();
                $excelarr = array();
                $headerarr = array();
                $reportarray=$report->get()->toArray();
                if (empty ($reportarray)) {
                    $excel->sheet('No data', function($sheet) {
                        $sheet->row(1,array('No data'));
                        return;
                    });
                }
                $row = 0;
                foreach($reportarray as $arr1){
                    $row = 0;
                    foreach($arr1 as $item){
                        if($row == 0) $staffarr[] = $item;
                        if($row == 1) $markarr[] = $item;
                        if($row == 4) $datearr[] = $item;
                        if($row == 5) $shoparr[] = $item;
                        $row++;
                    }
                }
                
                for($i = 0; $i < sizeof($datearr); $i++ ){
                    $pivotarr[$shoparr[$i].$datearr[$i].$staffarr[$i]] = $markarr[$i];
                }
                for($i = 0; $i < sizeof($datearr); $i++ ){
                    $pivotshoparr[$shoparr[$i].$staffarr[$i]] = 1;
                }
                
                $shoparr = array_unique($shoparr);
                $datearr = array($year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                $staffarr = array_unique($staffarr);
                
                
                foreach ($shoparr as $shopitem){
                    $excel->sheet($shopitem, function($sheet) use ($year,$month,$Prev1Year,$Prev1Month,$Prev2Year,$Prev2Month,
                        $staffarr,$datearr,$pivotarr,$pivotshoparr,$shoparr,$shopitem) {
                            $row = 0;
                            foreach ($staffarr as $staffitem){
                                if(array_key_exists($shopitem.$staffitem, $pivotshoparr)){
                                    $excelarr = array();
                                    $excelarr[] = $staffitem;
                                    
                                    foreach($datearr as $dateitem){
                                        if(array_key_exists ( $shopitem.$dateitem.$staffitem ,$pivotarr ))
                                            $excelarr[] = $pivotarr[$shopitem.$dateitem.$staffitem];
                                            else $excelarr[] = "";
                                    }
                                    $sheet->row(2+$row,$excelarr);
                                    $row++;
                                }
                            }
                            
                            array_unshift($datearr, "");
                            foreach($datearr as $dateitem){
                                $headerarr[] = $dateitem;
                            }
                            $headerarr = array('',$year.'-'.$month,$Prev1Year.'-'.$Prev1Month,$Prev2Year.'-'.$Prev2Month);
                            $sheet->row(1,$headerarr);
                            $sheet->row(1, function($row) {
                                //$row->setBackground('#000000');
                            });
                                
                    });
                }
            })->export('xlsx');
        }
        
        
        public function postExportReport4(){
            Excel::create('StaffRankingStatistic' , function($excel) {
                $year = Input::get('year');
                $month = Input::get('month');                    

                $report = StatisticReport3Sheet1::where('Year', '=', $year)->Where('Month', '=', $month);
                $reportarray=$report->orderBy('average', 'DESC')->get()->toArray();   
               
                $excel->sheet('Life Ranking', function($sheet) use ($reportarray) {                      
                    $row = 0;
                    foreach($reportarray as $arr1){
                        $column = 0;
                        $excelarr = array();
                        foreach($arr1 as $item){                            
                            if($column == 0) $excelarr[]  = $item;
                            if($column == 1) $excelarr[]  = $item;
                            $column++;
                        }                        
                        $sheet->row(2+$row,$excelarr);
                        $row++;                        
                    }
                    $sheet->row(1,Array('Staff','Service Mark'));
                });
                
                $report = StatisticReport3Sheet2::where('Year', '=', $year)->Where('Month', '=', $month);
                $reportarray=$report->orderBy('average', 'DESC')->get()->toArray();   
               
                $excel->sheet('Medical Ranking', function($sheet) use ($reportarray) {                      
                    $row = 0;
                    foreach($reportarray as $arr1){
                        $column = 0;
                        $excelarr = array();
                        foreach($arr1 as $item){                            
                            if($column == 0) $excelarr[]  = $item;
                            if($column == 1) $excelarr[]  = $item;
                            $column++;
                        }                        
                        $sheet->row(2+$row,$excelarr);
                        $row++;                        
                    }
                    $sheet->row(1,Array('Staff','Staff Mark'));
                });
                
                $report = StatisticReport3Sheet3::where('Year', '=', $year)->Where('Month', '=', $month);
                $reportarray=$report->orderBy('average', 'DESC')->get()->toArray();
                    
                    $excel->sheet('Call Centre Ranking', function($sheet) use ($reportarray) {
                        $row = 0;
                        foreach($reportarray as $arr1){
                            $column = 0;
                            $excelarr = array();
                            foreach($arr1 as $item){
                                if($column == 0) $excelarr[]  = $item;
                                if($column == 1) $excelarr[]  = $item;
                                $column++;
                            }
                            $sheet->row(2+$row,$excelarr);
                            $row++;
                        }
                        $sheet->row(1,Array('Staff','Staff Mark'));
                    });
            })->export('xlsx');
        }

        
        public function postDelete()
        {
            if(Input::get('From') == '') $From = '0000-01-01'; else $From = Input::get('From');
            if(Input::get('To') == '') $To = '9999-12-31'; else $To = Input::get('To');
            Questionnaire::where('visiteddate', '>=',$From)
                          ->where('visiteddate','<=',$To)->delete();            
            
            return View::make('statistic.export');
        }
}
