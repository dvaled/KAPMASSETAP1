@extends('layouts.app')

@section('content')


<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
      <h6>Authors table</h6>
    </div>
</div> --}}

{{-- <table class="table table-bordered">
    <tr>
        <th>MasterID</th>
        <th>Condition</th>
        <th>NoSr</th>
        <th>Description</th>
        <th>ValueGcm</th>
        <th>TypeGcm</th>
        <th>Active</th>
    </tr>
    @foreach ($masterData as $masters)
    <tr>
        <td>{{ $type['masterid'] }}</td>
        <td>{{ $type['condition'] }}</td>
        <td>{{ $type['nosr'] }}</td>
        <td>{{ $type['description'] }}</td>
        <td>{{ $type['valuegcm'] }}</td>
        <td>{{ $type['typegcm'] }}</td>
        <td>{{ $type['active'] }}</td>
    </tr>
    @endforeach
</table> --}}


<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
      <h6>Authors table</h6>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
      <div class="p-0 overflow-x-auto">
        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
          <thead class="align-bottom">
            <tr>
              <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Master Id</th>
              <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Condition</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Description</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Value</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Type</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Active</th>
          </thead>
          <tbody>
            @foreach ($masterData as $masters)
            <tr>
                {{-- <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                        <div>
                            <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                        </div>
                        <div class="flex flex-col justify-center">
                            <h6 class="mb-0 leading-normal text-sm">{{ $masters['masterid'] }}</h6> <!-- Display MasterID -->
                            <p class="mb-0 leading-tight text-xs text-black">{{ $masters['condition'] }}</p> <!-- Display Condition -->
                        </div>
                    </div>
                </td> --}}
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $masters['masterid'] }}</p> <!-- Display Condition -->
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $masters['condition'] }}</p> <!-- Display Condition -->
                </td>
                {{-- <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                    <span class="bg-gradient-to-tl from-green-600 to-lime-400 px-3.6 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Online</span>
                </td> --}}
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $masters['condition'] }}</span> <!-- Display Description -->
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $masters['valuegcm']}}</span> <!-- Display Value -->
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $masters['typegcm']}}</span> <!-- Display Type -->
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $masters['active'] }}</span> <!-- Display Active status -->
                </td>
                {{-- <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <a href="{{ route('master.edit', $master->id) }}" class="font-semibold leading-tight text-xs text-black"> Edit </a> <!-- Edit link -->
                </td> --}}
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<!-- Plugin for the charts, full documentation here: https://www.chartjs.org/ -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<script src="../assets/js/plugins/Chart.extension.js"></script>

<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js"></script>
</body>
@endsection


