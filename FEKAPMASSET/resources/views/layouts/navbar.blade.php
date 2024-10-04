<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="soft-ui-dashboard-tailwind.css" />

    {{-- // Fonts and Icons --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    {{-- // FontAwesome Icons --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    {{-- // Nucleo Icons --}}
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
     <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="module" src="{{ mix('resources/js/app.js') }}"></script>

    <title>Layout</title>
</head>
<body>
  <body>
    <div class="w-full h-full">
      <dh-component>
        <aside mini="false" class="fixed inset-y-0 left-0 flex-wrap items-center justify-between block w-full p-0 my-4 transition-all duration-200 -translate-x-full bg-white border-0 shadow-none xl:ml-4 dark:bg-gray-950 ease-soft-in-out z-990 rounded-2xl xl:translate-x-0 xl:bg-transparent ps ps--active-y max-w-64 overflow-y-auto" id="sidenav-main">
          <!-- header -->
      
          <div class="h-20">
            <!-- x i -->
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 dark:text-white xl:hidden" aria-hidden="true" sidenav-close-btn=""></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700 dark:text-white" href=" https://demos.creative-tim.com/soft-ui-dashboard-pro/pages/dashboards/default.html " target="_blank">
              <span class="ml-1 font-semibold transition-all duration-200 ease-soft-in-out opacity-100">KAI PROPERTY ASSET MANAGEMENT SYSTEM</span>
            </a>
          </div>
      
          <!-- //---------hr----------// -->
      
          <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">
      
          <div class="items-center block w-full h-auto grow basis-full" id="sidenav-collapse-main">
            <!-- primary list  -->
      
            <ul class="flex flex-col pl-0 mb-0 list-none">
              <!-- primary list item -->
      
              <li class="mt-0.5 w-full">
                <!-- primary anchor  -->
      
                <a active_primary="" collapse_trigger="primary" href="javascript:;" class="after:ease-soft-in-out after:font-awesome-5-free ease-soft-in-out text-sm py-2.7 active xl:shadow-soft-xl my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-all after:ml-auto after:inline-block after:font-bold after:antialiased after:transition-all after:duration-200 dark:text-white dark:opacity-80 after:rotate-180 after:text-slate-800 after:content-['\f107']" aria-expanded="true">
                  <!-- big anchor expandable -->
                  <div class="stroke-none shadow-soft-sm bg-gradient-to-tl from-purple-700 to-pink-500 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current p-2.5 text-center text-black">
                    <!-- icon -->
      
                    <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>shop</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(0.000000, 148.000000)">
                              <path class="" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                              <path class="" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
      
                  <!-- primary span -->
      
                  <span class="ml-1 duration-300 pointer-events-none ease-soft text-slate-700 opacity-100">Dashboards</span>
                  <div class="h-auto overflow-hidden transition-all duration-200 ease-soft-in-out" id="dashboardsExamples">
                    <!-- primary collapsable list -->
                    <ul class="flex flex-wrap pl-4 mb-0 ml-6 list-none transition-all duration-200 ease-soft-in-out">
                      <!-- medium list item  -->
                      <li class="w-full">
                        <!-- medium a -->
                        <a active_page active_secondary class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-5 relative my-0 mr-4 flex items-center whitespace-nowrap rounded-lg bg-transparent pr-4 font-semibold text-slate-800 shadow-none transition-colors before:absolute before:top-1/2 before:h-2 before:w-2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800 before:content-[''] dark:text-white dark:opacity-100 dark:before:bg-white dark:before:opacity-80" href="./pages/dashboards/default.html">
                          <!-- mini span -->
                          <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> D </span>
      
                          <!-- estended span -->
                          <span class="transition-all duration-100 pointer-events-none ease-soft"> Default </span>
                        </a>
                      </li>
      
                      <li class="w-full">
                        <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-4.5 before:h-1.25 before:w-1.25 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors before:absolute before:top-1/2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800/50 before:content-[''] dark:text-white dark:opacity-60 dark:before:bg-white dark:before:opacity-80" href="./pages/dashboards/automotive.html">
                          <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> A </span>
                          <span class="transition-all duration-100 pointer-events-none ease-soft"> Automotive </span>
                        </a>
                      </li>
      
                      <li class="w-full">
                        <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-4.5 before:h-1.25 before:w-1.25 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors before:absolute before:top-1/2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800/50 before:content-[''] dark:text-white dark:opacity-60 dark:before:bg-white dark:before:opacity-80" href="./pages/dashboards/smart-home.html">
                          <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> S </span>
                          <span class="transition-all duration-100 pointer-events-none ease-soft"> Smart Home </span>
                        </a>
                      </li>
      
                      <li class="w-full">
                        <!-- medium a collapsable  -->
                        <a collapse_trigger="secondary" class="after:ease-soft-in-out after:font-awesome-5-free ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-4.5 before:h-1.25 before:w-1.25 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors before:absolute before:top-1/2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800/50 before:content-[''] after:ml-auto after:inline-block after:font-bold after:text-slate-800/50 after:antialiased after:transition-all after:duration-200 after:content-['\f107'] dark:text-white dark:opacity-60 dark:before:bg-white dark:before:opacity-80 dark:after:text-white/50 dark:after:text-white" aria-expanded="false" href="javascript:;">
                          <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> V </span>
                          <span class="transition-all duration-100 pointer-events-none ease-soft"> Virtual Reality <b class="caret"></b></span>
                        </a>
      
                        <div class="h-auto overflow-hidden transition-all duration-200 ease-soft-in-out max-h-0" id="vrExamples">
                          <ul class="flex flex-col flex-wrap pl-0 mb-0 list-none transition-all duration-200 ease-soft-in-out">
                            <li class="w-full">
                              <!-- small a -->
                              <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-3.4 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors dark:text-white dark:opacity-60" href="./pages/dashboards/vr/vr-default.html">
                                <span class="w-0 text-xs leading-tight text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> V </span>
                                <span class="transition-all duration-100 pointer-events-none ease-soft"> VR Default </span>
                              </a>
                            </li>
      
                            <li class="w-full">
                              <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-3.4 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors dark:text-white dark:opacity-60" href="./pages/dashboards/vr/vr-info.html">
                                <span class="w-0 text-xs leading-tight text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> V </span>
                                <span class="transition-all duration-100 pointer-events-none ease-soft"> VR Info </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="w-full">
                        <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-4.5 before:h-1.25 before:w-1.25 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors before:absolute before:top-1/2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800/50 before:content-[''] dark:text-white dark:opacity-60 dark:before:bg-white dark:before:opacity-80" href="./pages/dashboards/crm.html">
                          <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> C </span>
                          <span class="transition-all duration-100 pointer-events-none ease-soft"> CRM </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  </ul>
                </div>
              </li>      
            </ul>
          </div>
      </dh-component>
    </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
          //message with toastr
          @if(session()->has('success'))
          
              toastr.success('{{ session('success') }}', 'BERHASIL!'); 

          @elseif(session()->has('error'))

              toastr.error('{{ session('error') }}', 'GAGAL!'); 
              
          @endif
      </script>
      <script>
      var sideBar = document.getElementById("mobile-nav");
      var openSidebar = document.getElementById("openSideBar");
      var closeSidebar = document.getElementById("closeSideBar");
      sideBar.style.transform = "translateX(-260px)";

      function sidebarHandler(flag) {
          if (flag) {
              sideBar.style.transform = "translateX(0px)";
              openSidebar.classList.add("hidden");
              closeSidebar.classList.remove("hidden");
          } else {
              sideBar.style.transform = "translateX(-260px)";
              closeSidebar.classList.add("hidden");
              openSidebar.classList.remove("hidden");
          }
      }
    </script>
</body>
</html>