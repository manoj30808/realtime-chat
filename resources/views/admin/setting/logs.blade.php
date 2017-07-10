@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table id="example1" class="table">
                        @if($items->count())
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th width="50">Model</th>
                                <th width="50">Action</th>
                                <th width="100">Affected By</th>
                                <th width="10">Record Id</th>
                                <th width="100">Date Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $value)
                            <tr>
                                <td width="10">{{$srno++ }}</td>
                                <td width="50">{{$value->subject_type}}</td>
                                <td width="50">{{$value->description}}</td>
                                <td width="100">{{$users[$value->causer_id]}}</td>
                                <td width="10">{{$value->subject_id}}</td>
                                <td width="100">{{$value->created_at}}</td>
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