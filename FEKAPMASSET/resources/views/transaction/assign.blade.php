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

<div id="createAsset" class="inset-0 bg-white flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="text-xl font-bold mb-4">Assign asset here</h2>

        <form id="editForm" action="{{ route('transaction.store') }}" method="POST">
            @csrf <!-- CSRF protection -->
            <!-- Input fields for master data -->
            <div class="mb-4">
                <label for="EmployeeName" class="block text-sm font-semibold"> Employee </label>
                <select id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($employeeData as $emp)
                        <option value="{{ $emp['nipp'] }}">{{ $emp['nipp'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="BrandName" class="block text-sm font-semibold"> Brand Name </label>
                <select id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" aria-readonly="true">
                    @foreach ($assetData as $asset)
                        <option value="{{ $asset['assetbrand'] }}" readonly>{{ $asset['assetbrand'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="Model" class="block text-sm font-semibold"> Model </label>
                <select id="Model" name="Model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" aria-readonly="true">
                    @foreach ($assetData as $asset)
                        <option value="{{ $asset['assetmodel'] }}" readonly>{{ $asset['assetmodel'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="series" class="block text-sm font-semibold"> Series </label>
                @foreach($assetData as $asset)
                <input type="text" id="series" name="series" class="w-full p-2 border rounded" value="{{ $asset['assetseries'] }}" readonly>
                @endforeach
            </div>  
            <div class="mb-4">
                <label for="Serial Number" class="block text-sm font-semibold"> Serial Number </label>
                @foreach($assetData as $asset)
                <input type="text" id="Serial Number" name="Serial Number" class="w-full p-2 border rounded" value="{{ $asset['assetserialnumber'] }}" readonly>
                @endforeach
            </div>
            <div class="mb-4">
                <label for="Active" class="block text-sm font-semibold"> Active </label>
                @foreach($masterData as $asset)
                <input type="text" id="Active" name="Active" class="w-full p-2 border rounded" value="{{ $asset['active'] }}" readonly>
                @endforeach
            </div>
            <div class="mb-4">
                <label for="Type" class="block text-sm font-semibold"> Type </label>
                <select id="Type" name="Type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($assetData as $asset)
                        <option value="{{ $asset['assettype'] }}">{{ $asset['assettype'] }}</option>
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
