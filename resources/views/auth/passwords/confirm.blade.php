@extends('layouts.app_authentication')

@section('title', 'Confirm Password')

@section('content')
<div class="auth-wrap">
    <div class="auth-brand">{{ config('app.name') }}</div>

    <div class="auth-card">
        <h1 class="auth-title">Confirm Password</h1>
        <p class="auth-subtitle">Please confirm your password before continuing</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="auth-field">
                <label for="password" class="auth-label">Password</label>
                <input id="password" type="password" class="auth-input @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password" autofocus>
                @error('password')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button type="submit" class="auth-btn">Confirm Password</button>

            @if (Route::has('password.request'))
            <a class="auth-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
            @endif
        </form>
    </div>
</div>
@endsection
