@extends('layouts.app')

@section('content')
<div class="container auth-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="auth-card">
                <div class="form-group row title-container">
                    <div class="col-md-12">
                        <span class="logo-container">
                            <img src="{{ asset('images/logo.svg') }}" alt="logo">
                        </span>
                    </div>
                </div>

                <div class="form-group row title-container">
                    <div class="col-md-12">
                        <h2>{{ __('Verify Your Email Address') }}</h2>
                    </div>
                </div>

                <div class="button-container">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="blue-btn">
                            {{ __('click here to request another') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
