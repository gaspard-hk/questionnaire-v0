@extends('layout.admin')
@section('header')
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
@show
@section('content')
<div id="accordion">
  <h3>Create Account</h3>
  <div>
    <p>
		<form action="{{ URL::route('account-create-post') }}" method="post">
			
			<table>
			<tr>
				<th>
					名稱:
				</th>
				<td>
					<div class="field">
						<input type="text" name="username"></input>
						@if ($errors->has('username'))
							{{ $errors->first('username')}}
						@endif
					</div>    
				</td>
			</tr>	
			<tr>
				<th>
					密碼:
				</th>
				<td>
					<div class="field">
						<input type="password" name="password"></input>
						@if ($errors->has('password'))
							{{ $errors->first('password')}}
						@endif
					</div>
				</td>
			</tr>
                        <tr>
				<th>
					重新輸入密碼:
				</th>
				<td>
					<div class="field">
						<input type="password" name="password"></input>
						@if ($errors->has('password'))
							{{ $errors->first('password')}}
						@endif
					</div>
				</td>
			</tr>
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="Sign in">
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		</form>
	</div>
	
</div>
@stop


