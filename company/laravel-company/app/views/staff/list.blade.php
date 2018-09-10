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
        $('#questionnairetable tfoot th').each( function () {
            var title = $('#questionnairetable thead th').eq( $(this).index() ).text();
			if (title != "刪除"){
                $(this).html( '<input type="text" placeholder="搜尋 '+title+'" />' );
				//$(this).html( title + ': <input type="text" placeholder="搜尋" />' );
            }
        } );
 
        // DataTable
        var table = $('#questionnairetable').DataTable( {
                        "order": [[ 2, "desc" ]],
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
		
    } );
</script>
@show
@section('content')
<div id="accordion">
            <h3>匯入美容師</h3>
<div>
   {{ Form::open(array('url'=> URL::route('staff-import-post'),'files'=>true)) }}
			
			<table id="staffimporttable">
			<tr>
				<td>
					檔案(xls,xlsx):
				</td>
				<td>
					<div class="field">
                                              
  
                                                
                                                {{ Form::file('staffexcelfile','',array('id'=>'','class'=>'')) }}
                                        </div>
				</td>
			</tr>	
			<tr>
				<td>
					備註:
				</td>
				<td>
					<div class="field">
						<input type="text" name="remark"></input>						
					</div>
				</td>
			</tr>
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="上載">
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		{{ Form::close() }}
	</div>	

  <h3>搜尋美容師</h3>
  <div>
    <p>

	<table id="questionnairetable" class="cell-border">
	    <thead>
            <tr>
			<th>美容師</th>
                        <th>店舖</th>
                        <th>更新時間</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
				<th>美容師</th>
				<th>店舖</th>
				<th>更新時間</th>
            </tr>
        </tfoot>
		
		<tbody>
			@foreach ($staffs as $staffarr)
			<tr>
			<td>
				{{ $staffarr['staffname'] }}
			</td>
			<td>
				{{ $staffarr['shopname'] }}
			</td>
			<td>
                                {{ $staffarr['updated_at'] }}
			</td>
			@endforeach
		</tbody>
	</table>

    </div>
</div>
@stop



