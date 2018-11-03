@extends('layout.admin')
@section('header')
<script>
function submitForm(action,reportId)
{
    document.getElementById(reportId).action = action;
    document.getElementById(reportId).submit();
}

$(document).ready( function () {
    var dialog = $('#delete-dialog-form');
    dialog.dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Delete": function(){
            submitForm('{{ URL::route("statistic-delete-post") }}', "deleteform");
        },
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {

      }
    });
    
    $( "#deletecommentconfirm" ).bind('click', function (e) {
            //.button().on( "click", function(e) {
        e.preventDefault();
        dialog.dialog( "open" );
    });
    
    $( "#exportfrom,#exportto,#deletefrom,#deleteto" ).datepicker();
    $( "#accordion" ).accordion();
	
    var year = (new Date).getFullYear() ;         
    var i;
    var optiontext = "";
    for (i = -2; i < 2; i ++){
        if (i==0)
            optiontext = "<option selected></option>";
        else
            optiontext = "<option></option>";
        $(' select[name*="year"]')
                .append($(optiontext)
                .attr("value",year+i)
                .text(year+i)); 		
    }

    var month = (new Date).getMonth() ;         	
    //alert(month);
    var optiontext = "";
    for (i = 1; i <= 12; i ++){
        if (i==month+1)
            optiontext = "<option selected></option>";
        else
            optiontext = "<option></option>";
        $(' select[name*="month"]')
			.append($(optiontext)
			.attr("value",i)
			.text(i)); 		
	}
	

  });
  
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd'
    });
  </script>
@stop
@section('content')
<div id="accordion">  
<h3>匯出問卷詳細資料(Excel)</h3>
    <div>
    <p>
        <form action="{{ URL::route('statistic-export-report1-post') }}" method="post">
		<table>
			<tr>
				<th>
					由:
				</th>
				<td>
					<div class="field">
						<input type="text" name="From" id="exportfrom"></input>						
					</div>    
				</td>
			</tr>	
			<tr>
				<th>
					到:
				</th>
				<td>
					<div class="field">
						<input type="text" name="To" id="exportto"></input>						
					</div>
				</td>
			</tr>                        
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="下載報告">
					{{ Form::token() }}
				</td>
			</tr>
		</table>
	</form>
    </p>
  </div>
<h3>匯出生活美容/醫學美容/預約服務分數月份報告(Excel)</h3>
  <div>
    <p>        
        <form action="{{ URL::route('statistic-export-report2-post') }}" method="post">
			
			<table>
			<tr>
				<th>
					年份:
				</th>
				<td>
					<div class="field">
						<select name="year" id="year">
						</select>
					</div>    
				</td>
			</tr>	
			<tr>
				<th>
					月:
				</th>
				<td>
					<div class="field">
						<select name="month" id="month">
						</select>
					</div>
				</td>
			</tr>                        
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="下載報告">
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		</form>
    </p>
  </div>
<h3>匯出個別分店分數月份報告(Excel)</h3>
  <div>
    <p>        
        
			<form id="report3" method="post">                                    
			<table>
			<tr>
				<th>
					年份:
				</th>
				<td>
					<div class="field">
						<select name="year" id="report3year">
						</select>
					</div>    
				</td>
			</tr>	
			<tr>
				<th>
					月:
				</th>
				<td>
					<div class="field">
						<select name="month" id="report3month">
						</select>
					</div>
				</td>
			</tr>                        
			<tr>
				<th>
				</th>
				<td>
                                            <input type="button" onclick="submitForm('{{ URL::route('statistic-export-report3a-post') }}','report3')" value="下載生活美容報告">
				</td>
			</tr>
        		<tr>
				<th>
				</th>
				<td>
                                            <input type="button" onclick="submitForm('{{ URL::route('statistic-export-report3b-post') }}','report3')" value="下載醫學美容報告">
				</td>
			</tr>
        		<tr>
				<th>
				</th>
				<td>
                                            <input type="button" onclick="submitForm('{{ URL::route('statistic-export-report3c-post') }}','report3')" value="下載預約服務報告">
                                            {{ Form::token() }}
				</td>
			</tr>
        		<tr>
				<th>
				</th>
				<td>
                                            <input type="button" onclick="submitForm('{{ URL::route('statistic-export-report3d-post') }}','report3')" value="下載環境報告">
                                            {{ Form::token() }}
				</td>
			</tr>

			</table>
		    </form>
    </p>
  </div>
<h3>匯出員工排名月份報告</h3>
  <div>
    <p>        
        <form action="{{ URL::route('statistic-export-report4-post') }}" method="post">
			
			<table>
			<tr>
				<th>
					年份:
				</th>
				<td>
					<div class="field">
						<select name="year" id="year">
						</select>
					</div>    
				</td>
			</tr>	
			<tr>
				<th>
					月:
				</th>
				<td>
					<div class="field">
						<select name="month" id="month">
						</select>
					</div>
				</td>
			</tr>                        
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="下載報告">
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		</form>
    </p>
  </div>

  <h3>刪除某個時間內的問卷</h3>
  <div>
    <p>
        <form id="deleteform" method="post">
			
			<table>
			<tr>
				<th>
					由:
				</th>
				<td>
					<div class="field">
						<input type="text" name="From" id="deletefrom" required></input>						
					</div>    
				</td>
			</tr>	
			<tr>
				<th>
					到:
				</th>
				<td>
					<div class="field">
						<input type="text" name="To" id="deleteto" required></input>						
					</div>
				</td>
			</tr>                        
			<tr>
				<th>
				</th>
				<td>
                                    <button class="confirm" type="button" id="deletecommentconfirm">Delete</button>
                                    <!--<input type="submit" value="刪除">-->
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		</form>
    </p>    
  </div>
</div>

<div id="delete-dialog-form" title="Delete the questionnaires?">
     <label>Are you sure to delete?</label>
</div>

@stop
