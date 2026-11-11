@extends('layouts.app_authentication')

@section('title', 'Reset Password')

@section('content')
<div class="auth-wrap">
    <div class="auth-brand">{{ config('app.name') }}</div>

    <div class="auth-card">
        <h1 class="auth-title">Reset Password</h1>
        <p class="auth-subtitle">We will email you a link to reset it</p>

        @if (session('status'))
        <div class="auth-alert" role="alert">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="auth-field">
                <label for="email" class="auth-label">Email Address</label>
                <input id="email" type="email" class="auth-input @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button type="submit" class="auth-btn">Send Password Reset Link</button>

            <a class="auth-link" href="{{ route('login') }}">Back to login</a>
        </form>
    </div>
</div>
@endsection
