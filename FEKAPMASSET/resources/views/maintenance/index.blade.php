@extends('layouts.app')

@section('content')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
      <h6>Asset under maintenance</h6>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
      <div class="p-0 overflow-x-auto">
        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
          <thead class="align-bottom">
            <tr>
              <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Maintenance ID</th>
              <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">ID Asset</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">PIC Added</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70"> Notes</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Date Added</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Action</th>
          </thead>
          <tbody>
            @foreach ($maintenanceData as $mthist)
            <tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $mthist['maintenanceid'] }}</p> 
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $mthist['idasset'] }}</p> 
                </td>
                <td class="p-2 align-middle bg-transparent bor  der-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $mthist['picadded'] }}</span> 
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $mthist['notes']}}</span>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $mthist['dateadded']}}</span> 
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $mthist['dateadded'] }}</span>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <!-- Edit Icon -->
                    <a href="javascript:void(0);" class="text-blue-500 text-sm font-bold mr-2" onclick="openEditModal({{ json_encode($masters) }})">
                       <i class="fas fa-edit"></i>
                    </a>
                    
                    <!-- Delete Icon (using a form for DELETE) -->
                    <form {{-- action="{{ route('masters.destroy', $masters['masterid']) }}"--}} method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 text-sm font-bold" onclick="openDeleteModal({{ json_encode($masters) }})">
                            <i class="fas fa-trash"></i> <!-- Font Awesome Trash Icon -->
                        </button>
                    </form>
                  </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <!-- Edit Modal -->
        <div id="editModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-md w-96">
                <h2 class="text-xl font-bold mb-4">Edit Master</h2>
  
                <form id="editForm">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updates -->
  
                    <!-- Input fields for master data -->
                    <div class="mb-4">
                        <label for="masterid" class="block text-sm font-semibold">Master ID</label>
                        <input type="text" id="masterid" name="masterid" class="w-full p-2 border rounded" readonly>
                    </div>
                    
                    <div class="mb-4">
                        <label for="condition" class="block text-sm font-semibold">Condition</label>
                        <input type="text" id="conditionModal" name="condition" class="w-full p-2 border rounded" required>
                    </div>
  
                    <div class="mb-4">
                        <label for="nosrModal" class="block text-sm font-semibold">Serial Number</label>
                        <input type="text" id="nosrModal" name="nosrModal" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                      <label for="description" class="block text-sm font-semibold"> Description </label>
                      <input type="text" id="descriptionModal" name="description" class="w-full p-2 border rounded" required>
                  </div>
                  <div class="mb-4">
                      <label for="valuegcm" class="block text-sm font-semibold"> ValueGCM </label>
                      <input type="text" id="valuegcmModal" name="valuegcm" class="w-full p-2 border rounded" required>
                  </div>
                  <div class="mb-4">
                      <label for="typegcm" class="block text-sm font-semibold"> TypeGCM </label>
                      <input type="text" id="typegcmModal" name="typegcm" class="w-full p-2 border rounded" required>
                  </div>
                  <div class="mb-4">
                      <label for="active" class="block text-sm font-semibold"> Active </label>
                      <input type="text" id="activeModal" name="active" class="w-full p-2 border rounded" required>
                  </div>
  
                    <!-- Add more fields as necessary -->
  
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</body>
@endsection


