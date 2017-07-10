@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            {{-- @include($view_path.'.partials.search') --}}
            <div class="">
                <h3 class="box-title">
                    <a class="btn btn-sm btn-primary" href="{{'role/create'}}">
                    Add Role
                    </a>
                </h3>
            </div>
            <div class="table-responsive">
                <table id="example1" class="table">
                    @if($items->count())
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th width="160"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $value)
                        <tr>
                            <td>{{$srno++ }}</td>
                            <th>{{$value->name}}</th>
                            <td>{{$value->display_name}}</td>
                            <td>
                                {!! Form::open(array('url' => $ctrl_url.'/'.$value->id,'method'=>'delete','class'=>'form-inline')) !!}
                                <a class="btn btn-small btn-primary" href="{{url($ctrl_url.'/'.$value->id.'/permission')}}">
                                <span class="glyphicon glyphicon-lock"></span></a>
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
                {!! $items->appends(Request::except(array('page')))->render() !!}
            </div>
        </div>
    </div>
</div>
@stop