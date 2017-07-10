@extends('layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">

                <!-- form start -->
                {!! Form::open(array('url'=>$ctrl_url,'class'=>'form-horizontal')) !!}
                    @include('users.permission.partials.form')
                
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="save" class="btn btn-info waves-effect waves-light m-t-10">Save</button>
                            <a class="btn btn-danger waves-effect waves-light m-t-10" href="{{ url($ctrl_url) }}">Cancel</a>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>
</section>    
@stop