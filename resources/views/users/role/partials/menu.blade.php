@section('secondary-menu')
<ul class="nav navbar-nav navbar-right">
	<li><a href="{{url($ctrl_url)}}"><span class="glyphicon glyphicon-align-justify"></span> List</a></li>
	<li><a href="{{url($ctrl_url.'/create')}}"><span class="glyphicon glyphicon-plus"></span> Add Role</a></li>
</ul>
@stop