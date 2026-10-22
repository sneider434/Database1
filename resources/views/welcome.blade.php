<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-white text-neutral-900 antialiased flex items-center justify-center px-6">

<main class="w-full max-w-sm">

    {{-- Marca --}}
    <p class="text-xs font-medium uppercase tracking-widest text-neutral-400 mb-6">
        {{ config('app.name') }}
    </p>

    {{-- Título --}}
    <h1 class="text-4xl font-semibold tracking-tight leading-tight">
        Eventos y asistentes,<br>en un solo lugar.
    </h1>
    <p class="mt-4 text-neutral-500">
        Crea eventos, registra asistentes y lleva el control de cada inscripción.
    </p>

    {{-- Acciones --}}
    <div class="mt-10 space-y-3">
        <a href="{{ route('login') }}"
           class="block w-full rounded-lg bg-neutral-900 py-3 text-center text-sm font-medium text-white transition hover:bg-neutral-700">
            Iniciar sesión
        </a>

        <a href="{{ route('register') }}"
           class="block w-full rounded-lg border border-neutral-300 py-3 text-center text-sm font-medium text-neutral-900 transition hover:border-neutral-900">
            Crear cuenta
        </a>
    </div>

    {{-- Pie --}}
    <p class="mt-10 text-xs text-neutral-400">
        ¿Necesitas ayuda?
        <a href="#" class="underline underline-offset-2 hover:text-neutral-900">Contáctanos</a>
    </p>

</main>

</body>
</html>
