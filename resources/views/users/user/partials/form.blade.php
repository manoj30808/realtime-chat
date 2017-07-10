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
<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
    <label class="col-sm-3 control-label">Select Roles</label>
    <div class="col-sm-6">
        {!! Form::select('role_id[]',$roles,old('role_id'),array('multiple'=>'multiple','class'=>'form-control')) !!}
        {!! $errors->first('role_id[]', '<span class="help-block">:message</span>') !!}
    </div>
</div>