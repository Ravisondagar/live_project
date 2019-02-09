@extends('layouts.app')
@section('content')
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
        <div class="login-box bg-white box-shadow pd-30 border-radius-5">
            <img src="{!! asset('theme/vendors/images/login-img.png')!!}" alt="login" class="login-img">
            <h2 class="text-center mb-30">Forgot Password</h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                       <p>Enter your email address to reset your password</p>
                            <div class="input-group custom input-group-lg">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary">
                                                {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                                    <div class="col-sm-8">
                                        <div class="forgot-password"><a href="{!! route('login') !!}" class="btn btn-outline-primary btn-lg btn-block">Sign In</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
    </div>
@endsection
