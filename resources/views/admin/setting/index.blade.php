@extends('layouts.app')

@section('content')
<!-- Main content -->
    <section class="content">
    	@include('users.user.partials.search')

            
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <h3 class="box-title">Listing</h3>
                        </div>
                        @permission('user-add')
                            <div class="pull-right">
                                <h3 class="box-title">
                                    <a class="btn btn-sm btn-primary" href="user/create">
                                        Add User
                                    </a>
                                </h3>
                            </div>
                        @endpermission
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-condensed">
                        @if($items->count())
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Login Type</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $value)
                            <tr>
                                <td>{{$srno++ }}</td>
                                <th>{{$value->name}}</th>
                                <td>{{$value->email}}</td>
                                <td>{{$value->provider}}</td>
                                <td>
                                @permission('user-edit')
                                    {!! Form::open(array('url' => 'user/'.$value->id,'method'=>'delete','class'=>'form-inline')) !!}
                                         <a href="{{url('user/'.$value->id.'/edit')}}" class="btn btn-small btn-primary">Edit</a>
                                    {!! Form::close() !!}
                                @endpermission
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <th>There are no records</th>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                 {!! str_replace('/?', '?', $items->appends(Request::except(array('page')))->render()) !!}
            </div>
        </div>
    </div>
</div>
</section>
@stop
