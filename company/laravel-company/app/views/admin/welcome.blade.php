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
  <h3>Welcome</h3>
  <div>
    <p>
    This is the administration page of the questionnaire system.
    
    Please feel free to use.
    </p>
  </div>
</div>

@stop
