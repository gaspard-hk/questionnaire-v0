@extends('layout.admin')
@section('header')
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js" ></script>
  <script>  
jQuery( document ).ready(function( $ ) {
  // Code using $ as usual goes here.
  
    $('#edit-account-form').validate({        
        rules: {
			oldpassword: {
                            required: true,                            
                        },
                        password: {
                            required: true,                            
                        },
                        repassword: {
                            required: true,                            
                            equalTo: "#password"
                        }
                },
	messages: {
				oldpassword      : "請Passord",
				password   : "請輸入Password",
                                repassword   : "請輸入Password",
        },
	submitHandler: function(form) {
            success2.show();
            error2.hide();
            form.submit();  //Must be called here,
        }
    });
});  	
</script> 
  
@stop
@section('content')
<div id="accordion">
  <h3>Edit Account</h3>
  <div>
    <p>
		<form action="{{ URL::route('account-modify-post') }}" method="post" name="edit-account-form" id="edit-account-form">
			
			<table>
			<tr>
				<th align="left">
					Name:
				</th>
				<td>
					<div class="field">
						<input type="hidden" name="id" value="{{ $user['id'] }}">
                                                {{ $user['username'] }}
                                                <input type="hidden" name="oldpassword" id="oldpassword" value="a"></input>
						@if ($errors->has('oldpassword'))
							{{ $errors->first('oldpassword')}}
						@endif
					</div>    
				</td>
			</tr>	     
			<tr>
				<th align="left">
					New Password:
				</th>
				<td>
					<div class="field">
						<input type="password" name="password" id="password"></input>
						@if ($errors->has('password'))
							{{ $errors->first('password')}}
						@endif
					</div>
				</td>
			</tr>
                        <tr>
				<th align="left">
					Enter Password Again:
				</th>
				<td>
					<div class="field">
						<input type="password" name="repassword" id="repassword"></input>
						@if ($errors->has('repassword'))
							{{ $errors->first('repassword')}}
						@endif
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
                               	@if (Auth::id() != $user['id']) 
				<td>
                                    <form action="{{ URL::route('account-delete-post') }}" method="post">
                                        
                                    <input type="submit" value="Delete">    
                                    <input type="hidden" name="id" value="{{ $user['id'] }}">
                                    {{ Form::token() }}
                                    </form>
				</td>
                                @endif
			</tr>
			</table>
		
	</div>
	
</div>
@stop


