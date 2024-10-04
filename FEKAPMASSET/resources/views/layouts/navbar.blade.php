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
    <style>
      #dashboardsExamples, #vrExamples {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
      }

    </style>

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
                      <title>kapm</title>
                    </svg>
                  </div>
                  <!-- primary span -->
                  {{-- <span class="ml-1 duration-300 pointer-events-none ease-soft text-slate-700 opacity-100">Dashboards</span> --}}

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
                </div>
              </li>      
            </ul>
          </div>
      </dh-component>
    </div>
      <script>
        document.querySelectorAll('[collapse_trigger]').forEach(trigger => {
          trigger.addEventListener('click', function () {
              const expanded = this.getAttribute('aria-expanded') === 'true';
              this.setAttribute('aria-expanded', !expanded);

              // Find the associated dropdown by ID
              const dropdownId = this.getAttribute('collapse_trigger') === 'primary' ? '#dashboardsExamples' : '#vrExamples';
              const dropdown = document.querySelector(dropdownId);

              // Toggle the dropdown height
              if (!expanded) {
                  dropdown.style.maxHeight = `${dropdown.scrollHeight}px`;
              } else {
                  dropdown.style.maxHeight = '0';
              }
          });
      });
      </script>
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