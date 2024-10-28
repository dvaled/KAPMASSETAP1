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
        <h2 class="text-xl font-bold mb-4">Asset Image</h2>
    
        <form action="{{ route('detailAsset.image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- assetcode --}}
            <div class="mb-4">
                <label for="assetcode" class="block text-sm font-semibold">Asset Code</label>
                <input id="assetcode" name="assetcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly value="{{ $assetcode }}"></input>
            </div>

            <div class="mb-4">
                <label for="assetimage" class="block text-sm font-semibold">Asset Image</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="assetimage" id="assetimage" name="assetimage" type="file">
            </div>

            <div class="mb-4">
                <label for="active" class="block text-sm font-semibold">Active</label>
                <select id="active" name="active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="Y">Y</option>  <!-- Represents true -->
                    <option value="N">N</option>  <!-- Represents false -->
                </select>
            </div>    

            <div class="mb-4">
                <label for="picadded" class="block text-sm font-semibold">PIC</label>
                <select id="picadded" name="picadded" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($userData as $user)
                        <option value="{{ $user['name'] }}">{{ $user['name'] }}</option>
                    @endforeach
                </select>
            </div>   

            <!-- Buttons -->
            <div class="flex justify-end">
                <button type="button" onclick="closeImg()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
