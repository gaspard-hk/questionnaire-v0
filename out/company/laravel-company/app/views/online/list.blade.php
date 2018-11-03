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
            /*
    $('#questionnairetable tfoot th').each( function () {
        var title = $('#questionnairetable thead th').eq( $(this).index() ).text();
            if (title != "刪除"){
                $(this).html( '<input type="text" placeholder="搜尋 '+title+'" />' );
				//$(this).html( title + ': <input type="text" placeholder="搜尋" />' );
        }
    } );*/
 
        // DataTable
        var table = $('#questionnairetable').DataTable( {
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ URL::route('online-datatable-post')}}",
                            "type": "POST"
                        },
                        "order": [[ 3, "desc" ]],
			//"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
                        "lengthMenu": [[15, 25, 50], [15, 25, 50]],
                        "iDisplayLength": 15,
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
    <h3>搜尋問卷</h3>
    <div>
    <p>
	<table id="questionnairetable" class="cell-border">
	    <thead>
                <tr>
                    <th>店舖</th>
                    <th>美容師</th>
                    <th>顧客</th>
                    <th>更新時間</th>
                    <th>詳細資料</th>
                </tr>
            </thead>
 
            <tfoot>
                <tr>
                    <th>店舖</th>
                    <th>美容師</th>
                    <th>顧客</th>
                    <th>更新時間</th>
                    <th></th>
                </tr>
            </tfoot>
		
            <tbody>		
		<tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>             

                    </td>
                </tr>
                
            </tbody>
	</table>
    </div>
</div>
@stop



