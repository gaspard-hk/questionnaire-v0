<!doctype html>


<html lang="en">
<head>
	<title>Questionnaire</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	{{ HTML::style('css/jquery.mobile-1.4.4.min.css') }}
	{{ HTML::style('css/jquery.mobile-git.css') }}
	{{ HTML::style('css/themes/company.css') }}
	{{ HTML::style('css/themes/jquery.mobile.icons.min.css') }}
	{{ HTML::style('css/jquery-mobile-datepicker-wrapper-master/jquery.mobile.datepicker.css') }}
	{{ HTML::style('css/jquery-mobile-datepicker-wrapper-master/jquery.mobile.datepicker.theme.css')}}
        {{ HTML::script('js/jquery-1.11.1.min.js') }}	
	{{ HTML::script('js/jquery.mobile-1.4.4.min.js') }}	
	{{ HTML::script('js/jquery.validate.min.js') }}	 
	{{ HTML::script('css/jquery-mobile-datepicker-wrapper-master/external/jquery-ui/datepicker.js') }}	
	{{ HTML::script('css/jquery-mobile-datepicker-wrapper-master/jquery.mobile.datepicker.js') }}

        <script>
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
        </script>
        
        @section('header')
            
        @show
	<!--
	<script>
		$(function(){
			$( ".date-input-css" ).datepicker();
		})
	</script>
	-->
</head>
<body bgcolor="#ddeeff">
        @yield('content')
</body>
</html>
