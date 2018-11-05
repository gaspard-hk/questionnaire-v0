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

        $('#createusertable').DataTable( {
			"paging":   false,
			"ordering": false,
			"info":     false,
			"filter":   false,
		} );
		
		
    } );
</script>
@show
@section('content')
<div id="accordion">
  <h3>編輯使用者</h3>
  <div>
    <p>

	<table id="usertable" class="cell-border">
	    <thead>
            <tr>
                <th>使用者名稱</th>                
                <th>刪除</th>

            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>使用者名稱</th>
                <th></th>

            </tr>
        </tfoot>
		
		<tbody>
			@foreach ($users as $usersarr)
			<tr>
			<td>
				{{ $usersarr['username'] }}				
			</td>
			<td>             
                            <form action="{{ URL::route('account-edit-post') }}" method="post">
                                <input type="hidden" name="id" value="{{ $usersarr['id'] }}">
								<input type="submit" value="編輯">
								{{ Form::token() }}
                            </form>
			</td>

                        @endforeach
		</tbody>
	</table>

	</div>
	<h3>新增使用者</h3>
  <div>
    <form action="{{ URL::route('account-create-post') }}" method="post">
			
			<table id="createusertable">
			<tr>
				<td>
					使用者名稱:
				</td>
				<td>
					<div class="field">
						<input type="text" name="username"></input>
						@if ($errors->has('username'))
							{{ $errors->first('username')}}
						@endif
					</div>    
				</td>
			</tr>	
			<tr>
				<td>
					密碼:
				</td>
				<td>
					<div class="field">
						<input type="password" name="password"></input>
						@if ($errors->has('password'))
							{{ $errors->first('password')}}
						@endif
					</div>
				</td>
			</tr>
                        <tr>
				<td>
					重新輸入密碼:
				</td>
				<td>
					<div class="field">
						<input type="password" name="password"></input>
						@if ($errors->has('password'))
							{{ $errors->first('password')}}
						@endif
					</div>
				</td>
			</tr>
			<tr>
				<td>
					類型:
				</td>
				<td>
					<div class="field">
  						<select name="type">
						  <option value="1">管理員</option>
						  <option value="2">普通</option>
						</select>
						
						@if ($errors->has('username'))
							{{ $errors->first('username')}}
						@endif
					</div>    
				</td>
			</tr>
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="Add user">
					{{ Form::token() }}
				</td>
			</tr>
			</table>
		</form>
	</div>
	
</div>
@stop


