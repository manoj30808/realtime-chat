@extends('layouts.auth')
@section('content')
<style>
    .alert.parsley {
        margin-top: 5px;
        margin-bottom: 0px;
        padding: 10px 15px 10px 15px;
    }
    .check .alert {
        margin-top: 20px;
    }
    .credit-card-box .panel-title {
        display: inline;
        font-weight: bold;
    }
    .credit-card-box .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 100%;
    }
    .credit-card-box .display-tr {
        display: table-row;
    }
</style>
<section id="wrapper" class="new-login-register">
    <div class="new-login-box">
        <div class="white-box">
            @include('layouts.partials.notifications')
            <h3 class="box-title m-b-0">Stripe Payment</h3>
            <small>Enter your details below</small>
            <form class="form-horizontal new-lg-form" role="form" data-parsley-validate id="payment-form" method="POST" action="{{ url('payment') }}">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('stripe_plan') ? ' has-error' : '' }} m-t-20">
                    <div class="col-xs-12">
                        {!! Form::select('stripe_plan', ['10' => '10', '20' => '20', '30' => '30'], 'Book', [
                        'class'                       => 'form-control',
                        'required'                    => 'required',
                        'data-parsley-class-handler'  => '#product-group'
                        ]) !!}
                        @if ($errors->has('stripe_plan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stripe_plan') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-8">
                        {!! Form::text(null, null, [
                        'class'                         => 'form-control',
                        'placeholder'                         => 'Credit card number',
                        'required'                      => 'required',
                        'data-stripe'                   => 'number',
                        'data-parsley-type'             => 'number',
                        'maxlength'                     => '16',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-class-handler'    => '#cc-group'
                        ]) !!}
                    </div>
                    <div class="col-xs-4">
                    	{!! Form::text(null, null, [
                        'class'                         => 'form-control',
                        'required'                      => 'required',
                        'data-stripe'                   => 'cvc',
                        'placeholder'                   => 'CVC',
                        'data-parsley-type'             => 'number',
                        'data-parsley-trigger'          => 'change focusout',
                        'maxlength'                     => '4',
                        'data-parsley-class-handler'    => '#ccv-group'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group">
                	<div class="col-xs-6">
                		{!! Form::selectMonth(null, null, [
                            'class'                 => 'form-control',
                            'required'              => 'required',
                            'data-stripe'           => 'exp-month'
                        ], '%m') !!}
                    </div>
                    <div class="col-xs-6">
                		{!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                            'class'             => 'form-control',
                            'required'          => 'required',
                            'data-stripe'       => 'exp-year'
                            ]) !!}
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button id="submitBtn" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light btn-order" type="submit">Payment</button>
                    </div>
                </div>
                <label class="payment-errors" style="color: red;"></label>
                </form>
            </div>
        </div>
    </section>
    <!-- PARSLEY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
            errorClass: 'has-error',
            successClass: 'has-success'
        };
    </script>
    
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey("pk_test_LW15D0PhMlLyT9vTIIfpOc0f");
        jQuery(function($) {
            $('#payment-form').submit(function(event) {
            	var $form = $(this);
                $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
                    formInstance.submitEvent.preventDefault();
                    alert();
                    return false;
                });
                $form.find('#submitBtn').prop('disabled', true);
                Stripe.card.createToken($form, stripeResponseHandler);
                return false;
            });
        });
        function stripeResponseHandler(status, response) {
        	var $form = $('#payment-form');
            if (response.error) {
                $form.find('.payment-errors').text(response.error.message);
                $form.find('.payment-errors').addClass('alert alert-danger');
                $form.find('#submitBtn').prop('disabled', false);
                $('#submitBtn').button('reset');
            } else {
                var token = response.id;
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                $form.get(0).submit();
            }
        };
    </script>
@endsection