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
					講解:
				</th>
				<td>
					<div class="field">
						<select name="explanation">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['explanation'])
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
					態度:
				</th>
				<td>
					<div class="field">
						<select name="attitude">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['attitude'])
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
					熱誠:
				</th>
				<td>
					<div class="field">
						<select name="sincerity">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['sincerity'])
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
					<font color=#ff9900><u>員工</u></font>
				</th>
			</tr>
			<tr>
				<th align="left">
					禮貌:
				</th>
				<td>
					<div class="field">
						<select name="manner">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['manner'])
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
					效率:
				</th>
				<td>
					<div class="field">
						<select name="efficiency">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['efficiency'])
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
					整潔:
				</th>
				<td>
					<div class="field">
						<select name="tidiness">
						@for ($i = 5; $i >= 1; $i --)						
						@if ($i == $questionnaire['tidiness'])
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
					<font color=#ff9900><u>清潔</u></font>
				</th>
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


