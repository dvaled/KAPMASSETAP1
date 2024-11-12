<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="soft-ui-dashboard-tailwind.css" />
    <script src="../path/to/sweetalert.min.js"></script>
    <script src="../path/to/soft-ui-dashboard-tailwind.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    {{-- <!-- Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />        
</head>
<body class="bg-gray-100">
    <div class="min-h-screen grid grid-cols-12 lg:grid grid-rows-1  ">
        <!-- Sidebar (1st Column) -->
        <aside class="col-span-2 text-white h-screen sticky top-0 overflow-auto z-50">
            @include('layouts.sections.sidebar')
        </aside>
    
        <!-- Content and Footer (2nd Column) -->
        <div class="col-span-10 flex flex-col">
            <!-- Main Content -->
            <div class="flex-grow p-6">
                <!-- Breadcrumb -->
                <nav class="flex px-5 py-3 mb-4 text-gray-700 rounded-lg bg-gray-50 dark:bg-white" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        {{-- <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-black">
                                Dashboard
                            </a>
                        </li> --}}
                        <?php $link = ""; ?>
                        @foreach(Request::segments() as $segment)
                            <?php $link .= "/" . $segment; ?>
                            <li class="inline-flex items-center">
                                {{-- <svg class="w-3 h-3 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a1 1 0 0 0-1 1v3H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2v3a1 1 0 1 0 2 0v-3h2a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2V3a1 1 0 0 0-1-1z"/>
                                </svg> --}}
                                <h6 class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400">/</h6>
                                <a href="{{ $link }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-black">
                                    {{ ucwords(str_replace('-', '', $segment)) }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </nav>
                @yield('content')
                @include('layouts.sections.footer')
                @include('layouts.sections.scripts')
            </div>
        </div>
    </div>
</body>