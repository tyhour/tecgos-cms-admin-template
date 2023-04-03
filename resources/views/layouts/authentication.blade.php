<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-inter bg-slate-100 text-slate-600">

    <main class="bg-white">

        <div class="relative flex">

            <!-- Content -->
            <div class="w-full md:w-1/2">

                <div class="flex flex-col h-full min-h-screen after:flex-1">

                    <!-- Header -->
                    <div class="flex-1">
                        <div class="flex items-center justify-between h-16 px-4 mt-5 sm:px-6 lg:px-8">
                            <!-- Logo -->
                            <a class="block" href="{{ route('admin.admin_dashboard') }}">
                                <img src="/images/tecgos.png" alt="tecgos" width="64" height="64" />
                            </a>
                        </div>
                    </div>

                    <div class="w-full max-w-sm px-4 py-8 mx-auto">
                        {{ $slot }}
                    </div>

                </div>

            </div>

            <!-- Image -->
            <div class="absolute top-0 bottom-0 right-0 hidden md:block md:w-1/2" aria-hidden="true">
                <img class="object-cover object-center w-full h-full" src="{{ asset('images/auth-image.jpg') }}"
                    width="760" height="1024" alt="Authentication image" />
                <img class="absolute left-0 hidden ml-8 -translate-x-1/2 top-1/4 lg:block"
                    src="{{ asset('images/auth-decoration.png') }}" width="218" height="224"
                    alt="Authentication decoration" />
            </div>

        </div>

    </main>
</body>

</html>
