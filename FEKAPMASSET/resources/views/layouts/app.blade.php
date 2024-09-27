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
    <div class="w-72 fixed bg-gray-800 h-full shadow hidden sm:flex">
        @include('layouts.navbar')
    </div>

    <!-- Main Content Wrapper -->
    <div class="ml-72 min-h-screen flex flex-col justify-between">
        <div>
            <!-- Navbar or other common components -->
            <nav>
                
            </nav>

            <div class="container p-6">
                @yield('content')
            </div>
        </div>

    <footer>
        <!-- Include footer component -->
        @include('layouts.footer')
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
