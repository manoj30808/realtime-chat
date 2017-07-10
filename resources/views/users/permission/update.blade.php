@extends('layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">

                {!! Form::model($item, array('method' => 'PATCH', 'url' => $ctrl_url.'/'.$item['id'],'class'=>'form-horizontal')) !!}
                    @include($view_path.'.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</section>
@stop