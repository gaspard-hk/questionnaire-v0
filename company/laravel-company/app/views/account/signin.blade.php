@extends('layout.account')

@section('content')
<script>
	  $(function() {
            $( "#tabs" ).tabs();
          });
</script>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">登入問卷系統</a></li>
			
	</ul>
	<div id="tabs-1">
		<form action="{{ URL::route('account-signin-post') }}" method="post">
			
			<table>
			<tr>
				<th>
					使用者名稱:
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
