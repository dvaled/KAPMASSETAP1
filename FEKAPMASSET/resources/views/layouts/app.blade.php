<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar or other common components -->
    <nav>
        @include('layouts.navbar')
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Include footer component -->
        @include('layouts.footer')
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
