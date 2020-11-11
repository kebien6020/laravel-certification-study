<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    {{-- Icon font --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- Materialize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        html {
            font-size: 16px;
        }
        .header {
            color: #ee6e73;
        }
        nav .brand-logo {
            margin-left: 1rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Laravel Certification Study</a>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>

    {{-- Materialize --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    @stack('scripts')
</body>
</html>
