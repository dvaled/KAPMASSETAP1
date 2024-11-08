@extends('layouts.app')

@section('content')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="flex-row justify-between">
        <div class="flex flex-wrap justify-between gap-4 p-6 bg-white">
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> Asset Available </h5>
                <p class="font-normal text-xl text-gray-700">{{$countAsset}}</p>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> Destroyed Asset </h5>
                <p class="font-normal text-xl text-gray-700">{{ $destroyedAsset }}</p>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> In Maintenance </h5>
                <p class="font-normal text-xl text-gray-700">{{ $inMtc }}</p>
            </div>
        </div>
    </div>
    <div class="flex-col justify-between">
        <div class="p-6 pb-0 mb-2 bg-white rounded-t-2xl">
            {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='{{ route('transaction.create') }}'">
                Add Asset
            </button> --}}
        </div>   
      </div>
      <div class="flex-auto px-0 pt-0 pb-2 space-x-5">
        <div class="p-4 overflow-x-auto">
          <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
              <tr>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">ID Asset</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Assigned Employee</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Brand</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Serial Number</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Active</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Category</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Code</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Type</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Action</th>
            </thead>
            <tbody class= "justify-center">
              @foreach ($assetData as $log)
                @php
                    $assetbrand = isset($log['assetbrand']) ? $log['assetbrand'] : ' ';
                    $assetmodel = isset($log['assetmodel']) ? $log['assetmodel'] : ' ';
                    $assetseries = isset($log['assetseries']) ? $log['assetseries'] : ' ';
                    $asset = $assetbrand . ' ' . $assetmodel . ' ' . $assetseries;

                    $employeeName = isset($log['employee']['name']) ? $log['employee']['name'] : 'N/A';


                @endphp

              <tr>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ $log['idasset'] }}</p> <!-- Display Condition -->
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ $employeeName }}</p> <!-- Display Condition -->
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black"> {{ $asset }}</span> <!-- Display Description -->
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black">{{ $log['assetserialnumber'] }}<span> <!-- Display Type -->
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black">{{ $log['active'] }}<span> <!-- Display Type -->
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black">{{ $log['assetcategory'] }}<span> <!-- Display Type -->
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black">{{ $log['assetcode'] }}<span> <!-- Display Type -->
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black">{{ $log['assettype'] }}<span> <!-- Display Type -->
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                    <!-- Edit Icon -->
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='{{ route('detailAsset.laptop', ['assetcode' => $log['assetcode']]) }}'">Detail</button>
                  </td>
              </tr>
              @endforeach
          </tbody>
          </table>
          <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                <!-- Previous Page Link -->
                @if ($assetData->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-gray-200 border border-gray-300 rounded-s-lg cursor-not-allowed">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $assetData->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-800">
                            Previous
                        </a>
                    </li>
                @endif
        
                <!-- Pagination Elements -->
                @foreach ($assetData->links()->elements[0] as $page => $url)
                    @if ($page == $assetData->currentPage())
                        <li>
                            <span class="flex items-center justify-center px-3 h-8 text-white border border-gray-300 bg-blue-600 hover:bg-blue-700 hover:text-white">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-800">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
        
                <!-- Next Page Link -->
                @if ($assetData->hasMorePages())
                    <li>
                        <a href="{{ $assetData->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-800">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-gray-200 border border-gray-300 rounded-e-lg cursor-not-allowed">
                            Next
                        </span>
                    </li>
                @endif
            </ul>
        </nav>  
        </div>
          <div class="flex flex-wrap justify-evenly gap-2 p-2 bg-white">
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 m-4">
                <a href="#">
                    <img class="rounded-t-lg" src="D:/laragon/www/KAPMASSETAP1/FEKAPMASSET/public/assets/KAI.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">PT. Kereta Api Indonesia</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kereta Api Indonesia</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 m-4">
                <a href="#">
                    <img class="rounded-t-lg" src="D:/laragon/www/KAPMASSETAP1/FEKAPMASSET/public/assets/KAI.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">PT. KAI Properti</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">KAI Properti</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 m-4">
                <a href="#">
                    <img class="rounded-t-lg" src="D:/laragon/www/KAPMASSETAP1/FEKAPMASSET/public/assets/KAI.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">PT. KCI</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">KCI</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection