@extends('layouts.app')

@section('content')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="p-6 pb-0 mb-2 bg-white rounded-t-2xl">
        <h6>Maintenance List</h6>
      </div>
      <div class="p-6 pb-0 mb-2 bg-white rounded-t-2xl">
          <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='{{ route('maintenance.create') }}'">
              Add new
          </button>
      </div> 
    <div class="flex-auto px-0 pt-0 pb-2 space-x-5">
      <div class="p-4 overflow-x-auto">
        <table class="-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
          <thead class="align-bottom">
            <tr>
              <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Maintenance ID</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">PIC Added</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70"> Notes</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Date Added</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Asset Code</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Action</th>
          </thead>
          <tbody>
            @foreach ($maintenanceData as $mthist)
            <tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $mthist['maintenanceid'] }}</p> 
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $mthist['picadded'] }}</span> 
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $mthist['notes']}}</span>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $mthist['dateadded']}}</span> 
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $mthist['assetcode'] }}</span>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <!-- Edit Icon -->
                    <a href="javascript:void(0);" class="text-blue-500 text-sm font-bold mr-2" onclick="openEditModal({{ json_encode($mthist) }})">
                       <i class="fas fa-edit"></i>
                    </a>
                    
                    <!-- Delete Icon (using a form for DELETE) -->
                    <form {{-- action="{{ route('mthist.destroy', $mthist['masterid']) }}"--}} method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 text-sm font-bold" onclick="openDeleteModal({{ json_encode($mthist) }})">
                            <i class="fas fa-trash"></i> <!-- Font Awesome Trash Icon -->
                        </button>
                    </form>
                  </td>
            </tr>   
            @endforeach
        </tbody>
        </table>

        <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-sm">
                    <!-- Previous Page Link -->
                    @if ($maintenanceData->onFirstPage())
                        <li>
                            <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-gray-200 border border-gray-300 rounded-s-lg cursor-not-allowed">
                                Previous
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $maintenanceData->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-800">
                                Previous
                            </a>
                        </li>
                    @endif
            
                    <!-- Pagination Elements -->
                    @foreach ($maintenanceData->links()->elements[0] as $page => $url)
                        @if ($page == $maintenanceData->currentPage())
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
                    @if ($maintenanceData->hasMorePages())
                        <li>
                            <a href="{{ $maintenanceData->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-800">
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
        <!-- Edit Modal -->
        <div id="editModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-md w-96">
                <h2 class="text-xl font-bold mb-4">Edit Maintenance</h2>
                <form id="editForm">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updates -->
  
                    <!-- Input fields for master data -->
                    <div class="mb-4">
                        <label for="maintenanceid" class="block text-sm font-semibold">Master ID</label>
                        <input type="text" id="maintenanceid" name="maintenanceid" class="w-full p-2 border rounded" readonly>
                    </div>
                    
                    <div class="mb-4">
                        <label for="picadded" class="block text-sm font-semibold">picadded</label>
                        <input type="text" id="picadded" name="picadded" class="w-full p-2 border rounded" required>
                    </div>
  
                    <div class="mb-4">
                        <label for="notes" class="block text-sm font-semibold">Serial Number</label>
                        <input type="text" id="notes" name="notes" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                      <label for="dateadded" class="block text-sm font-semibold"> Date Added </label>
                      <input type="date" id="dateadded" name="dateadded" class="w-full p-2 border rounded" required>
                  </div>
                  <div class="mb-4">
                      <label for="assetcode" class="block text-sm font-semibold"> Asset Code </label>
                      <input type="text" id="assetcode" name="assetcode" class="w-full p-2 border rounded" required readonly>
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
<script>
        // Function to open modal and pre-fill form
    function openEditModal(Maintenance) {
        document.getElementById('maintenanceid').value = Maintenance.maintenanceid;
        document.getElementById('picadded').value = Maintenance.picadded;
        document.getElementById('notes').value = Maintenance.notes;
        document.getElementById('dateadded').value = Maintenance.dateadded;
        document.getElementById('assetcode').value = Maintenance.assetcode;
        // Populate other form fields as necessary
        
        document.getElementById('editModal').classList.remove('hidden');
    }

  // Function to close modal
  function closeModal() {
      document.getElementById('editModal').classList.add('hidden');
  }

  // Handle form submission via AJAX
  // Handle form submission via AJAX
document.getElementById('editForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission

    const maintenanceid = document.getElementById('maintenanceid').value; // Use 'maintenanceid' instead of 'masterid'
    const formData = new FormData(this); // Create FormData object from form

    fetch(`/maintenance/${maintenanceid}`, {  // Use 'maintenanceid' in the URL
        method: 'PUT',  // Use 'PUT' for updates
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Ensure CSRF token is included
            'Accept': 'application/json',
        },
        body: formData // Send form data
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Failed to update record');
        }
    })
    .then(data => {
        alert('Maintenance updated successfully');
        location.reload(); // Refresh page after successful update
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update the record');
    });
});

</script>
</body>
@endsection