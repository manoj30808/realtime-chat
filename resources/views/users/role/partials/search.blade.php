<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Search</h3>
            </div>
            <div class="box-body">
                {!! Form::open(array('url' => $ctrl_url,'method'=>'get','class'=>'form-filter','role'=>"form")) !!}
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('filter[name][value]', 'Name',array('class'=>'')) !!}
                            {!! Form::text('filter[name][value]',Request::input('filter.name.value',''),array('class'=>'form-control', 'placeholder'=>'Name')) !!}
                            {!! Form::hidden('filter[name][oprator]','like') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                    <br>
                    {!! Form::submit('Search', array('class' => 'btn btn-primary submit')) !!}
                    {!! link_to($ctrl_url, 'Cancel',array('class' => 'btn btn-default')) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

