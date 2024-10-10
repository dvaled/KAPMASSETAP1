@extends('layouts.app')

@section('content')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="flex-row justify-between">
        <div class="flex flex-wrap justify-between gap-4 p-6 bg-white">
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> Asset Available </h5>
                <p class="font-normal text-xl text-gray-700">200</p>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> Destroyed Asset </h5>
                <p class="font-normal text-xl text-gray-700">50</p>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> In Maintenance </h5>
                <p class="font-normal text-xl text-gray-700">10</p>
            </div>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
      <div class="p-0 overflow-x-auto">
        <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
              <tr>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">ID Asset</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Assigned Employee</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Type</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Description</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Condition</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Action</th>
            </thead>
            <tbody class= "justify-center">
              @dump($logData)
              @foreach ($logData as $log)
              <tr>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ $log['logid'] }}</p> <!-- Display Condition -->
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 font-semibold leading-tight text-xs">{{ $log['roleid'] }}</p> <!-- Display Condition -->
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black"> {{ $log['actionperformed'] }}</span> <!-- Display Description -->
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black">{{ $log['useradded'] }}</span> <!-- Display Value -->
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black">{{ $log['dateadded'] }}<span> <!-- Display Type -->
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <span class="font-semibold leading-tight text-xs text-black">{{ $log['assetcode'] }}<span> <!-- Display Type -->
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <!-- Edit Icon -->
                    <a href="javascript:void(0);" class="text-blue-500 text-sm font-bold mr-2" onclick="openEditModal()">
                       <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Icon (using a form for DELETE) -->
                    <form {{-- action="{{ route('masters.destroy', $masters['masterid']) }}"--}} method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 text-sm font-bold" onclick="openDeleteModal()">
                            <i class="fas fa-trash"></i> <!-- Font Awesome Trash Icon -->
                        </button>
                    </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
          </table>
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
                    <p class880="mb-3 font-normal text-gray-700 dark:text-gray-400">KAI Properti</p>
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
</div>
</body>

@endsection