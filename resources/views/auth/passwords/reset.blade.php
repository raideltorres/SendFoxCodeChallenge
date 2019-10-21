@extends('layouts.app')

@section('content')
<div class="container auth-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="auth-card">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <div class="form-group row title-container">
                        <div class="col-md-12">
                            <span class="logo-container">
        						<img src="{{ asset('images/logo.svg') }}" alt="logo">
        					</span>
                        </div>
                    </div>

                    <div class="form-group row title-container">
                        <div class="col-md-12">
                            <h1>{{ __('Reset Password') }}</h1>
                        </div>
                    </div>

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row input-container">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row input-container">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-7">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row input-container">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-7">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0 button-container">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="blue-btn">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
@endsection
