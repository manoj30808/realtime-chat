@extends('layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                {!! Form::model($item, array('method' => 'POST', 'url' => 'user/profile','class'=>'form-horizontal')) !!}
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-6">
                        {!! Form::text('first_name',null,array('class'=>'form-control')) !!}
                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-6">
                        {!! Form::text('last_name',null,array('class'=>'form-control')) !!}
                        {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        {!! Form::text('email',null,array('class'=>'form-control')) !!}
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                {{-- 
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-6">
                        {!! Form::text('username',null,array('class'=>'form-control')) !!}
                        {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
                    </div>
                </div> --}}
                @if(isset($item->is_profile_updated) && !empty($item->is_profile_updated) )
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        {!! Form::password('password',array('class'=>'form-control')) !!}
                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-6">
                        {!! Form::password('password_confirmation',array('class'=>'form-control')) !!}
                        {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                @endif

                <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-6">
                        {!! Form::select('gender',['Male'=>'Male','Female'=>'Female'],old('gender'),array('class'=>'form-control')) !!}
                        {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Date Of Birth</label>
                    <div class="col-sm-6">
                        {!! Form::text('dob',old('dob'),array('class'=>'form-control mydatepicker')) !!}
                        {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Street Address</label>
                    <div class="col-sm-6">
                        {!! Form::text('address',old('address'),array('class'=>'form-control')) !!}
                        {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                           {{--
                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">City</label>
                    <div class="col-sm-6">
                        {!! Form::text('city',old('city'),array('class'=>'form-control')) !!}
                        {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">State</label>
                    <div class="col-sm-6">
                        {!! Form::select('state',$state,old('state',explode(',', $item['state'])),array('class'=>'form-control')) !!}
                        {!! $errors->first('state', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>    

                <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Zip Code</label>
                    <div class="col-sm-4">
                        {!! Form::text('zipcode',old('zipcode'),array('class'=>'form-control','placeholder'=>'Zipcode','data-mask'=>"99999")) !!}
                        {!! $errors->first('zipcode', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('zipcode_ext',old('zipcode_ext'),array('class'=>'form-control','placeholder'=>'Extension','data-mask'=>"9999")) !!}
                        {!! $errors->first('zipcode_ext', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>  
                <div class="form-group {{ $errors->has('mobile_contact_num') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Mobile</label>
                    <div class="col-sm-4">
                        {!! Form::text('mobile_contact_num',old('mobile_contact_num'),array('class'=>'form-control','placeholder'=>'Mobile Num','data-mask'=>"999 999-9999")) !!}
                        {!! $errors->first('mobile_contact_num', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('mobile_contact_ext',old('mobile_contact_ext'),array('class'=>'form-control','placeholder'=>'Extension','data-mask'=>"9999")) !!}
                        {!! $errors->first('mobile_contact_ext', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('work_contact_num') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Office Phone</label>
                    <div class="col-sm-4">
                        {!! Form::text('work_contact_num',old('work_contact_num'),array('class'=>'form-control','placeholder'=>'Office Phone Num','data-mask'=>"999 999-9999")) !!}
                        {!! $errors->first('work_contact_num', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('work_contact_ext',old('work_contact_ext'),array('class'=>'form-control','placeholder'=>'Extension','data-mask'=>"9999")) !!}
                        {!! $errors->first('work_contact_ext', '<span class="help-block">:message</span>') !!}
                    </div>
                </div> --}}
                <div class="form-group {{ $errors->has('home_contact_num') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-2">
                        {!! Form::text('home_contact_ext',old('home_contact_ext'),array('class'=>'form-control','placeholder'=>'Extension','data-mask'=>"9999")) !!}
                        {!! $errors->first('home_contact_ext', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="col-sm-4">
                        {!! Form::text('home_contact_num',old('home_contact_num'),array('class'=>'form-control','placeholder'=>'Office Phone Num','placeholder'=>'Home Phone Num','size'=>'10','data-mask'=>"999 999-9999")) !!}
                        {!! $errors->first('home_contact_num', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('interest') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Interests</label>
                    <div class="col-sm-6">
                        {!! Form::select('interest[]',$interest,old('interest',explode(',', $item['interest'])),array('class'=>'form-control','multiple'=>'multiple')) !!}
                        {!! $errors->first('interest', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('skill') ? 'has-error' : '' }}">
                    <label class="col-sm-3 control-label">Skill</label>
                    <div class="col-sm-6">
                        {!! Form::select('skill[]',$skill,old('skill',explode(',', $item['skill'])),array('class'=>'form-control','multiple'=>'multiple')) !!}
                        {!! $errors->first('skill', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                
                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" name="save" class="btn btn-info waves-effect waves-light m-t-10">Update</button>
                        <a class="btn btn-danger waves-effect waves-light m-t-10" href="{{ url('home') }}">Cancel</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div>
</section>
@stop