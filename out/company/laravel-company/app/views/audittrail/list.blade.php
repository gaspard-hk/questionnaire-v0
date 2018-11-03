@extends('layout.admin')
@section('header')
<script>
    $(document).ready( function () {
        $( "#accordion" ).accordion({heightStyle: "content"});
        $( "#audittrailtable" ).DataTable({
            "order": [[ 2, "desc" ]],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        });
        
        $( "#deletefrom,#deleteto" ).datepicker();
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });  
        
    } );
</script>
@show
@section('content')
<div id="accordion">
  <h3>使用者活動紀錄</h3>
  <div>
    <p>

	<table id="audittrailtable" class="display">
	    <thead>
            <tr>                
                <th>IP</th>
                <th>活動</th>
                <th>時間</th>
                
            </tr>
        </thead>
 
        <tfoot>
            <tr>                
                <th>IP</th>
                <th>活動</th>
                <th>時間</th>
            </tr>
        </tfoot>
		
		<tbody>
			@foreach ($audittrails as $audittrailarr)
			<tr>
                        <td>				
				{{ $audittrailarr['IP'] }}				
			</td>
			<td>
				{{ $audittrailarr['action'] }}				
			</td>
			<td>                
                                {{ $audittrailarr['updated_at'] }}
                                                      
			</td>
            @endforeach
		</tbody>
	</table>

	</div>
	<h3>刪除使用者活動紀錄</h3>
	<div>
            <p>
        <form action="{{ URL::route('audittrail-delete-post') }}" method="post">
			
			<table>
			<tr>
				<th>
					From:
				</th>
				<td>
					<div class="field">
						<input type="text" name="From" id="deletefrom"></input>						
					</div>    
				</td>
			</tr>	
			<tr>
				<th>
					To:
				</th>
				<td>
					<div class="field">
						<input type="text" name="To" id="deleteto"></input>						
					</div>
				</td>
			</tr>                        
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="Delete">
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		</form>
    </p>   
	</div>
</div>
@stop


