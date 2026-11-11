<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    @vite(['resources/sass/app.scss','resources/js/app.js'])

    <style>
        /* ===== Shared auth design (stone tones) ===== */
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
        .auth-wrap { width: 100%; max-width: 420px; padding: 1.5rem; }
        .auth-brand {
            margin-bottom: 1.5rem; text-align: center; font-size: .75rem; font-weight: 600;
            letter-spacing: .25em; text-transform: uppercase; color: #78716c;
        }
        .auth-card {
            background: #fff; border: 1px solid #e7e5e4; border-radius: 1rem;
            padding: 2.25rem 2rem; box-shadow: 0 25px 50px -12px rgba(68, 64, 60, .18);
        }
        .auth-title { margin: 0 0 .35rem; font-size: 1.75rem; font-weight: 600; letter-spacing: -.02em; color: #1c1917; }
        .auth-subtitle { margin: 0 0 1.75rem; font-size: .9rem; color: #a8a29e; }
        .auth-text { margin: 0 0 1.5rem; font-size: .95rem; line-height: 1.6; color: #57534e; }
        .auth-field { margin-bottom: 1.15rem; }
        .auth-label { display: block; margin-bottom: .4rem; font-size: .8rem; font-weight: 600; color: #44403c; }
        .auth-input {
            width: 100%; padding: .7rem .9rem; font-size: .95rem; color: #1c1917; background: #fafaf9;
            border: 1px solid #d6d3d1; border-radius: .6rem; outline: none;
            transition: border-color .15s, box-shadow .15s, background .15s;
        }
        .auth-input:focus { background: #fff; border-color: #1c1917; box-shadow: 0 0 0 3px rgba(28, 25, 23, .08); }
        .auth-input.is-invalid { border-color: #44403c; background: #fff; }
        .auth-error {
            display: block; margin-top: .4rem; font-size: .8rem; color: #44403c;
            border-left: 2px solid #1c1917; padding-left: .5rem;
        }
        .auth-alert {
            margin-bottom: 1.25rem; padding: .8rem 1rem; font-size: .85rem; color: #292524;
            background: #f5f5f4; border: 1px solid #e7e5e4; border-left: 3px solid #1c1917; border-radius: .5rem;
        }
        .auth-check { display: flex; align-items: center; gap: .5rem; margin: 1.25rem 0 1.5rem; font-size: .85rem; color: #57534e; }
        .auth-check input { accent-color: #1c1917; width: 1rem; height: 1rem; margin: 0; }
        .auth-check label { margin: 0; cursor: pointer; font-weight: 400; }
        .auth-btn {
            width: 100%; margin-top: .5rem; padding: .8rem 1rem; font-size: .9rem; font-weight: 600;
            color: #fff; background: #1c1917; border: 0; border-radius: .6rem; cursor: pointer;
            transition: background .15s, transform .15s;
        }
        .auth-btn:hover { background: #44403c; }
        .auth-btn:active { transform: scale(.99); }
        .auth-link {
            display: block; margin-top: 1.1rem; text-align: center; font-size: .85rem; color: #78716c;
            text-decoration: underline; text-underline-offset: 3px;
        }
        .auth-link:hover { color: #1c1917; }
        .auth-inline-btn {
            display: inline; padding: 0; margin: 0; font: inherit; font-weight: 600; color: #1c1917;
            background: none; border: 0; text-decoration: underline; text-underline-offset: 3px; cursor: pointer;
        }
        .auth-inline-btn:hover { color: #78716c; }
    </style>
    @stack('css')
</head>
<body class="hold-transition login-page">
@yield('content')

<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
@stack('scripts')
</body>
</html>
