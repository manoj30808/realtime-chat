@extends('layouts.auth')
@section('content')
<div class="container">
    <section id="wrapper" class="new-login-register">
        <div class="new-login-box">
            <div class="white-box">
                @if (session('status'))
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('status') }}
                </div>
                @endif
                <h3 class="box-title m-b-0">Reset Password</h3>
                <small>Enter your details below</small>
                <form class="form-horizontal new-lg-form" role="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="email" placeholder="E-Mail Address" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Reset Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection