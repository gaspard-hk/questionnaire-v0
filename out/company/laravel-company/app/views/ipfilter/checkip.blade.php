@extends('layout.account')

@section('content')
<script>
	  $(function() {
            $( "#tabs" ).tabs();
          });
</script>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Your current IP:</a></li>
	</ul>
	<div id="tabs-1">
                {{ Request::getClientIP(); }}
	</div>
	
</div>
@stop
