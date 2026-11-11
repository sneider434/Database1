@extends('layouts.app_authentication')

@section('title', 'Verify Email')

@section('content')
<div class="auth-wrap">
    <div class="auth-brand">{{ config('app.name') }}</div>

    <div class="auth-card">
        <h1 class="auth-title">Verify Your Email Address</h1>
        <p class="auth-subtitle">One more step before you continue</p>

        @if (session('resent'))
        <div class="auth-alert" role="alert">
            A fresh verification link has been sent to your email address.
        </div>
        @endif

        <div class="auth-text" style="margin:0">
            Before proceeding, please check your email for a verification link.
            If you did not receive the email,
            <form method="POST" action="{{ route('verification.resend') }}" style="display:inline">
                @csrf
                <button type="submit" class="auth-inline-btn">click here to request another</button>.
            </form>
        </div>
    </div>
</div>
@endsection
