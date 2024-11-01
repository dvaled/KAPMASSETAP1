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
                <label for="assetbrand" class="block text-sm font-semibold"> Brand Name </label>
                <select id="assetbrand" name="assetbrand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($sidebarData as $asset)
                        <option value="{{ $asset['description'] }}">{{ $asset['description'] }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-4">
                <label for="assetmodel" class="block text-sm font-semibold"> Model </label>
                <select id="assetmodel" name="assetmodel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($sidebarData as $asset)
                        <option value="{{ $asset['description'] }}">{{ $asset['description'] }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-4">
                <label for="assetseries" class="block text-sm font-semibold"> Series </label>
                <select id="assetseries" name="assetseries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($sidebarData as $asset)
                        <option value="{{ $asset['description'] }}">{{ $asset['description'] }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-4">
                <label for="assetserialnumber" class="block text-sm font-semibold"> Serial Number </label>
                <input type="text" id="assetserialnumber" name="assetserialnumber" class="w-full p-2 border rounded" required>
            </div>
        
            <div class="mb-4">
                <label for="active" class="block text-sm font-semibold"> Active </label>
                <select id="active" name="active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
            </div>
        
            <div class="mb-4">
                <label for="assetcategory" class="block text-sm font-semibold"> Category </label>
                <select id="assetcategory" name="assetcategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($sidebarData as $asset)
                        <option value="{{ $asset['description'] }}">{{ $asset['description'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assettype" class="block text-sm font-semibold"> Type </label>
                <select id="assettype" name="assettype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
