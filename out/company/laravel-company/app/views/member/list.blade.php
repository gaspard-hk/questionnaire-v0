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
        } );
 */
    
         // DataTable
        var table = $('#questionnairetable').DataTable( {
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "{{ URL::route('member-datatable-post')}}",
                            "type": "POST"
                        },
                        "order": [[ 2, "desc" ]],
                        "iDisplayLength": 15,
			//"lengthMenu": [[15, 50, -1], [15, 50, "All"]]
                        "lengthMenu": [[15, 50], [15, 50]]
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
    <h3>匯入顧客</h3>
	<div>
   {{ Form::open(array('url'=> URL::route('member-import-post'),'files'=>true)) }}
			
			<table id="memberimporttable">
			<tr>
				<td>
					檔案(xls,xlsx):
				</td>
				<td>
					<div class="field">
                                              
  
                                                
                                                {{ Form::file('memberexcelfile','',array('id'=>'','class'=>'')) }}
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
					<input type="submit" value="upload">
					{{ Form::token() }}
                                        {{ Form::close() }}
				</td>
                        </tr>
                        <tr>
                            	<th>
				</th>
				<td>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </td>
                        </tr>
                         <tr>
				<th>
				</th>
				<td>
                                <form action="{{ URL::route('member-deleteemptyrow-post')}}" method="post" >
                                    <input type="submit" value="Clear all Empty Row">
                                {{ Form::token() }}
                                </form>
                                </td>                        
			</tr>
                        <tr>
				<th>
				</th>
				<td>
                                <form action="{{ URL::route('member-reset-post')}}" method="post" >
                                    <input type="submit" value="Reset all Customer">
                                {{ Form::token() }}
                                </form>
                                </td>                        
			</tr>
			</table>
		
	</div>
  <h3>搜尋顧客</h3>
  <div>
    <p>

	<table id="questionnairetable" class="cell-border">
	    <thead>
                <tr>
                    <th>會員編號</th>
                    <th>會員姓名</th>
                    <th>電話</th>
                    <th>更新時間</th>
                </tr>
            </thead>
 
            <tfoot>
                <tr>
                    <th>會員編號</th>
                    <th>會員姓名</th>
                    <th>電話</th>
                    <th>更新時間</th>
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
                </tr>
		
            </tbody>
	</table>

	</div>
	  
</div>
@stop



