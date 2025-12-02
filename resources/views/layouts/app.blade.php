<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Side Project Manager') }}</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet"/>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-dark-0 text-fg flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <x-header />
    <main class="container mx-auto px-4 py-6 flex-1 w-full max-w-5xl mt-15" >
        @if (session('status'))
            <div class="mb-4 rounded border border-success bg-dark-green px-4 py-2 text-sm text-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </main>
    <x-footer />
</body>
</html>
