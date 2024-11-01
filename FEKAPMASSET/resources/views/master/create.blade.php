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
        <h2 class="text-xl font-bold mb-4">Create New {{$condition}} Master</h2>

        <form id="editForm" action="{{ route('master.store', ['condition' => $condition]) }}" method="POST">
            @csrf <!-- CSRF protection -->
            <div class="mb-4">
                <label for="conditionModal" class="block text-sm font-semibold">Condition</label>
                <input type="text" id="descriptionModal" class="w-full p-2 border rounded opacity-60" name="condition" value="{{ $condition }}" readonly> <!-- Hidden input for the condition -->
            </div>


            {{-- DESCRIPTION INPUT --}}
            <div class="mb-4">
                <label for="descriptionModal" class="block text-sm font-semibold">Description</label>
                <input type="text" id="descriptionModal" name="description" class="w-full p-2 border rounded" required>
            </div>

            {{-- VALUEGCM INPUT --}}
            <div class="mb-4">
                <label for="valuegcmModal" class="block text-sm font-semibold">ValueGCM</label>
                <input type="text" id="valuegcmModal" name="valuegcm" class="w-full p-2 border rounded" required>
            </div>

            {{-- TYPEGCM SELECT --}}
            <div class="mb-4">
                <label for="typegcmModal" class="block text-sm font-semibold">TypeGCM</label>
                @if ($condition == 'FIELD')
                    <input type="text" id="typegcmModal" name="typegcm" class="w-full p-2 border rounded">
                @elseif ($condition == 'FIELD_VALUE')
                    <select id="typegcmModal" name="typegcm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Select TypeGCM</option>
                        @foreach ($masterData as $master)
                            @if ($master['condition'] == 'FIELD')
                                <option value="{{ $master['description'] }}">{{ $master['description'] }}</option>
                            @endif  
                        @endforeach
                    </select>
                @else
                    @php
                        // Get unique condition values from the master data
                        $getCondition = array();
                        foreach ($masterData as $master) {
                            // Check if 'condition' key exists in the array
                            $getCondition[] = $master['description'];
                        }
                        $uniqueCondition = array_unique($getCondition);
                    @endphp
                    <select id="typegcmModal" name="typegcm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Select TypeGCM</option>
                        @foreach ($uniqueCondition as $optionvalue)
                            <option value="{{ $optionvalue }}">{{ $optionvalue }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <!-- Buttons -->
            <div class="flex justify-end">
                {{-- back button to show page acording to the last condition. --}}
                <button type="button" onclick="window.location.href='{{ route('master.show', ['condition' => $condition]) }}'" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back to Master</button>
                {{-- submit create master form acording to condition. --}}
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
