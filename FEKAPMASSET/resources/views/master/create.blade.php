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
    <script>
        console.log("error");
    </script>
@endif

<div id="createMaster" class="inset-0 bg-white flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="text-xl font-bold mb-4">Create New Master</h2>

        <form id="editForm" action="{{ route('master.store') }}" method="POST">
            @csrf <!-- CSRF protection -->

            <!-- Input fields for master data -->
            <div class="mb-4">
                <label for="conditionModal" class="block text-sm font-semibold">Condition</label>
                <input type="text" id="conditionModal" name="condition" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="nosrModal" class="block text    -sm font-semibold">Serial Number</label>
                <input type="text" id="nosrModal" name="nosr" class="w-full p-2 border rounded" required>
            </div>
            
            <div class="mb-4">
                <label for="descriptionModal" class="block text-sm font-semibold">Description</label>
                <input type="text" id="descriptionModal" name="description" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="valuegcmModal" class="block text-sm font-semibold">ValueGCM</label>
                <input type="text" id="valuegcmModal" name="valuegcm" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="typegcmModal" class="block text-sm font-semibold">TypeGCM</label>
                <input type="text" id="typegcmModal" name="typegcm" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="active" class="block text-sm font-semibold">Active</label>
                <select id="active" name="active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="Y">Y</option>  
                    <option value="N">N</option>  
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
@endsection
