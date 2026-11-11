@extends('layouts.app_authentication')

@section('title', 'Login')

@section('content')
<div class="auth-wrap">
    <div class="auth-brand">{{ config('app.name') }}</div>

    <div class="auth-card">
        <h1 class="auth-title">Login</h1>
        <p class="auth-subtitle">Enter your details to continue</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="auth-field">
                <label for="email" class="auth-label">Email Address</label>
                <input id="email" type="email" class="auth-input @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password" class="auth-label">Password</label>
                <input id="password" type="password" class="auth-input @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-check">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>

            <button type="submit" class="auth-btn">Login</button>

            @if (Route::has('password.request'))
            <a class="auth-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
            @endif
        </form>
    </div>
</div>
@endsection
