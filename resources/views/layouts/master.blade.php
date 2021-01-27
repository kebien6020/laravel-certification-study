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
    <script async defer src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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

    {{-- Code block formatting --}}
    <style>
        pre {
            overflow-x: auto;
            border-radius: 5px;
            max-height: 40vh;
        }

        code {
            background-color: rgba(0,0,0,0.1);
            border-radius: 2px;
            padding-left: 4px;
            padding-right: 4px;
        }

    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/atom-one-dark.min.css">

    <script async defer id="hljs-script" src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
    <script>
        document.getElementById('hljs-script').addEventListener('load', function () {
            window.hljs.initHighlighting();
        })
    </script>

    @stack('styles')
    @stack('scripts')
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Laravel Certification Study</a>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
