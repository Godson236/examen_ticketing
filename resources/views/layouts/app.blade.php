<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">
    <head>
        <meta name="google" content="notranslate">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Support Technique</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome pour les icônes (optionnel mais rend pro) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                font-family: 'figtree', sans-serif;
            }
            .card {
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.1);
                transition: transform 0.3s ease;
            }
            .card:hover {
                transform: translateY(-5px);
            }
            .btn-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 12px 24px;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
            }
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            }
            .btn-danger {
                background: linear-gradient(135deg, #f56565 0%, #c53030 100%);
                color: white;
                padding: 12px 24px;
                border-radius: 8px;
                font-weight: 600;
            }
            .badge {
                padding: 5px 12px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 600;
            }
            .badge-ouvert { background: #c6f6d5; color: #22543d; }
            .badge-en_cours { background: #feebc8; color: #744210; }
            .badge-resolu { background: #bee3f8; color: #2c5282; }
            .badge-ferme { background: #e2e8f0; color: #1a202c; }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <div class="bg-white shadow-sm">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $header }}</h1>
                    </div>
                </div>
            @endisset

            <!-- Page Content -->
            <main class="py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>