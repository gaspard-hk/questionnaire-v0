<!doctype html>

<html lang="en">
<head>
	<title>Administration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{ HTML::script('js/jquery-1.11.1.min.js') }}
	{{ HTML::style('css/jquery-ui-1.11.2.custom/jquery-ui.min.css') }}	
        {{ HTML::script('css/jquery-ui-1.11.2.custom/jquery-ui.js') }}	
        {{ HTML::style('css/jquery.dataTables.css') }}
        {{ HTML::style('css/datatable/datatable.custom.css') }}	
        {{ HTML::script('js/jquery.dataTables.min.js') }}
        {{ HTML::script('js/jquery.validate.min.js') }}	
	<script>
            $(function() {
                $( "#menu" ).menu({
                    items: "> :not(.ui-widget-header)"
                });
            });
        </script>
        @section('header')
        @show
</head>
<body>
    <table border ="0">
        <tr>
            <td style="vertical-align: top; width: 250 px;">
                <ul id="menu">
                <li class="ui-widget-header">問卷管理</li>                
                <li style="white-space: nowrap;"><a href="{{ URL::route('account-list') }}">使用者</li>                
                <li style="white-space: nowrap;"><a href="{{ URL::route('shops-list') }}">新增/移除店舖</li>
		<li style="white-space: nowrap;"><a href="{{ URL::route('staff-list') }}">匯入美容師名單</li>
		<li style="white-space: nowrap;"><a href="{{ URL::route('member-list') }}">匯入顧客名單</li>
                <li style="white-space: nowrap;"><a href="{{ URL::route('online-list') }}">管理問卷數據</li>
                <li style="white-space: nowrap;"><a href="{{ URL::route('statistic-export') }}">匯出/移除問卷數據</li>
                <li style="white-space: nowrap;"><a href="{{ URL::route('ipfilter-list') }}">IP過濾器</li>
                <li style="white-space: nowrap;"><a href="{{ URL::route('audittrail-list') }}">系統使用紀綠</li>
                <li style="white-space: nowrap;"><a href="{{ URL::route('account-signout') }}">登出</a></li>
                </ul>
            </td>
            <td>
                @yield('content')
            </td>
        </tr>
        </table>
</body>
</html>
