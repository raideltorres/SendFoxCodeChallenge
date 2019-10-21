@extends('layouts.app')

@section('content')
<div class="container auth-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="auth-card">
                <form method="POST" action="{{ route('password.email') }}">
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
                            <h2>{{ __('Reset Password') }}</h2>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group row input-container">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0 button-container">
                        <div class="col-md-12">
                            <button type="submit" class="blue-btn">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>
@endsection
