<?php

class TestController extends BaseController {

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

	public function test()
	{
                //return 'Home.';
                //$u = User::get(1);
                //$memberinfo = MemberList::where('memberno','=',Input::get('memberno'));
                //return json_encode($memberinfo->get()->toArray());
                //return View::make('test');
		//return Redirect::route('test');
                $memberinfo = MemberList::where('memberno','=',Input::get('memberno'));            
                return $memberinfo->get()->toJson();
	}
        
        public function test3()
        {
             $phpWord = new \PhpOffice\PhpWord\PhpWord();

    // Every element you want to append to the word document is placed in a section.
    // To create a basic section:
    $section = $phpWord->addSection();

    // After creating a section, you can append elements:
    $section->addText('Hello world!');

    // You can directly style your text by giving the addText function an array:
    $section->addText('Hello world! I am formatted.',
        array('name'=>'Tahoma', 'size'=>16, 'bold'=>true));

    // If you often need the same style again you can create a user defined style
    // to the word document and give the addText function the name of the style:
    $phpWord->addFontStyle('myOwnStyle',
        array('name'=>'Verdana', 'size'=>14, 'color'=>'1B2232'));
    $section->addText('Hello world! I am formatted by a user defined style',
        'myOwnStyle');

    // You can also put the appended element to local object like this:
    $fontStyle = new \PhpOffice\PhpWord\Style\Font();
    $fontStyle->setBold(true);
    $fontStyle->setName('Verdana');
    $fontStyle->setSize(22);
    $myTextElement = $section->addText('Hello World!');
    $myTextElement->setFontStyle($fontStyle);

    // Finally, write the document:
        // The files will be in your public folder
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('helloWorld.docx');

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
    $objWriter->save('helloWorld.odt');

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'RTF');
    $objWriter->save('helloWorld.rtf');
        }
        
        public function test2()
        {/*
            Excel::create('test', function($excel) {
                $excel->sheet('All Records', function($sheet) {
                    $sheet->fromModel(Questionnaire::all()->toArray());
                });
                // Our second sheet
                $excel->sheet('Second sheet', function($sheet) {
                    
                });
            })->export('xlsx');*/
                //Excel::create('Filename.xlsx')->export('xlsx');
                $objPHPExcel = new PHPExcel();
    $objWorksheet = $objPHPExcel->getActiveSheet();
    $objWorksheet->fromArray(
        array(
            array('',       'Rainfall (mm)',    'Temperature (°F)', 'Humidity (%)'),
            array('Jan',        78,                 52,                 61),
            array('Feb',        64,                 54,                 62),
            array('Mar',        62,                 57,                 63),
            array('Apr',        21,                 62,                 59),
            array('May',        11,                 75,                 60),
            array('Jun',        1,                  75,                 57),
            array('Jul',        1,                  79,                 56),
            array('Aug',        1,                  79,                 59),
            array('Sep',        10,                 75,                 60),
            array('Oct',        40,                 68,                 63),
            array('Nov',        69,                 62,                 64),
            array('Dec',        89,                 57,                 66),
        )
    );
    
//  Set the Labels for each data series we want to plot
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $dataseriesLabels1 = array(
        new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$1', NULL, 1),   //  Temperature
    );
    $dataseriesLabels2 = array(
        new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$C$1', NULL, 1),   //  Rainfall
    );
    $dataseriesLabels3 = array(
        new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$D$1', NULL, 1),   //  Humidity
    );
    
    //  Set the X-Axis Labels
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $xAxisTickValues = array(
        new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$2:$A$13', NULL, 12),    //  Jan to Dec
    );
    
    /*
    $colNumber = PHPExcel_Cell::columnIndexFromString($colString);
    $colString = PHPExcel_Cell::stringFromColumnIndex($colNumber);
     * 
     */
//returns 1 from a $colString of 'A', 26 from 'Z', 27 from 'AA', etc.

//and the (almost) reverse


    //  Set the Data values for each data series we want to plot
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $dataSeriesValues1 = array(
        new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$2:$B$13', NULL, 12),
    );
    
    //  Build the dataseries
    $series1 = new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_BARCHART,       // plotType
        PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,  // plotGrouping
        range(0, count($dataSeriesValues1)-1),          // plotOrder
        $dataseriesLabels1,                             // plotLabel
        $xAxisTickValues,                               // plotCategory
        $dataSeriesValues1                              // plotValues
    );
    //  Set additional dataseries parameters
    //      Make it a vertical column rather than a horizontal bar graph
    $series1->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
    
    
    //  Set the Data values for each data series we want to plot
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $dataSeriesValues2 = array(
        new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$C$2:$C$13', NULL, 12),
    );
    
    //  Build the dataseries
    $series2 = new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_LINECHART,      // plotType
        PHPExcel_Chart_DataSeries::GROUPING_STANDARD,   // plotGrouping
        range(0, count($dataSeriesValues2)-1),          // plotOrder
        $dataseriesLabels2,                             // plotLabel
        NULL,                                           // plotCategory
        $dataSeriesValues2                              // plotValues
    );
    
    
    //  Set the Data values for each data series we want to plot
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $dataSeriesValues3 = array(
        new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$13', NULL, 12),
    );
    
    //  Build the dataseries
    $series3 = new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_AREACHART,      // plotType
        PHPExcel_Chart_DataSeries::GROUPING_STANDARD,   // plotGrouping
        range(0, count($dataSeriesValues2)-1),          // plotOrder
        $dataseriesLabels3,                             // plotLabel
        NULL,                                           // plotCategory
        $dataSeriesValues3                              // plotValues
    );
    
    
    //  Set the series in the plot area
    $plotarea = new PHPExcel_Chart_PlotArea(NULL, array($series1, $series2, $series3));
    //  Set the chart legend
    $legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
    
    $title = new PHPExcel_Chart_Title('Average Weather Chart for Crete');
    
    
    //  Create the chart
    $chart = new PHPExcel_Chart(
        'chart1',       // name
        $title,         // title
        $legend,        // legend
        $plotarea,      // plotArea
        true,           // plotVisibleOnly
        0,              // displayBlanksAs
        NULL,           // xAxisLabel
        NULL            // yAxisLabel
    );
    
    //  Set the position where the chart should appear in the worksheet
    $chart->setTopLeftPosition('F2');
    $chart->setBottomRightPosition('O16');
    
    //  Add the chart to the worksheet
    $objWorksheet->addChart($chart);
    
    echo date('H:i:s') . " Write to Excel2007 format\n";
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->setIncludeCharts(TRUE);
    //$objWriter->save('helloWorld.docx');

    $objWriter->save(str_replace('.php', '.xlsx', __FILE__));

    
    //include_once ('Classes/PHPExcel/Writer/PDF.php');
//include_once ('Classes/PHPExcel/Writer/PDF/DomPDF.php');
//$rendererName = PHPExcel_Settings::PDF_RENDERER_DOMPDF;
//$rendererLibrary = 'domPDF0.6.0beta3';
//$rendererLibraryPath = dirname(__FILE__). 'libs/classes/dompdf' . $rendererLibrary;


//$objWriter2 = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
//$objWriter2->setSheetIndex(0);
//$objWriter2->save('esp.pdf');

    }
       public function test4()
        {
            Excel::create('test', function($excel) {
                $excel->sheet('Second sheet', function($objWorksheet) {
                    

                //Excel::create('Filename.xls
    $objWorksheet->fromArray(
        array(
            array('',       'Rainfall (mm)',    'Temperature (°F)', 'Humidity (%)'),
            array('Jan',        78,                 52,                 61),
            array('Feb',        64,                 54,                 62),
            array('Mar',        62,                 57,                 63),
            array('Apr',        21,                 62,                 59),
            array('May',        11,                 75,                 60),
            array('Jun',        1,                  75,                 57),
            array('Jul',        1,                  79,                 56),
            array('Aug',        1,                  79,                 59),
            array('Sep',        10,                 75,                 60),
            array('Oct',        40,                 68,                 63),
            array('Nov',        69,                 62,                 64),
            array('Dec',        89,                 57,                 66),
        )
    );
    
//  Set the Labels for each data series we want to plot
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $dataseriesLabels1 = array(
        new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$1', NULL, 1),   //  Temperature
    );
    $dataseriesLabels2 = array(
        new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$C$1', NULL, 1),   //  Rainfall
    );
    $dataseriesLabels3 = array(
        new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$D$1', NULL, 1),   //  Humidity
    );
    
    //  Set the X-Axis Labels
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $xAxisTickValues = array(
        new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$2:$A$13', NULL, 12),    //  Jan to Dec
    );
    
    
    //  Set the Data values for each data series we want to plot
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $dataSeriesValues1 = array(
        new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$2:$B$13', NULL, 12),
    );
    
    //  Build the dataseries
    $series1 = new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_BARCHART,       // plotType
        PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,  // plotGrouping
        range(0, count($dataSeriesValues1)-1),          // plotOrder
        $dataseriesLabels1,                             // plotLabel
        $xAxisTickValues,                               // plotCategory
        $dataSeriesValues1                              // plotValues
    );
    //  Set additional dataseries parameters
    //      Make it a vertical column rather than a horizontal bar graph
    $series1->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
    
    
    //  Set the Data values for each data series we want to plot
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $dataSeriesValues2 = array(
        new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$C$2:$C$13', NULL, 12),
    );
    
    //  Build the dataseries
    $series2 = new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_LINECHART,      // plotType
        PHPExcel_Chart_DataSeries::GROUPING_STANDARD,   // plotGrouping
        range(0, count($dataSeriesValues2)-1),          // plotOrder
        $dataseriesLabels2,                             // plotLabel
        NULL,                                           // plotCategory
        $dataSeriesValues2                              // plotValues
    );
    
    
    //  Set the Data values for each data series we want to plot
    //      Datatype
    //      Cell reference for data
    //      Format Code
    //      Number of datapoints in series
    //      Data values
    //      Data Marker
    $dataSeriesValues3 = array(
        new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$13', NULL, 12),
    );
    
    //  Build the dataseries
    $series3 = new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_AREACHART,      // plotType
        PHPExcel_Chart_DataSeries::GROUPING_STANDARD,   // plotGrouping
        range(0, count($dataSeriesValues2)-1),          // plotOrder
        $dataseriesLabels3,                             // plotLabel
        NULL,                                           // plotCategory
        $dataSeriesValues3                              // plotValues
    );
    
    
    //  Set the series in the plot area
    $plotarea = new PHPExcel_Chart_PlotArea(NULL, array($series1, $series2, $series3));
    //  Set the chart legend
    $legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
    
    $title = new PHPExcel_Chart_Title('Average Weather Chart for Crete');
    
    
    //  Create the chart
    $chart = new PHPExcel_Chart(
        'chart1',       // name
        $title,         // title
        $legend,        // legend
        $plotarea,      // plotArea
        true,           // plotVisibleOnly
        0,              // displayBlanksAs
        NULL,           // xAxisLabel
        NULL            // yAxisLabel
    );
    
    //  Set the position where the chart should appear in the worksheet
    $chart->setTopLeftPosition('F2');
    $chart->setBottomRightPosition('O16');
    
    //  Add the chart to the worksheet
    $objWorksheet->addChart($chart);
    
    //echo date('H:i:s') . " Write to Excel2007 format\n";
                }); $excel->setIncludeCharts(TRUE);
                })->export('xlsx');
/*    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->setIncludeCharts(TRUE);
    //$objWriter->save('helloWorld.docx');

    $objWriter->save(str_replace('.php', '.xlsx', __FILE__));

    
    //include_once ('Classes/PHPExcel/Writer/PDF.php');
//include_once ('Classes/PHPExcel/Writer/PDF/DomPDF.php');
$rendererName = PHPExcel_Settings::PDF_RENDERER_DOMPDF;
$rendererLibrary = 'domPDF0.6.0beta3';
$rendererLibraryPath = dirname(__FILE__). 'libs/classes/dompdf' . $rendererLibrary;


$objWriter2 = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
$objWriter2->setSheetIndex(0);
$objWriter2->save('esp.pdf');

    }*/
         
}}