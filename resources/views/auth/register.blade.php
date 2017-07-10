@extends('layouts.auth')
@section('content')
<section id="wrapper" class="new-login-register">
    <div class="new-login-box">
        <div class="white-box">
            @include('layouts.partials.notifications')
            <h3 class="box-title m-b-0">Sign up to Panel</h3>
            <small>Enter your details below</small>
            <form class="form-horizontal new-lg-form" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} {{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <div class="col-xs-6">
                        <input id="first_name" type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                        @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-xs-6">
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Last Name">
                        @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- @if ($login_with=='both')
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="login_with" value="both">
                @else
                    <div class="form-group{{ $errors->has($login_with) ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="{{$login_with}}" type="text" class="form-control" name="{{$login_with}}" value="{{ old($login_with) }}" placeholder="{{ ucfirst($login_with) }}">
                            @if ($errors->has($login_with))
                            <span class="help-block">
                                <strong>{{ $errors->first($login_with) }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                @endif --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ ucfirst('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('home_contact_num') ? ' has-error' : '' }}">
                    <div class="col-xs-4">
                        {!! Form::text('home_contact_ext',old('home_contact_ext'),array('class'=>'form-control','placeholder'=>'Extension','data-mask'=>"9999")) !!}
                        @if ($errors->has('home_contact_ext'))
                        <span class="help-block">
                            <strong>{{ $errors->first('home_contact_ext') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-xs-8">
                        {!! Form::text('home_contact_num',old('home_contact_num'),array('class'=>'form-control','placeholder'=>'Phone No','data-mask'=>"999 999-9999")) !!}
                        @if ($errors->has('home_contact_num'))
                        <span class="help-block">
                            <strong>{{ $errors->first('home_contact_num') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="form-control"  placeholder="Password" name="password" required>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}" style="margin-left: 0.5%;">
                    {!! Form::captcha() !!}
                    @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded  text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="{{route('login')}}" class="text-danger m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
            {!! Captcha::script() !!}
        </div>
    </div>
</section>
@endsection