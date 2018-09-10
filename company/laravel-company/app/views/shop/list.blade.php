@extends('layout.admin')
@section('header')
<script>
    $(document).ready( function () {
		@if(isset($activeaccordion))
			{{ '$( "#accordion" ).accordion({ active: 1, heightStyle: "content" });' }}
		@else
			{{ '$( "#accordion" ).accordion({ active: 0, heightStyle: "content" });' }}
		@endif
        //$( "#accordion" ).accordion();
            // Setup - add a text input to each footer cell
        $('#shoptable tfoot th').each( function () {
            var title = $('#shoptable thead th').eq( $(this).index() ).text();
			if (title != "刪除"){
                $(this).html( '<input type="text" placeholder="搜尋 '+title+'" />' );
				//$(this).html( title + ': <input type="text" placeholder="搜尋" />' );
            }
        } );
 
        // DataTable
        var table = $('#shoptable').DataTable( {
                        "order": [[ 2, "asc" ]],
                        "iDisplayLength": 15,
			"lengthMenu": [[15, 50, -1], [15, 50, "All"]]
		} );
 
        // Apply the search
        table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
            } );
        } ); 

        $('#createshoptable').DataTable( {
			"paging":   false,
			"ordering": false,
			"info":     false,
			"filter":   false,
		} );
		
		
    } );
</script>
@stop
@section('content')
<div id="accordion">
  <h3>編輯分店</h3>
  <div>
    <p>

	<table id="shoptable" class="cell-border">
	    <thead>
            <tr>
                <th>分店名</th>
                <th>position</th>
                <th>刪除</th>
                <th>上</th>
                <th>下</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>分店名</th>
                <th>position</th>
                <th>刪除</th>
                <th>上</th>
                <th>下</th>
            </tr>
        </tfoot>
		
		<tbody>
			@foreach ($shops as $shopsarr)
			<tr>
			<td>
				{{ $shopsarr['shopnamechi'] }}				
			</td>
                        <td>
                            	{{ $shopsarr['position'] }}		
                        </td>
			<td>             
                            <form action="{{ URL::route('shops-delete-post') }}" method="post">
                                <input type="hidden" name="id" value="{{ $shopsarr['id'] }}">
				<input type="submit" value="刪除">
				{{ Form::token() }}
                            </form>
			</td>
                        <td>
                            <form action="{{ URL::route('shops-position-up-post') }}" method="post">
                                <input type="hidden" name="id" value="{{ $shopsarr['id'] }}">
                            	<input type="submit" value="Up">
				{{ Form::token() }}                                                                
                            </form>
                        </td>
                        <td>
                             <form action="{{ URL::route('shops-position-down-post') }}" method="post">
                                <input type="hidden" name="id" value="{{ $shopsarr['id'] }}">
                            	<input type="submit" value="down">
				{{ Form::token() }}
                            </form>
                        </td>
                        @endforeach
		</tbody>
	</table>

	</div>
	<h3>新增分店</h3>
  <div>
    <form action="{{ URL::route('shops-create-post') }}" method="post">
			
			<table id="createshoptable">
			<tr>
				<td>
					新增分店 :
				</td>
				<td>
					<div class="field">
						<input type="text" name="shopnamechi"></input>
						@if ($errors->has('shopnamechi'))
							{{ $errors->first('shopnamechi')}}
						@endif
					</div>    
				</td>
			</tr>	<!--
                        			<tr>
				<td>
					Shop Name (English) :
				</td>
				<td>
					<div class="field">
						<input type="text" name="shopnameeng"></input>
						
					</div>    
				</td>
			</tr>
                        			</tr>	
                        			<tr>
				<td>
					Shop Name (English) :
				</td>
				<td>
					<div class="field">
						<input type="text" name="shopnamejap"></input>
						
					</div>    
				</td>
			</tr>	-->		
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="增加商店">
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		</form>
	</div>
	
</div>
@stop
