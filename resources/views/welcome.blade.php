<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Fondo: degradados suaves + cuadrícula que se desvanece hacia los bordes */
        .bg-stylized {
            background-color: #f5f5f4;
            background-image:
                radial-gradient(60rem 40rem at 15% 0%, #e7e5e4 0%, transparent 60%),
                radial-gradient(55rem 38rem at 100% 100%, #d6d3d1 0%, transparent 55%);
        }

        .bg-grid {
            background-image:
                linear-gradient(to right, rgba(120, 113, 108, .12) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(120, 113, 108, .12) 1px, transparent 1px);
            background-size: 48px 48px;
            -webkit-mask-image: radial-gradient(ellipse at center, #000 20%, transparent 72%);
            mask-image: radial-gradient(ellipse at center, #000 20%, transparent 72%);
        }
    </style>
</head>
<body class="bg-stylized relative min-h-screen overflow-hidden text-stone-900 antialiased">

{{-- Cuadrícula decorativa --}}
<div class="bg-grid pointer-events-none absolute inset-0"></div>

{{-- Círculos difuminados --}}
<div class="pointer-events-none absolute -left-24 -top-24 h-96 w-96 rounded-full bg-stone-300/40 blur-3xl"></div>
<div class="pointer-events-none absolute -bottom-32 -right-24 h-[28rem] w-[28rem] rounded-full bg-stone-400/30 blur-3xl"></div>

{{-- Contenido --}}
<main class="relative z-10 flex min-h-screen flex-col items-center justify-center px-6 text-center">

        <span class="mb-8 rounded-full border border-stone-300 bg-white/70 px-4 py-1.5 text-xs font-medium uppercase tracking-[0.25em] text-stone-500 backdrop-blur">
            {{ config('app.name') }}
        </span>

    <h1 class="max-w-3xl text-5xl font-semibold leading-[1.05] tracking-tight sm:text-6xl lg:text-7xl">
        Organiza eventos.<br>
        <span class="text-stone-400">Controla asistentes.</span>
    </h1>

    <p class="mt-6 max-w-md text-lg text-stone-500">
        Crea tus eventos, registra a cada asistente y consulta las inscripciones desde un solo panel.
    </p>

    <div class="mt-10 flex flex-wrap justify-center gap-3">
        <a href="{{ route('login') }}"
           class="rounded-xl bg-stone-900 px-8 py-3.5 text-sm font-medium text-white shadow-lg shadow-stone-900/20 transition hover:-translate-y-0.5 hover:bg-stone-700">
            Iniciar sesión
        </a>
        <a href="{{ route('register') }}"
           class="rounded-xl border border-stone-300 bg-white/80 px-8 py-3.5 text-sm font-medium text-stone-900 backdrop-blur transition hover:-translate-y-0.5 hover:border-stone-900">
            Crear cuenta
        </a>
    </div>

</main>

</body>
</html>
