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
@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>  
@endif

<div id="createMaster" class="inset-0 bg-white flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="text-xl font-bold mb-4">Create New Master</h2>

        <form id="editForm" action="{{ route('Transaction.store') }}" method="POST">
            @csrf <!-- CSRF protection -->
            <!-- Input fields for master data -->
            <div class="mb-4">
                <label for="BrandName" class="block text-sm font-semibold"> Brand Name </label>
                <input type="text" id="BrandName" name="BrandName" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="Model" class="block text-sm font-semibold"> Model </label>
                <input type="text" id="Model" name="Model" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="series" class="block text-sm font-semibold"> Series </label>
                <input type="text" id="series" name="series" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="Serial Number" class="block text-sm font-semibold"> Serial Number </label>
                <input type="text" id="Serial Number" name="Serial Number" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="Active" class="block text-sm font-semibold"> Active </label>
                <select id="active" name="active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($sidebarData as $asset)
                        <option value="{{ $asset['active'] }}">{{ $asset['active'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="Type" class="block text-sm font-semibold"> Type </label>
                <select id="Type" name="Type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($sidebarData as $asset)
                        <option value="{{ $asset['description'] }}">{{ $asset['description'] }}</option>
                    @endforeach
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
