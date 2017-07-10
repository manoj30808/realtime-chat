@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                {{-- <div class="pull-left">
                    @include('users.user.partials.search')
                </div> --}}
                @permission('user-add')
                    <div>
                        <h3 class="box-title">
                            <a class="btn btn-sm btn-primary" href="user/create">
                                Add User
                            </a>
                        </h3>
                    </div>
                @endpermission
                <div class="table-responsive">
                    <table id="example1" class="table">
                        @if($items->count())
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fisrt Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Last Login</th>
                                <th>Login Type</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $value)
                            <tr>
                                <td>{{$srno++ }}</td>
                                <td>{{$value->first_name}}</td>
                                <td>{{$value->last_name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->last_login}}</td>
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
                </div>
                {!! str_replace('/?', '?', $items->appends(Request::except(array('page')))->render()) !!}
            </div>
        </div>
    </div>
</div>
@endsection