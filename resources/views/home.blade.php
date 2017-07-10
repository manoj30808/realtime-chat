@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <p>You are logged in as <strong style="color:blue;"> @role('admin') Admin @endrole @role('user') User @endrole </strong> Role</p>
            </div>
        </div>
    </div>
</div>
@endsection