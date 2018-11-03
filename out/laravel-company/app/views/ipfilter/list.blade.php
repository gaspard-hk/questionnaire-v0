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
        $('#usertable tfoot th').each( function () {
            var title = $('#usertable thead th').eq( $(this).index() ).text();
			if (title != "刪除"){
                $(this).html( '<input type="text" placeholder="搜尋 '+title+'" />' );
				//$(this).html( title + ': <input type="text" placeholder="搜尋" />' );
            }
        } );
 
        // DataTable
        var table = $('#usertable').DataTable( {
			"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
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

		
    } );
</script>
@show
@section('content')
<div id="accordion">
  <h3>IP 過濾器 On/Off </h3>
  <div>
      <div>
            <p>
		<form action="{{ URL::route('ipfilter-set-post') }}" method="post">
			
			<table>
			<tr>
				<th>
					IP 過濾器:
				</th>
				<td>
					<div class="field">
                                            <select name="setting">
                                                @if ($ipfiltersset['Value'] == "Y")
                                                <option value = "N">No </option>
                                                <option value = "Y" selected>Yes </option>
                                                @else
                                                <option value = "N" selected>No </option>
                                                <option value = "Y">Yes </option>
                                                @endif
                                                
                                            </select>
                                            <input type="submit" value="Change">
                                            {{ Form::token() }}
					</div>    
				</td>
			</tr>	
			
			<tr>
				<th>
				</th>
				<td>
					
				</td>
			</tr>
			</table>
		</form>
            
        </div>  
  </div>
  
  <h3>IP過濾器列表</h3>
  <div>
    <p>

	<table id="usertable" class="cell-border">
	    <thead>
            <tr>
                <th>IP</th>
		<th>刪除</th>
                                
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>IP</th>
		<th></th>
            </tr>
        </tfoot>
		
		<tbody>
			@foreach ($ipfilters as $ipfiltersarr)
			<tr>
			<td>
				{{ $ipfiltersarr['ip'] }}		
			</td>			
			<td>             
                            <form action="{{ URL::route('ipfilter-delete-post') }}" method="post">
                                <input type="hidden" name="id" value="{{ $ipfiltersarr['id'] }}">
								<input type="submit" value="delete">
								{{ Form::token() }}
                            </form>
			</td>

                        @endforeach
		</tbody>
	</table>

	</div>
	<h3>新增IP過濾器</h3>
        <div>
            <p>
		<form action="{{ URL::route('ipfilter-create-post') }}" method="post">
			
			<table>
			<tr>
				<th>
					IP:
				</th>
				<td>
					<div class="field">
						<input type="text" name="ipfilter"></input>
						@if ($errors->has('ipfilter'))
							{{ $errors->first('ipfilter')}}
						@endif
					</div>    
				</td>
			</tr>	
			
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="Create">
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		</form>
            
        </div>  
</div>
@stop



