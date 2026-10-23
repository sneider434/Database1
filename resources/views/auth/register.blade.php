@extends('layouts.app_authentication')

@section('title', 'Registro')

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
        height: auto;            /* el registro es más alto: permite scroll */
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
        margin: 0 0 .35rem;
        font-size: 1.75rem;
        font-weight: 600;
        letter-spacing: -.02em;
        color: #1c1917;
    }

    .auth-subtitle {
        margin: 0 0 1.75rem;
        font-size: .9rem;
        color: #a8a29e;
    }

    /* ===== Campos ===== */
    .auth-field { margin-bottom: 1.15rem; }

    .auth-label {
        display: block;
        margin-bottom: .4rem;
        font-size: .8rem;
        font-weight: 600;
        color: #44403c;
    }

    .auth-input {
        width: 100%;
        padding: .7rem .9rem;
        font-size: .95rem;
        color: #1c1917;
        background: #fafaf9;
        border: 1px solid #d6d3d1;
        border-radius: .6rem;
        outline: none;
        transition: border-color .15s, box-shadow .15s, background .15s;
    }

    .auth-input:focus {
        background: #fff;
        border-color: #1c1917;
        box-shadow: 0 0 0 3px rgba(28, 25, 23, .08);
    }

    .auth-input.is-invalid { border-color: #44403c; background: #fff; }

    .auth-error {
        display: block;
        margin-top: .4rem;
        font-size: .8rem;
        color: #44403c;
        border-left: 2px solid #1c1917;
        padding-left: .5rem;
    }

    /* ===== Botón ===== */
    .auth-btn {
        width: 100%;
        margin-top: .5rem;
        padding: .8rem 1rem;
        font-size: .9rem;
        font-weight: 600;
        color: #fff;
        background: #1c1917;
        border: 0;
        border-radius: .6rem;
        cursor: pointer;
        transition: background .15s, transform .15s;
    }

    .auth-btn:hover { background: #44403c; }
    .auth-btn:active { transform: scale(.99); }
</style>
@endpush

@section('content')
<div class="auth-wrap">

    <div class="auth-brand">{{ config('app.name') }}</div>

    <div class="auth-card">
        <h1 class="auth-title">{{ __('Register') }}</h1>
        <p class="auth-subtitle">Completa tus datos para crear tu cuenta</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth-field">
                <label for="name" class="auth-label">{{ __('Name') }}</label>
                <input id="name" type="text"
                       class="auth-input @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}"
                       required autocomplete="name" autofocus>

                @error('name')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="email" class="auth-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="auth-input @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}"
                       required autocomplete="email">

                @error('email')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password" class="auth-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="auth-input @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="auth-error" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password-confirm" class="auth-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password"
                       class="auth-input"
                       name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="auth-btn">
                {{ __('Register') }}
            </button>
        </form>
    </div>

</div>
@endsection
