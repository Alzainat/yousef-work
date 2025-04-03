<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Additional Styles -->
        <style>
            :root {
                --primary-color: #4f46e5;
                --primary-hover: #4338ca;
                --background-gradient: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            }
            
            body {
                font-family: 'Inter', sans-serif;
                color: #1f2937;
                background-image: var(--background-gradient);
                background-attachment: fixed;
            }
            
            .page-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem 1rem;
            }
            
            .logo-container {
                margin-bottom: 1.5rem;
                transition: transform 0.3s ease;
            }
            
            .logo-container:hover {
                transform: scale(1.05);
            }
            
            .card {
                width: 100%;
                max-width: 28rem;
                background-color: white;
                border-radius: 0.75rem;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                overflow: hidden;
                border: 1px solid rgba(229, 231, 235, 0.8);
                backdrop-filter: blur(10px);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            
            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.05);
            }
            
            .card-header {
                padding: 1.5rem 2rem;
                border-bottom: 1px solid #f3f4f6;
                text-align: center;
            }
            
            .card-body {
                padding: 2rem;
            }
            
            @media (max-width: 640px) {
                .card {
                    border-radius: 0.5rem;
                }
                
                .card-header {
                    padding: 1.25rem 1.5rem;
                }
                
                .card-body {
                    padding: 1.5rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-container">
            <div class="logo-container">
                <a href="/" class="block">
                    <x-application-logo class="w-24 h-24 fill-current text-primary-600" />
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h1 class="text-xl font-semibold text-gray-800">{{ config('app.name', 'Laravel') }}</h1>
                </div>
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
            
            <div class="mt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </div>
        </div>
    </body>
</html>