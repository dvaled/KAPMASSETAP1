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
        <h2 class="text-xl font-bold mb-4">Maintenance Record</h2>

        <form id="editForm" action="{{ route('maintenance.store', ['assetcode' => $assetcode]) }}" method="POST">
            @csrf <!-- CSRF protection -->

            <!-- Input fields for master data -->
            <div class="mb-4">
                <label for="assetcode" class="block text-sm font-semibold">Asset Code</label>
                <select id="assetcode" name="assetcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="{{ $assetcode }}">{{ $assetcode }}</option>
                </select>  
            </div>

            <div class="mb-4">  
                <label for="picadded" class="block text-sm font-semibold">PIC</label>
                <select id="picadded" name="picadded" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($user as $assets)
                        <option value="{{ $assets['name'] }}">{{ $assets['name'] }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="notes" class="block text-sm font-semibold">Notes</label>
                <input type="text" id="notes" name="notes" class="w-full p-2 border rounded" required>
            </div>  

            <!-- Buttons -->
            <div class="flex justify-end">
                <button type="button" onclick="window.location.href='{{ route('detailAsset.laptop', ['assetcode' => $assetcode]) }}'" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>

    <div class="w-full max-w-full px-3 mt-6 md:mt-0 shrink-0 md:flex-0 md:w-4/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-6 text-center">
            <p>...and by passing a parameter, you can execute something else for "Cancel"</p>
            <button class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25" onclick="soft.showSwal('warning-message-and-cancel')">Try me!</button>
          </div>
        </div>
      </div>
    
</div>


@endsection
