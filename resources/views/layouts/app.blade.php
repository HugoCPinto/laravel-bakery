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

    <style>
        .sidebar {
            width: 200px;
            background: #f8fafc;
            padding: 1rem;
            height: 100vh;
            border-right: 1px solid #e5e7eb;
        }
        .main-content {
            flex: 1;
            padding: 1rem;
        }
        .layout-container {
            display: flex;
        }
        .sidebar a {
            display: block;
            margin-bottom: 1rem;
            text-decoration: none;
            color: #1f2937;
            font-weight: 500;
        }
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Layout -->
    <div class="layout-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="{{ route('snack_products.index') }}">Snack Products</a>
            <a href="{{ route('trends.index') }}">Trends</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @isset($header)
                <header class="bg-white shadow mb-4">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                @yield('content')
            </main>
        </div>
    </div>
</div>
</body>
</html>
