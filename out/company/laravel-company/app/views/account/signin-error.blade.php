@extends('layout.account')

@section('content')
    
<table data-role="table" id="movie-table" data-mode="reflow" class="movie-list">
	<thead>
		<tr>
			<th data-priority="1">
			</th>
			<th data-priority="persist">
				Sorry. System cannot process. Please click "Try again".
                                <br>Please contact administrator if it is not the first time.				
				
				<p><a href="{{ URL::route('account-signin') }}">Try again</a>
			</th>
			
		</tr>
	</thead>
</table>


@stop