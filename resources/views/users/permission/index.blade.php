@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                {{-- @include('users.permission.partials.search') --}}
                <div>
                    <h3 class="box-title">
                    <a class="btn btn-sm btn-primary" href="{{'permission/create'}}">
                        Add Permission
                    </a>
                    </h3>
                </div>
                
                <table id="example1" class="table table-bordered table-condensed">
                    @if($items->count())
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th width="120"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $value)
                        <tr>
                            <td>{{$srno++ }}</td>
                            <th>{{$value->name}}</th>
                            <td>{{$value->display_name}}</td>
                            <td>{{$value->description}}</td>
                            <td>
                                {!! Form::open(array('url' => $ctrl_url.'/'.$value->id,'method'=>'delete','class'=>'form-inline')) !!}
                                <a href="{{url($ctrl_url.'/'.$value->id.'/edit')}}" class="btn btn-small btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <button type="submit" class="btn btn-danger delete-confirm"><span class="glyphicon glyphicon-trash"></span></button>
                                {!! Form::close() !!}
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
@stop