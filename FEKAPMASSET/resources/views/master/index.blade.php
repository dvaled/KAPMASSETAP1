@extends('layouts.app')

@section('content')


<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
  <div class="flex-col justify-between">
    <div class="p-6 pb-0 mb-2 bg-white rounded-t-2xl">
      <h6>Masters Table</h6>
    </div>
    <div class="p-6 pb-0 mb-2 bg-white rounded-t-2xl">
        @if (!empty($currentCondition))
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" 
                onclick="window.location.href='{{ route('master.create', ['condition' => $currentCondition]) }}'">
                Add masters
            </button>
        @else
            <p>No condition available for adding masters.</p>
        @endif
    </div>  
  </div>
    <div class="flex-auto px-0 pt-0 pb-2 space-x-5">
      <div class="p-4 overflow-x-auto">
        <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
          <thead class="align-bottom">
            <tr>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Master Id</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Condition</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Description</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Value</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Type</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Active</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Action</th>
          </thead>
          <tbody class= "justify-center">
            @foreach ($masterData as $masters)
            <tr>
                <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $masters['nosr'] }}</p> <!-- Display Condition -->
                </td>
                <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $masters['condition'] }}</p> <!-- Display Condition -->
                </td>
                <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $masters['description'] }}</span> <!-- Display Description -->
                </td>
                <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $masters['valuegcm']}}</span> <!-- Display Value -->
                </td>
                <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $masters['typegcm']}}</span> <!-- Display Type -->
                </td>
                <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-black">{{ $masters['active'] }}</span> <!-- Display Active status -->
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <!-- Edit Icon -->
                  <a href="javascript:void(0);" class="text-blue-500 text-sm font-bold mr-2" onclick="openEditModal({{ json_encode($masters) }})">
                     <i class="fas fa-edit"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-red-500 text-sm font-bold mr-2" onclick="openDeleteModal({{json_encode($masters)}})">
                     <i class="fas fa-trash"></i>
                  </a>
                
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                <!-- Previous Page Link -->
                @if ($masterData->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-gray-200 border border-gray-300 rounded-s-lg cursor-not-allowed">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $masterData->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-800">
                            Previous
                        </a>
                    </li>
                @endif
        
                <!-- Pagination Elements -->
                @foreach ($masterData->links()->elements[0] as $page => $url)
                    @if ($page == $masterData->currentPage())
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
                @if ($masterData->hasMorePages())
                    <li>
                        <a href="{{ $masterData->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-800">
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
              <h2 class="text-xl font-bold mb-4">Edit Master</h2>

              <form action="{{ route('master.update', ['masterid' => $masters['masterid']]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Override to use PUT method -->
            
                <!-- Input fields for master data -->
                <div class="mb-4">
                    <label for="masterid" class="block text-sm font-semibold">Master ID</label>
                    <input type="number" id="masterid" name="masterid" class="w-full p-2 border rounded" readonly>
                </div>
            
                <div class="mb-4">
                    <label for="condition" class="block text-sm font-semibold">Condition</label>
                    <input type="text" id="condition" name="condition" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="sbarcondition" class="block text-sm font-semibold">SbarCondition</label>
                    <input type="text" id="sbarcondition" name="sbarcondition" class="w-full p-2 border rounded">
                </div>
            
                <div class="mb-4">
                    <label for="nosr" class="block text-sm font-semibold">NOSR</label>
                    <input type="text" id="nosr" name="nosr" class="w-full p-2 border rounded" required>
                </div>
            
                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold">Description</label>
                    <input type="text" id="description" name="description" class="w-full p-2 border rounded" required>
                </div>
            
                <div class="mb-4">
                    <label for="valuegcm" class="block text-sm font-semibold">Value</label>
                    <input type="number" id="valuegcm" name="valuegcm" class="w-full p-2 border rounded" required>
                </div>
            
                <div class="mb-4">
                    <label for="typegcm" class="block text-sm font-semibold">Type</label>
                    <input type="text" id="typegcm" name="typegcm" class="w-full p-2 border rounded">
                </div>
            
                <div class="mb-4">
                    <label for="active" class="block text-sm font-semibold">Active</label>
                    <select id="active" name="active" class="w-full p-2 border rounded" required>
                        <option value="Y">Y</option> <!-- Represents true -->
                        <option value="N">N</option> <!-- Represents false -->
                    </select>
                </div>
            
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                </div>
            </form>
          </div>
        </div>
        
        <!-- Delete Modal -->
        <div id="deleteModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
          <div class="bg-white p-6 rounded-md w-96">
              <h2 class="text-xl font-bold mb-4"> Delete </h2>

              <form id="deleteForm" action="{{ route('master.destroy', ['masterid' => $masters['masterid']]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Override to use PUT method -->
            
                <!-- Input fields for master data -->
                <div class="mb-4">
                    <label for="masterid-delete" class="block text-sm font-semibold hidden">Master ID</label>
                    <input type="number" id="masterid-delete" name="masterid-delete" class="w-full p-2 border rounded" readonly hidden>
                </div>
            
                <div class="mb-4">
                    <label for="condition-delete" class="hidden block text-sm font-semibold">Condition</label>
                    <input type="text" id="condition-delete" name="condition-delete" class="w-full p-2 border rounded" required hidden>
                </div>
            
                <div class="mb-4">
                    <label for="nosr-delete" class="block text-sm font-semibold hidden">NOSR</label>
                    <input type="text" id="nosr-delete" name="nosr-delete" class="w-full p-2 border rounded" required hidden>
                </div>
            
                <div class="mb-4">
                    <label for="description-delete" class="block text-sm font-semibold hidden">Description</label>
                    <input type="text" id="description-delete" name="description-delete" class="w-full p-2 border rounded" required hidden>
                </div>
            
                <div class="mb-4">
                    <label for="valuegcm-delete" class="block text-sm font-semibold hidden">Value</label>
                    <input type="number" id="valuegcm-delete" name="valuegcm-delete" class="w-full p-2 border rounded" required hidden>
                </div>
            
                <div class="mb-4">
                    <label for="typegcm-delete" class="block text-sm font-semibold hidden">Type</label>
                    <input type="text" id="typegcm-delete" name="typegcm-delete" class="w-full p-2 border rounded" hidden>
                </div>
            
                <div class="mb-4">
                    <label for="active-delete" class="block text-sm font-semibold">Active</label>
                    <select id="active-delete" name="active-delete" class="w-full p-2 border rounded" required>
                        <option value="Y">Y</option> <!-- Represents true -->
                        <option value="N">N</option> <!-- Represents false -->
                    </select>
                </div>
            
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

<script>


  // Function to open modal and pre-fill form
  function openEditModal(masterData) {
    document.getElementById('masterid').value = masterData.masterid;
    document.getElementById('condition').value = masterData.condition;
    document.getElementById('nosr').value = masterData.nosr;
    document.getElementById('description').value = masterData.description;
    document.getElementById('valuegcm').value = masterData.valuegcm;
    document.getElementById('typegcm').value = masterData.typegcm;
    document.getElementById('active').value = masterData.active;
    document.getElementById('sbarcondition').value = masterData.sbarcondition;

      // Populate other form fields as necessary
      
      document.getElementById('editModal').classList.remove('hidden');
  }

  // Function to close modal
  function closeModal() {
      document.getElementById('editModal').classList.add('hidden');
      document.getElementById('deleteModal').classList.add('hidden');
  }

  // Handle form edit submission via AJAX
document.getElementById('editForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const masterid = document.getElementById('masterid').value;
    const formData = new FormData(this);

    // Debugging output: Log form data
    for (let pair of formData.entries()) {
        console.log(pair[0]+ ': ' + pair[1]);
    }

    fetch(`/master/update/${masterid}`, {
        method: 'PUT', // Change this to PUT
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: formData

    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Failed to update record');
        }
    })
    .then(data => {
        alert('Master updated sucessfully');
        location.reload(); 
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update the record');
    });
});
  // Function to open modal and pre-fill form
  function openDeleteModal(masterData) {

    document.getElementById('masterid-delete').value = masterData.masterid;
    document.getElementById('condition-delete').value = masterData.condition;
    document.getElementById('nosr-delete').value = masterData.nosr;
    document.getElementById('description-delete').value = masterData.description;
    document.getElementById('valuegcm-delete').value = masterData.valuegcm;
    document.getElementById('typegcm-delete').value = masterData.typegcm;
    document.getElementById('active-delete').value = masterData.active;
    

      // Populate other form fields as necessary
      
      document.getElementById('deleteModal').classList.remove('hidden');
  }

  // Handle form edit submission via AJAX
document.getElementById('deleteForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const masterid = document.getElementById('masterid').value;
    const formData = new FormData(this);
    

    // Debugging output: Log form data
    for (let pair of formData.entries()) {
        console.log(pair[0]+ ': ' + pair[1]);
    }

    fetch(`/master/destroy/${masterid}`, {
        method: 'PUT', // Change this to PUT
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: formData

    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Failed to update record');
        }
    })
    .then(data => {
        alert('Master deleted sucessfully');
        location.reload(); 
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to delete the record');
    });
});

// // Function to open modal and pre-fill form
//     function openDeleteModal(masterData) {
//         document.getElementById('masterid').value = masterData.masterid;
//         document.getElementById('condition').value = masterData.condition;
//         document.getElementById('nosr').value = masterData.nosr;
//         document.getElementById('description').value = masterData.description;
//         document.getElementById('valuegcm').value = masterData.valuegcm;
//         document.getElementById('typegcm').value = masterData.typegcm;
//         document.getElementById('active').value = masterData.active;

//         // Populate other form fields as necessary
        
//         document.getElementById('deleteModal').classList.remove('hidden');
//   }

//     document.getElementById('deleteForm').addEventListener('submit', function(event){
//         event.preventDefault();

//         const masterid = document.getElementById('masterid').value;
//         const formData = new FormData(this);

//         fetch(`/master/destroy/${masterid}`, {
//             method: 'PUT', 
//             headers: {
//                 'X-CSRF-TOKEN': '{{ csrf_token() }}',
//                 'Accept': 'application/json',
//             },
//             body: formData
            
//         })
//         .then(response => {
//             if (response.ok) {
//                 return response.json();
//             } else {
//                 throw new Error('Failed to update record');
//             }
//         })
//         .then(data => {
//             alert('Master deleted sucessfully');
//             location.reload(); 
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             alert('Failed to delete this record');
//         });

//     })


</script>
@endsection


