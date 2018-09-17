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
                submitForm('{{ URL::route('online-delete-post') }}', "frmDelete");
            },
            Cancel: function() {
                dialog.dialog( "close" );
            }
        },
        close: function() {

        }
        });
    
        $( "#deletebtn" ).bind('click', function (e) {
            e.preventDefault();
            dialog.dialog( "open" );
        });
    
        $( "#visiteddate" ).datepicker();
        $( "#accordion" ).accordion();

        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
});
</script>
@stop
@section('content')
<div id="accordion">
    <h3>編輯問卷</h3>
    <div>
    <p>
    <form action="{{ URL::route('online-modify-post') }}" method="post" name="edit-online-form" id="edit-online-form">
	<table>
            <tr>
                <th align="left">
                    店舖名:
		</th>
		<td>
					<div class="field">
						<input type="hidden" name="id" value="{{ $questionnaire['id'] }}">
						<input type="text" name="shopnamechi" value="{{ $questionnaire['shopnamechi'] }}">
					</div>    
		</td>
            </tr>	     
            <tr>
		<th align="left">
                    惠顧日:
		</th>
		<td>
			<div class="field">
				<input type="text" name="visiteddate" id="visiteddate" value="{{ $questionnaire['visiteddate'] }}">
			</div>
		</td>
            </tr>
            <tr>
				<th align="left">
					美容師:
				</th>
				<td>
					<div class="field">
						<input type="text" name="staffname" value="{{ $questionnaire['staffname'] }}">
					</div>
				</td>
            </tr>
            <tr>
				<th align="left">
					<font color=#ff9900><u>服務</u></font>
				</th>
			</tr>
			<tr>
				<th align="left">
					種類:
				</th>
				<td>
					<div class="field">
						<select name="type">
						@if ($questionnaire['type'] == "life")
						<option value="life" selected>生活美容</option>
						<option value="medical">醫學美容</option>
						@else
						<option value="life">生活美容</option>
						<option value="medical" selected>醫學美容</option>
						@endif
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					講解(生活美容):
				</th>
				<td>
					<div class="field">
						<select name="lifeexplanation">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['lifeexplanation'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					技術(生活美容):
				</th>
				<td>
					<div class="field">
						<select name="lifetechnique">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['lifetechnique'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					舒適度(生活美容):
				</th>
				<td>
					<div class="field">
						<select name="lifecomfort">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['lifecomfort'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					禮貌和態度(生活美容):
				</th>
				<td>
					<div class="field">
						<select name="lifecourtesy">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['lifecourtesy'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					效率(生活美容):
				</th>
				<td>
					<div class="field">
						<select name="lifeefficiency">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['lifeefficiency'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					儀容(生活美容):
				</th>
				<td>
					<div class="field">
						<select name="lifeappearance">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['lifeappearance'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					專業性(醫學美容):
				</th>
				<td>
					<div class="field">
						<select name="medicalprofessionalism">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['medicalprofessionalism'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					技術(醫學美容):
				</th>
				<td>
					<div class="field">
						<select name="medicaltechnique">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['medicaltechnique'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					態度(醫學美容):
				</th>
				<td>
					<div class="field">
						<select name="medicalattitude">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['medicalattitude'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					講解(醫學美容):
				</th>
				<td>
					<div class="field">
						<select name="medicalexplanation">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['medicalexplanation'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>

			<tr>
				<th align="left">
					禮貌和態度(預約服務):
				</th>
				<td>
					<div class="field">
						<select name="callcourtesy">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['callcourtesy'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					講解(預約服務):
				</th>
				<td>
					<div class="field">
						<select name="callexplanation">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['callexplanation'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					效率(預約服務):
				</th>
				<td>
					<div class="field">
						<select name="callefficiency">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['callefficiency'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					接待處:
				</th>
				<td>
					<div class="field">
						<select name="reception">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['reception'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					房間:
				</th>
				<td>
					<div class="field">
						<select name="room">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['room'])
						<option value="{{ $i }}" selected> {{ $i }}</option>
						@else
						<option value="{{ $i }}"> {{ $i }}</option>
						@endif
						@endfor
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					<font color=#ff9900><u>個人資料</u></font>
				</th>
			</tr>
			<tr>
				<th align="left">
					顧客姓名:
				</th>
				<td>
					<div class="field">
						<input type="text" name="customername" id="customername" value="{{ $questionnaire['customername']}}" ></input>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					電話:
				</th>
				<td>
					<div class="field">
						<input type="text" name="customertel" id="customertel" value="{{ $questionnaire['customertel']}}" ></input>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					會員編號:
				</th>
				<td>
					<div class="field">
						<input type="text" name="memberno" id="memberno" value="{{ $questionnaire['memberno']}}" ></input>
					</div>
				</td>
			</tr>
			<tr>
				<th align="left">
					意見:
				</th>
				<td>
					<div class="field">
						<textarea cols="40" rows="8" name="comment" id="Comment">{{ $questionnaire['comment']}}</textarea>
					</div>
				</td>
			</tr>
			
			
			<tr>
				<th>
                                    
				</th>
				<td>
                                    <input type="submit" value="Submit">
									{{ Form::token() }}
                                        </form>
				</td>
			</tr>
                        <tr>
				<th>
                                    
				</th>
                               	
				<td>
                                    <form action="{{ URL::route('online-delete-post') }}" method="post" id="frmDelete">
                                    <input type="button" value="Delete" id="deletebtn">    
                                    <input type="hidden" name="id" value="{{ $questionnaire['id'] }}">
                                    {{ Form::token() }}
                                    </form>
				</td>
                                
			</tr>
			</table>
		
	</div>
</div>

<div id="delete-dialog-form" title="Delete the questionnaire?">
     <label>Are you sure to delete?</label>
</div>
@stop


