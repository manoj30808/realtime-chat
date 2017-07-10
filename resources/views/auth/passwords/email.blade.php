@extends('layouts.auth')
@section('content')
<div class="container">
    <section id="wrapper" class="new-login-register">
        <div class="new-login-box">
            <div class="white-box">
                @include('layouts.partials.notifications')
                @if (session('status'))
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('status') }}
                </div>
                @endif
                <h3 class="box-title m-b-0">Reset Password</h3>
                <small>Enter your details below</small>
                <form class="form-horizontal new-lg-form" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="email" placeholder="E-Mail Address" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection