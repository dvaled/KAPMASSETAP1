<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/soft-ui-dashboard/1.0.5/css/soft-ui-dashboard.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />        
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar (Fixed) -->
    <div class="min-h-screen flex">
        <!-- Include the Sidebar -->
        @include('layouts.section.sidebar')

        <div class="flex-1 flex flex-row">
            <!-- Main Content Area -->
            <div class="p-6 flex-grow">
                <!-- Dynamic Content Goes Here -->
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.section.scripts')    
</body>
</html>
        {{-- <div class="ml-72 min-h-screen flex flex-col justify-between p-6">
            <div class="flex-grow">
                <div class="container p-6">
                </div>
            </div>
            <!-- Footer -->
            <footer class="bg-gray-200 p-4">
            </footer>
        </div> --}}
    {{-- <div class="min-h-screen sm:flex-col md:flex-row lg:flex-row xl:flex-row">
        <div class="w-1/3 flex-none p-2">
            <div class="text-gray-700 text-center bg-gray-400 p-2">1</div>
            @include('layouts.section.sidebar')
        </div>
        <div class="w-2/3 flex-none p-2">
            <div class="text-gray-700 text-center bg-gray-400 p-2">2</div>
            @yield('content')
        </div>
        
    </div> --}}