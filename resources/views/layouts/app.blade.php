<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Page title styling */
        .page-header {
            margin-bottom: 2rem;
            padding: 1rem 1.5rem;
            background: var(--card-bg, #ffffff);
            border-radius: 15px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color, #e2e8f0);
        }
        
        .page-header h2 {
            color: var(--text-primary, #0f172a);
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .page-header h2 i {
            color: var(--primary-color, #4361ee);
            font-size: 2rem;
        }
        
        /* Dark mode adjustments */
        body.dark-mode .page-header {
            background: var(--card-bg, #1e293b);
            border-color: var(--border-color, #334155);
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            <!-- Page Header - এই অংশ যোগ করুন -->
            {{-- <div class="container">
                <div class="page-header">
                    <h2>
                        <i class="fas fa-user-plus"></i>
                        Create Account
                    </h2>
                </div>
            </div> --}}
            
            <!-- Content -->
            @yield('content')
        </main>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <!-- Theme Manager -->
    {{-- @include('layouts.theme-manager') --}}
</body>
</html>