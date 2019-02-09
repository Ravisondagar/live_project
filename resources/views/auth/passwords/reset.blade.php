@extends('layouts.app')

@section('content')
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
        <div class="login-box bg-white box-shadow pd-30 border-radius-5">
            <img src="{!! asset('theme/vendors/images/login-img.png') !!}" alt="login" class="login-img">
            <h2 class="text-center mb-30">Reset Password</h2>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <p>Enter your new password, confirm and submit</p>
                        <div class="input-group custom input-group-lg">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <div class="input-group custom input-group-lg">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <div class="input-group custom input-group-lg">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
