<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="soft-ui-dashboard-tailwind.css" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
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
<body class="bg-gray-100">
    <div class="min-h-screen grid grid-cols-12">
        <!-- Sidebar (1st Column) -->
        <aside class="col-span-2 bg-gray-800 text-white h-full">
            @include('layouts.sections.sidebar')
        </aside>
    
        <!-- Content and Footer (2nd Column) -->
        <div class="col-span-10 flex flex-col">
            <!-- Main Content -->
            <div class="flex-grow p-6">
                @yield('content')
                @include('layouts.sections.footer')
            </div>
        </div>
    </div>
    
    
    
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Core -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/soft-ui-dashboard.min.js"></script>
</body>
</html>