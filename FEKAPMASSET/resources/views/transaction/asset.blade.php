@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div id="createAsset" class="inset-0 bg-white flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="text-xl font-bold mb-4">Add new asset here</h2>
        <form id="editForm" action="{{ route('transaction.store') }}" method="POST">
            @csrf <!-- CSRF protection -->
            <div class="mb-4">
                <label for="assettype" class="block text-sm font-semibold"> Type </label>
                <select id="assettype" name="assettype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Type</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'ASSET_TYPE')
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assetcategory" class="block text-sm font-semibold"> Category </label>
                <select id="assetcategory" name="assetcategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Category</option>
                    <!-- Options will be populated dynamically -->
                </select>
            </div>

            <div class="mb-4">
                <label for="assetbrand" class="block text-sm font-semibold"> Brand </label>
                <select id="assetbrand" name="assetbrand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Brand</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'ASSET_BRAND' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            {{-- Asset Model Selection --}}
            <div class="mb-4">
                <label for="assetmodel" class="block text-sm font-semibold"> Model </label>
                <select id="assetmodel" name="assetmodel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Model</option>
                </select>
            </div>
            
            {{-- Asset Series Selection --}}
            <div class="mb-4">
                <label for="assetseries" class="block text-sm font-semibold"> Series </label>
                <select id="assetseries" name="assetseries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Series</option>
                </select>
            </div>
            {{-- Serial Number Input --}}
            <div class="mb-4">
                <label for="assetserialnumber" class="block text-sm font-semibold"> Serial Number </label>
                <input type="text" id="assetserialnumber" name="assetserialnumber" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="picadded" class="block text-sm font-semibold"> PIC Added </label>
                <select id="picadded" name="picadded" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select PIC</option>
                    <option value="TOMMY WISNU WARDHANA">TOMMY WISNU WARDHANA</option>
                    <option value="MUHAMAD FAUZAN">MUHAMAD FAUZAN</option>
                </select>
            </div>

        
            <!-- Buttons -->
            <div class="flex justify-end">
                <button type="button" onclick="window.location.href='{{ route('master.index') }}'" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back to Master</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>        
    </div>
</div>
<script>
    // JavaScript to handle dynamic population of Asset Model based on selected Asset Brand
    document.getElementById('assetbrand').addEventListener('change', function() {
        var selectedvalue = this.value;
        var assetDropdown = document.getElementById('assetmodel');
        var optionData = @json($optionData); // Get the option data from the server-side

        // Clear existing options
        assetDropdown.innerHTML = '<option value="">Select Model</option>';

        // Filter and add options based on selected Asset Type and condition = 'ASSET_CATEGORY'
        optionData.forEach(function(option) {
            if (option.condition === 'ASSET_MODEL' && option.typegcm === selectedvalue) {
                var newOption = document.createElement('option');
                newOption.value = option.description;
                newOption.text = option.description;
                assetDropdown.appendChild(newOption);
            }
        });
    });

    // JavaScript to handle dynamic population of Asset Model based on selected Asset Brand
    document.getElementById('assetmodel').addEventListener('change', function() {
        var selectedvalue = this.value;
        var assetDropdown = document.getElementById('assetseries');
        var optionData = @json($optionData); // Get the option data from the server-side

        // Clear existing options
        assetDropdown.innerHTML = '<option value="">Select Model</option>';

        // Filter and add options based on selected Asset Type and condition = 'ASSET_CATEGORY'
        optionData.forEach(function(option) {
            if (option.condition === 'ASSET_SERIES' && option.typegcm === selectedvalue) {
                var newOption = document.createElement('option');
                newOption.value = option.description;
                newOption.text = option.description;
                assetDropdown.appendChild(newOption);
            }
        });
    });

    // JavaScript to handle dynamic population of Asset Category based on selected Asset Type
    document.getElementById('assettype').addEventListener('change', function() {
        var selectedType = this.value;
        var assetCategoryDropdown = document.getElementById('assetcategory');
        var optionData = @json($optionData); // Get the option data from the server-side

        // Clear existing options
        assetCategoryDropdown.innerHTML = '<option value="">Select Category</option>';

        // Filter and add options based on selected Asset Type and condition = 'ASSET_CATEGORY'
        optionData.forEach(function(option) {
            if (option.condition === 'ASSET_CATEGORY' && option.typegcm === selectedType) {
                var newOption = document.createElement('option');
                newOption.value = option.description;
                newOption.text = option.description;
                assetCategoryDropdown.appendChild(newOption);
            }
        });
    });
</script>
@endsection