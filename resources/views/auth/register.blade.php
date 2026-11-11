@extends('layouts.app_authentication')

@section('title', 'Register')

@section('content')
<div class="auth-wrap">
    <div class="auth-brand">{{ config('app.name') }}</div>

    <div class="auth-card">
        <h1 class="auth-title">Register</h1>
        <p class="auth-subtitle">Fill in your details to create your account</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth-field">
                <label for="name" class="auth-label">Name</label>
                <input id="name" type="text" class="auth-input @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="email" class="auth-label">Email Address</label>
                <input id="email" type="email" class="auth-input @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password" class="auth-label">Password</label>
                <input id="password" type="password" class="auth-input @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">
                @error('password')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password-confirm" class="auth-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="auth-input"
                       name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="auth-btn">Register</button>

            <a class="auth-link" href="{{ route('login') }}">Already have an account? Login</a>
        </form>
    </div>
</div>
@endsection
