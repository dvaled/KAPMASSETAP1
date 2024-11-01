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
              <li>
                  <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-800">
                      Previous
                  </a>
              </li>
              <li>
                  <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-800">
                      1
                  </a>
              </li>
              <li>
                  <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-800">
                      2
                  </a>
              </li>
              <li>
                  <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-white border border-gray-300 bg-blue-600 hover:bg-blue-700 hover:text-white">
                      3
                  </a>
              </li>
              <li>
                  <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-800">
                      4
                  </a>
              </li>
              <li>
                  <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-800">
                      5
                  </a>
              </li>
              <li>
                  <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-800">
                      Next
                  </a>
              </li>
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
                    <label for="idmaster" class="block text-sm font-semibold">Master ID</label>
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
                </div>
            </form>
          </div>
        </div>
        {{-- Delete Modal --}}
        <div id="deleteModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
          <div class="bg-white p-6 rounded-md w-96">
              <h2 class="text-xl font-bold mb-4">Delete Master</h2>

              <form id="deleteForm" method="POST">
                  @csrf
                  @method('PUT') <!-- Use Delete method for deleting -->

                  <div class="mb-4">
                      <label for="idmaster" class="block text-sm font-semibold">Master ID</label>
                      <input type="text" id="idmaster" name="idmaster" class="w-full p-2 border rounded" readonly>
                  </div>
                  <div class="mb-4">
                    <label for="active" class="block text-sm font-semibold">Active</label>
                    <select id="active" name="active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Y">Y</option>  <!-- Represents true -->
                        <option value="N">N</option>  <!-- Represents false -->
                    </select>
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
        document.getElementById('idmaster').value = masterData.masterid;
        document.getElementById('active').value = masterData.active;

        // Set the form action dynamically for the delete request
        document.getElementById('deleteForm').action = `/master/${masterData.idmaster}`;

        
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    document.getElementById('deleteForm').addEventListener('submit', function(event){
        event.preventDefault();

        const masterid = document.getElementById('masterid').value;
        const formData = new FormData(this);

        fetch(`/master/destroy/${masterid}`, {
            method: 'PUT', 
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
            alert('Failed to delete this record');
        });

    })


</script>
@endsection


