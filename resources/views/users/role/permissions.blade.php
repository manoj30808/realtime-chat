@extends('layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <div class="box-header">
                    <h3 class="panel-title">Give permission for role : <strong> {{$role['name']}}</strong></h3>
                </div>
                <div class="box-body">
                   {!! Form::open(array('url' => $ctrl_url.'/'.$role['id'].'/permission','class'=>'form-inline')) !!}
                   <div class="pull-right">
                   {{-- <button type="submit" name="save" class="btn btn-success">Save</button> --}}
                   </div>
                    <div class="clearfix">
                        <table id="example1" class="table table-bordered table-condensed">
                            @if(!empty($items))
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $value)
                                <tr>
                                    <td>{!!Form::checkbox('permissions[]',$value->id,(in_array($value->id,$selected_perm)?TRUE:FALSE),array('class'=>'permissions'))!!}</td>
                                    <th>{{$value->name}}</th>
                                    <td>{{$value->display_name}}</td>
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
                    <button type="submit" name="save" class="btn btn-success">Save</button>
                    {!! Form::close() !!}
               </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('script')
<script type="text/javascript">
(function() {
    $(document).ready(function(){
        $('.select-all').click(function(){
            if($(this).prop('checked')){
                $('.permissions').prop('checked',true);
            }else{
                $('.permissions').prop('checked',false);
            }
        });
    });
})(jQuery);
</script>
@stop