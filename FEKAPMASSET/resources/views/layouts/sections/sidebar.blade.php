<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="stylesheet" href="./resources/css/soft-ui-dashboard-tailwind.css" />

    {{-- // Fonts and Icons --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    {{-- // FontAwesome Icons --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    {{-- // Nucleo Icons --}}
    <link href="./resources/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./resources/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Fonts -->
    <link href="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com /,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}text-base{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}*/
        .dropdown-hidden {
        display: none;
      }
    </style>
    <title>Layout</title>
</head>
<body>
<div class="w-full h-full">
    <dh-component>
        <div class="flex flex-no-wrap">
                <div class="text-center">
                    <button id="toggleSidebar" class="m-2 xl:hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="sidebar" data-drawer-show="sidebar" data-drawer-body-scrolling="false" aria-controls="sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            <!-- Sidebar starts -->
            <div id="sidebar" style="min-height: 100vh" class="w-72 fixed xl:relative bg-blue-700 shadow h-full flex-col justify-between hidden xl:flex overflow-y-auto z-10">
              <div class="px-8">
                  <div class="h-20 w-full flex items-center"> 
                      {{-- Place KAI SVG here --}}
                      <img class="h-16 items-center text-center" src="{{ asset('assets/logo/KAPM-logo.png') }}" alt="">
                      <button id="toggleSidebarInside" class="m-2 xl:hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                  </div>
                  {{-- <ul class="mt-8">
                      <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                          <a href="javascript:;" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleDropdown('dashboardsExamples')">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z"></path>
                                  <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                  <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                  <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                  <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                              </svg>
                              <span class="text-base ml-2 text-white" style="opacity: 0.9;">Dashboard</span>
                          </a>
                      </li>
                  </ul> --}}
                <ul>
                    @foreach ($masterData as $masters)
                        @if($masters['condition'] == 'FIELD')
                        @php
                            // Assign the description value
                            $description = $masters['description'];
                        @endphp
                            <li>
                                <h5 class="mb-0">
                                    <button class="relative flex items-center w-full p-4 font-semibold text-left transition-all border-b border-solid cursor-pointer border-slate-100 ease-soft-in text-white rounded-t-1"
                                            aria-expanded="false" onclick="toggleDropdown(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="pr-0.5 pt-05 icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                                <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                                <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                                <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                            </svg>
                                    <span class="text-base pl-0.5 ml-2">{{ $masters['description'] }}</span>
                                    <i class="absolute right-0 pt-1 mr-4 leading-normal fa fa-plus text-xs"></i>
                                    <i class="absolute right-0 hidden pt-1 mr-4 leading-normal fa fa-minus text-xs"></i>
                                    </button>
                                </h5>
                        
                            <!-- Dropdown content for inner masters -->
                                <ul class="dropdown-hidden inner-masters-list">
                                    @foreach ($masterData as $innerMasters)
                                        @if($innerMasters['condition'] == 'FIELD_VALUE' && $innerMasters['typegcm'] == $description)
                                            @php
                                                // Assign the description value
                                                $href = url('master/show/' . $innerMasters['description']);
                                            @endphp
                                            <li class="p-2 flex-wrap">
                                                <div class="p-3 leading-normal text-base flex-wrap" style="background-color: rgba(0, 0, 0, 0.1);    word-wrap: normal">
                                                    <text class="text-base ml-2 text-white flex-wrap " style="opacity: 0.9; word-wrap: break-word;">
                                                        <a href="{{$href}}">{{ $innerMasters['description'] }}</a>
                                                    </text> 
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                    <li>
                        <h5 class="mb-0">
                            <button class="relative flex items-center w-full p-4 font-semibold text-left transition-all border-b border-solid cursor-pointer border-slate-100 ease-soft-in text-white rounded-t-1"
                                    aria-expanded="false" onclick="toggleDropdown(this)">
                              <span class="text-base ml-2 text-white" style="opacity: 0.9;">TRANSACTION</span>
                              <i class="absolute right-0 pt-1 mr-4 leading-normal fa fa-plus text-xs"></i>
                              <i class="absolute right-0 hidden pt-1 mr-4 leading-normal fa fa-minus text-xs"></i>
                            </button>
                        </h5>
                        <ul class="dropdown-hidden inner-masters-list">
                            <h5 class="mb-0">
                                <button class="relative flex items-center w-full p-4 font-semibold text-left transition-all border-b border-solid cursor-pointer border-slate-100 ease-soft-in text-white rounded-t-1"
                                        aria-expanded="false" onclick="toggleDropdown(this)">
                                  <span class="text-base ml-2 text-white" style="opacity: 0.9;">REGISTER ASSET</span>
                                  <i class="absolute right-0 pt-1 mr-4 leading-normal fa fa-plus text-xs"></i>
                                  <i class="absolute right-0 hidden pt-1 mr-4 leading-normal fa fa-minus text-xs"></i>
                                </button>
                            </h5>
                            <ul class="dropdown-hidden inner-masters-list">
                                <li class="p-0.5">
                                    <div class="p-3 leading-normal text-base" style="background-color: rgba(0, 0, 0, 0.1);">
                                        <span class="text-base ml-2 text-white" style="opacity: 0.9;">
                                            <a href="{{url('transaction/asset')}}">Laptop / PC</a>
                                        </span>
                                    </div>
                                </li>
                                <li class="p-0.5">
                                    <div class="p-3 leading-normal text-base" style="background-color: rgba(0, 0, 0, 0.1);">
                                        <span class="text-base ml-2 text-white" style="opacity: 0.9;">
                                            <a href="{{url('transaction/register-asset')}}">Mobile / Tablet</a>
                                        </span>
                                    </div>
                                </li>
                                <li class="p-0.5">
                                    <div class="p-3 leading-normal text-base" style="background-color: rgba(0, 0, 0, 0.1);">
                                        <span class="text-base ml-2 text-white" style="opacity: 0.9;">
                                            <a href="{{url('transaction/register-asset')}}">Other</a>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                            <li class="p-0.5">
                                <div class="p-3 leading-normal text-base" style="background-color: rgba(0, 0, 0, 0.1);">
                                    <span class="text-white leading-normal text-base opacity-80>
                                        <a href="{{url('transaction/register-asset')}}">Log</a>
                                    </span>
                                </div>
                            </li>
                            <li class="p-0.5">
                                <div class="p-3 leading-normal text-base" style="background-color: rgba(0, 0, 0, 0.1);">
                                    <span class="text-white leading-normal text-base opacity-80>
                                        <a href="{{url('transaction/register-asset')}}">Employee</a>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>             
            </div>         
        </div>
    </dh-component>  
</div>
    <script>
      function toggleDropdown(button) {
        const content = button.parentElement.nextElementSibling;
        const openIcon = button.querySelector('.fa-minus');
        const closeIcon = button.querySelector('.fa-plus');
        
        // Toggle visibility of the dropdown content
        content.classList.toggle('dropdown-hidden');
        
        // Toggle icons
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
        
        // Update aria-expanded attribute
        button.setAttribute('aria-expanded', content.classList.contains('dropdown-hidden') ? 'false' : 'true');
      } 

      document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggleSidebar'); // Get the button by ID
        const sidebar = document.getElementById('sidebar'); // Get the sidebar by ID
        const toggleButtonInside = document.getElementById('toggleSidebarInside'); // Get the button inside the sidebar

        const toggleSidebar = function() {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden'); // Show the sidebar
                sidebar.classList.add('flex'); // Ensure it's displayed correctly
            } else {
                sidebar.classList.add('hidden'); // Hide the sidebar
                sidebar.classList.remove('flex'); // Remove the flex class when hiding
            }
        };

        toggleButton.addEventListener('click', toggleSidebar); // Add event listener to the first button
        toggleButtonInside.addEventListener('click', toggleSidebar); // Add event listener to the button inside the sidebar
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

</body>
</html>  

