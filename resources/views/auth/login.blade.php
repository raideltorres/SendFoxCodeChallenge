@extends('layouts.app')

@section('content')
<div class="container auth-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<div class="auth-card">
                <form class="validate-form" method="POST" action="{{ route('login') }}">
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
                            <h1>{{ __('Log in') }}</h1>
                        </div>
                    </div>

                    <div class="form-group row input-container">
                        <label for="email" class="col-md-3 text-md-right">
                            <i class="fa fa-user"></i>
                        </label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row input-container">
                        <label for="password" class="col-md-3 text-md-right">
                            <i class="fa fa-lock"></i>
                        </label>

                        <div class="col-md-7">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row remember-container">
                        <div class="col-md-7 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0 button-container">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="blue-btn">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
				</form>
			</div>
        </div>
    </div>
</div>
@endsection
