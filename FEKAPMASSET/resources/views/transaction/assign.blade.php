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
    a
<div id="createMaster" class="inset-0 bg-white flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="text-xl font-bold mb-4">Create New Master</h2>

        <form id="editForm" action="{{ route('master.store') }}" method="POST">
            @csrf <!-- CSRF protection -->

            <!-- Input fields for master data -->

            
            <div class="mb-4">
                <label for="assetModel" class="block text-sm font-semibold">NIPP</label>
                <select id="assetModel" name="assetModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($employeeData as $emp)
                        <option value="{{ $emp->nipp }}">{{ $emp->nipp }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assetModel" class="block text-sm font-semibold">Asset Brand</label>
                <select id="assetModel" name="assetModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($assets as $asset)
                        <option value="{{ $asset->assetbrand }}">{{ $asset->assetbrand }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assetModel" class="block text-sm font-semibold">Asset Model</label>
                <select id="assetModel" name="assetModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($assets as $asset)
                        <option value="{{ $asset->assetmodel }}">{{ $asset->assetmodel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assetModel" class="block text-sm font-semibold">Asset Series</label>
                <select id="assetModel" name="assetModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($assets as $asset)
                        <option value="{{ $asset->assetseries }}">{{ $asset->assetseries }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assetModel" class="block text-sm font-semibold">Asset Serial Number</label>
                <select id="assetModel" name="assetModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($assets as $asset)
                        <option value="{{ $asset->assetserialnumber }}">{{ $asset->assetserialnumber }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assetModel" class="block text-sm font-semibold">Active</label>
                <select id="assetModel" name="assetModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($assets as $asset)
                        <option value="{{ $asset->active }}">{{ $asset->active }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assetModel" class="block text-sm font-semibold">Asset Type</label>
                <select id="assetModel" name="assetModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($assets as $asset)
                        <option value="{{ $asset->assettype }}">{{ $asset->assettype }}</option>
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
