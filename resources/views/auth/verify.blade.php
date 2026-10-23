@extends('layouts.app_authentication')

@section('title', 'Verificar correo')

@push('css')
<style>
    /* ===== Fondo estilizado (solo tonos stone) ===== */
    body.login-page {
        background-color: #f5f5f4;
        background-image:
            radial-gradient(60rem 40rem at 10% 0%, #e7e5e4 0%, transparent 60%),
            radial-gradient(50rem 35rem at 100% 100%, #d6d3d1 0%, transparent 55%),
            linear-gradient(to right, rgba(120, 113, 108, .08) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(120, 113, 108, .08) 1px, transparent 1px);
        background-size: auto, auto, 44px 44px, 44px 44px;
        min-height: 100vh;
        height: auto;
        padding: 1.5rem 0;
    }

    /* ===== Contenedor y tarjeta ===== */
    .auth-wrap {
        width: 100%;
        max-width: 420px;
        padding: 1.5rem;
    }

    .auth-brand {
        margin-bottom: 1.5rem;
        text-align: center;
        font-size: .75rem;
        font-weight: 600;
        letter-spacing: .25em;
        text-transform: uppercase;
        color: #78716c;
    }

    .auth-card {
        background: #fff;
        border: 1px solid #e7e5e4;
        border-radius: 1rem;
        padding: 2.25rem 2rem;
        box-shadow: 0 25px 50px -12px rgba(68, 64, 60, .18);
    }

    .auth-title {
        margin: 0 0 1.25rem;
        font-size: 1.5rem;
        font-weight: 600;
        letter-spacing: -.02em;
        color: #1c1917;
    }

    /* ===== Aviso de enlace reenviado ===== */
    .auth-alert {
        margin-bottom: 1.25rem;
        padding: .8rem 1rem;
        font-size: .85rem;
        color: #292524;
        background: #f5f5f4;
        border: 1px solid #e7e5e4;
        border-left: 3px solid #1c1917;
        border-radius: .5rem;
    }

    /* ===== Texto ===== */
    .auth-text {
        margin: 0;
        font-size: .95rem;
        line-height: 1.6;
        color: #57534e;
    }

    /* Botón de reenvío con apariencia de enlace (sigue siendo un submit) */
    .auth-inline-btn {
        display: inline;
        padding: 0;
        margin: 0;
        font: inherit;
        font-weight: 600;
        color: #1c1917;
        background: none;
        border: 0;
        text-decoration: underline;
        text-underline-offset: 3px;
        cursor: pointer;
    }

    .auth-inline-btn:hover { color: #78716c; }
</style>
@endpush

@section('content')
<div class="auth-wrap">

    <div class="auth-brand">{{ config('app.name') }}</div>

    <div class="auth-card">
        <h1 class="auth-title">{{ __('Verify Your Email Address') }}</h1>

        @if (session('resent'))
        <div class="auth-alert" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif

        <div class="auth-text">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form method="POST" action="{{ route('verification.resend') }}" style="display:inline">
                @csrf
                <button type="submit" class="auth-inline-btn">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>

</div>
@endsection
