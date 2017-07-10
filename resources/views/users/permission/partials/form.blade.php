<div class='box-body'>
    <!-- Name -->
    <div class='row'>
        <!-- Name -->
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="control-label col-lg-3" for="name">Name</label>
            <div class="col-lg-6">
                {!! Form::text('name',null,array('class'=>'form-control')) !!}
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <!-- Display Nmae -->
        <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
            <label class="control-label col-lg-3" for="display_name">Display Name</label>
            <div class="col-lg-6">
                {!! Form::text('display_name',null,array('class'=>'form-control')) !!}
                {!! $errors->first('display_name', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <!-- Discription -->
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label class="control-label col-lg-3" for="description">Description</label>
            <div class="col-lg-6">
                {!! Form::textarea('description',null,array('class'=>'form-control','rows'=>'5')) !!}
                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>
</div>