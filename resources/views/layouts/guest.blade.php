<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased bg-slate-100">
        <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center gap-4 text-center">
                <a href="/" class="rounded-full bg-white/90 p-4 ring-1 ring-slate-200 shadow-sm transition hover:shadow-md">
                    <x-application-logo class="w-20 h-20 fill-current text-slate-500" />
                </a>
                <p class="text-sm text-slate-500 max-w-sm">Masuk atau daftar untuk mulai menggunakan layanan dengan tampilan yang lebih bersih dan modern.</p>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-8 py-10 bg-white shadow-2xl shadow-slate-300/20 overflow-hidden sm:rounded-[2rem]">
                {{ $slot }}
            </div>
        </div>
        <script>
            function togglePassword(inputId, showId, hideId) {
                const input = document.getElementById(inputId);
                if (!input) return;
                const showIcon = document.getElementById(showId);
                const hideIcon = document.getElementById(hideId);
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                if (showIcon) showIcon.classList.toggle('hidden', !isPassword);
                if (hideIcon) hideIcon.classList.toggle('hidden', isPassword);
            }
        </script>
    </body>
</html>
