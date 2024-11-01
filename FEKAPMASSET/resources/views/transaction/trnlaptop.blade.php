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
        <h2 class="text-xl font-bold mb-4">Add {{ $assetcode }} Specification Detail </h2>
        <form id="editForm" action="{{ route('transaction.storespec', ['assetcode' => $assetcode]) }}" method="POST">
            @csrf <!-- CSRF protection -->
            
            {{-- show assetcode --}}
            <div class="mb-4">
                <label for="assetcodeModal" class="block text-sm font-semibold">Asset Code</label>
                <input type="text" id="assetcodeModal" class="w-full p-2 border rounded opacity-60" name="assetcode" value="{{ $assetcode }}" readonly> <!-- Hidden input for the condition -->
            </div>
            
            {{-- show categoru --}}
            <div class="mb-4">
                <label for="assetcategoryModal" class="block text-sm font-semibold">Asset Category</label>
                <input type="text" id="assetcategoryModal" class="w-full p-2 border rounded opacity-60" name="assetcategory" value="{{ $assetcategory }}" readonly> <!-- Hidden input for the condition -->
            </div>

            {{-- select processor brand --}}
            <div class="mb-4">
                <label for="processorbrand" class="block text-sm font-semibold"> Processor Brand </label>
                <select id="processorbrand" name="processorbrand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Processor Brand</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'PROC_BRAND' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select processor model --}}
            <div class="mb-4">
                <label for="processormodel" class="block text-sm font-semibold"> Processor Model </label>
                <select id="processormodel" name="processormodel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Processor Model</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Processor Model based on selected Processor Brand
                document.getElementById('processorbrand').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var assetDropdown = document.getElementById('processormodel');
                    var optionData = @json($optionData); // Get the option data from the server-side

                    // Clear existing options
                    assetDropdown.innerHTML = '<option value="">Select Processor Model</option>';

                    // Filter and add options based on selected processor brand and condition = 'PROC_MODEL'
                    optionData.forEach(function(option) {
                        if (option.condition === 'PROC_MODEL' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            assetDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>

            {{-- select processor series --}}
            <div class="mb-4">
                <label for="processorseries" class="block text-sm font-semibold"> Processor Series </label>
                <select id="processorseries" name="processorseries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Processor Series</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Processor Series based on selected Processor Model
                document.getElementById('processormodel').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var assetDropdown = document.getElementById('processorseries');
                    var optionData = @json($optionData); // Get the option data from the server-side

                    // Clear existing options
                    assetDropdown.innerHTML = '<option value="">Select Processor Model</option>';

                    // Filter and add options based on selected Processor Model and condition = 'PROC_SERIES'
                    optionData.forEach(function(option) {
                        if (option.condition === 'PROC_SERIES' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            assetDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>
            
            {{-- select memory type --}}
            <div class="mb-4">
                <label for="memorytype" class="block text-sm font-semibold"> Memory Type </label>
                <select id="memorytype" name="memorytype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Memory Type</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'MEMORY_TYPE' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select memory brand --}}
            <div class="mb-4">
                <label for="memorybrand" class="block text-sm font-semibold"> Memory Brand </label>
                <select id="memorybrand" name="memorybrand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Memory Brand</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'MEMORY_BRAND' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select memory model --}}
            <div class="mb-4">
                <label for="memorymodel" class="block text-sm font-semibold"> Memory Model </label>
                <select id="memorymodel" name="memorymodel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Memory Model</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Memory Model based on selected Memory Brand
                document.getElementById('memorybrand').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var memoryModelDropdown = document.getElementById('memorymodel');
                    var optionData = @json($optionData);
                    
                    // Clear existing options
                    memoryModelDropdown.innerHTML = '<option value="">Select Memory Model</option>';

                    // Filter and add options based on selected Memory Brand and condition = 'MEMORY_MODEL'
                    optionData.forEach(function(option) {
                        if (option.condition === 'MEMORY_MODEL' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            memoryModelDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>

            {{-- select memory series --}}
            <div class="mb-4">
                <label for="memoryseries" class="block text-sm font-semibold"> Memory Series </label>
                <select id="memoryseries" name="memoryseries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Memory Series</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Memory Series based on selected Memory Model
                document.getElementById('memorymodel').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var memorySeriesDropdown = document.getElementById('memoryseries');
                    var optionData = @json($optionData);

                    // Clear existing options
                    memorySeriesDropdown.innerHTML = '<option value="">Select Memory Series</option>';

                    // Filter and add options based on selected Memory Model and condition = 'MEMORY_SERIES'
                    optionData.forEach(function(option) {
                        if (option.condition === 'MEMORY_SERIES' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            memorySeriesDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>

            {{-- select memory capacity --}}
            <div class="mb-4">
                <label for="memorycapacity" class="block text-sm font-semibold"> Memory Capacity </label>
                <select id="memorycapacity" name="memorycapacity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Memory Capacity</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'MEMORY_CAPACITY' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select storage type --}}
            <div class="mb-4">
                <label for="storagetype" class="block text-sm font-semibold"> Storage Type </label>
                <select id="storagetype" name="storagetype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Storage Type</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'STORAGE_TYPE' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select storage brand --}}
            <div class="mb-4">
                <label for="storagebrand" class="block text-sm font-semibold"> Storage Brand </label>
                <select id="storagebrand" name="storagebrand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Storage Brand</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'STORAGE_BRAND' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select storage model --}}
            <div class="mb-4">
                <label for="storagemodel" class="block text-sm font-semibold"> Storage Model </label>
                <select id="storagemodel" name="storagemodel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Storage Model</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Storage Model based on selected Storage Brand
                document.getElementById('storagebrand').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var storageModelDropdown = document.getElementById('storagemodel');
                    var optionData = @json($optionData);

                    // Clear existing options
                    storageModelDropdown.innerHTML = '<option value="">Select Storage Model</option>';

                    // Filter and add options based on selected Storage Brand and condition = 'STORAGE_MODEL'
                    optionData.forEach(function(option) {
                        if (option.condition === 'STORAGE_MODEL' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            storageModelDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>

            {{-- select storage capacity --}}
            <div class="mb-4">
                <label for="storagecapacity" class="block text-sm font-semibold"> Storage Capacity </label>
                <select id="storagecapacity" name="storagecapacity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Storage Capacity</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'STORAGE_CAPACITY' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select graphics type --}}
            <div class="mb-4">
                <label for="graphicstypE1" class="block text-sm font-semibold"> First Graphics Type </label>
                <select id="graphicstypE1" name="graphicstypE1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select First Graphic Type</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'GRAPHIC_TYPE' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select graphics brand --}}
            <div class="mb-4">
                <label for="graphicsbranD1" class="block text-sm font-semibold"> First Graphic Brand </label>
                <select id="graphicsbranD1" name="graphicsbranD1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select First Graphic Brand</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'GRAPHIC_BRAND' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select graphics model --}}
            <div class="mb-4">
                <label for="graphicsmodeL1" class="block text-sm font-semibold"> First Graphic Model </label>
                <select id="graphicsmodeL1" name="graphicsmodeL1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select First Graphic Model</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Graphics Model based on selected Graphics Brand
                document.getElementById('graphicsbranD1').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var graphicsModelDropdown = document.getElementById('graphicsmodeL1');
                    var optionData = @json($optionData);

                    // Clear existing options
                    graphicsModelDropdown.innerHTML = '<option value="">Select Graphics Model</option>';

                    // Filter and add options based on selected Graphics Brand and condition = 'GRAPHIC_MODEL'
                    optionData.forEach(function(option) {
                        if (option.condition === 'GRAPHIC_MODEL' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            graphicsModelDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>

            {{-- select graphics series --}}
            <div class="mb-4">
                <label for="graphicsserieS1" class="block text-sm font-semibold"> First Graphic Series </label>
                <select id="graphicsserieS1" name="graphicsserieS1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select First Graphic Series</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Graphics Series based on selected Graphics Model
                document.getElementById('graphicsmodeL1').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var graphicsSeriesDropdown = document.getElementById('graphicsserieS1');
                    var optionData = @json($optionData);

                    // Clear existing options
                    graphicsSeriesDropdown.innerHTML = '<option value="">Select Graphics Series</option>';

                    // Filter and add options based on selected Graphics Model and condition = 'GRAPHIC_SERIES'
                    optionData.forEach(function(option) {
                        if (option.condition === 'GRAPHIC_SERIES' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            graphicsSeriesDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>

            {{-- select graphics memory capacity --}}
            <div class="mb-4">
                <label for="graphicscapacitY1" class="block text-sm font-semibold"> First Graphic Memory Capacity </label>
                <select id="graphicscapacitY1" name="graphicscapacitY1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select First Graphic Memory Capacity</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'GRAPHIC_MEMORY_CAPACITY' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select graphics type 2 --}}
            <div class="mb-4">
                <label for="graphicstypE2" class="block text-sm font-semibold"> Second Graphic Type </label>
                <select id="graphicstypE2" name="graphicstypE2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Second Graphic Type</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'GRAPHIC_TYPE' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select graphics brand 2 --}}
            <div class="mb-4">
                <label for="graphicsbranD2" class="block text-sm font-semibold"> Second Graphic Brand </label>
                <select id="graphicsbranD2" name="graphicsbranD2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Second Graphic Brand</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'GRAPHIC_BRAND' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select graphics model 2 --}}
            <div class="mb-4">
                <label for="graphicsmodeL2" class="block text-sm font-semibold"> Second Graphic Model </label>
                <select id="graphicsmodeL2" name="graphicsmodeL2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Second Graphic Model</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Graphics Model 2 based on selected Graphics Brand 2
                document.getElementById('graphicsbranD2').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var graphicsModelDropdown = document.getElementById('graphicsmodeL2');
                    var optionData = @json($optionData);

                    // Clear existing options
                    graphicsModelDropdown.innerHTML = '<option value="">Select Graphics Model 2</option>';

                    // Filter and add options based on selected Graphics Brand 2 and condition = 'GRAPHIC_MODEL'
                    optionData.forEach(function(option) {
                        if (option.condition === 'GRAPHIC_MODEL' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            graphicsModelDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>

            {{-- select graphics series 2 --}}
            <div class="mb-4">
                <label for="graphicsserieS2" class="block text-sm font-semibold"> Second Graphic Series </label>
                <select id="graphicsserieS2" name="graphicsserieS2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Second Graphic Series</option>
                </select>
            </div>

            <script>
                // JavaScript to handle dynamic population of Graphics Series 2 based on selected Graphics Model 2
                document.getElementById('graphicsmodeL2').addEventListener('change', function() {
                    var selectedvalue = this.value;
                    var graphicsSeriesDropdown = document.getElementById('graphicsserieS2');
                    var optionData = @json($optionData);

                    // Clear existing options
                    graphicsSeriesDropdown.innerHTML = '<option value="">Select Graphics Series 2</option>';

                    // Filter and add options based on selected Graphics Model 2 and condition = 'GRAPHIC_SERIES'
                    optionData.forEach(function(option) {
                        if (option.condition === 'GRAPHIC_SERIES' && option.typegcm === selectedvalue) {
                            var newOption = document.createElement('option');
                            newOption.value = option.description;
                            newOption.text = option.description;
                            graphicsSeriesDropdown.appendChild(newOption);
                        }
                    });
                });
            </script>

            {{-- select graphics memory capacity 2 --}}
            <div class="mb-4">
                <label for="graphicscapacitY2" class="block text-sm font-semibold"> Second Graphic Memory Capacity </label>
                <select id="graphicscapacitY2" name="graphicscapacitY2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Second Graphic Memory Capacity</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'GRAPHIC_MEMORY_CAPACITY' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            {{-- select screen resolution --}}
            <div class="mb-4">
                <label for="screenresolution" class="block text-sm font-semibold"> Screen Resolution </label>
                <select id="screenresolution" name="screenresolution" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Select Screen Resolution</option>
                    @foreach ($optionData as $optionvalue)
                        @if ($optionvalue['condition'] == 'SCREEN_RESOLUTION' )
                            <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- select touchscreen --}}
            <div class="mb-4">
                <label for="touchscreen" class="block text-sm font-semibold">Touchscreen</label>
                <select id="touchscreen" name="touchscreen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
            </div>

            {{-- select backlight keyboard --}}
            <div class="mb-4">
                <label for="backlightkeyboard" class="block text-sm font-semibold">Backlight Keyboard</label>
                <select id="backlightkeyboard" name="backlightkeyboard" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
            </div>

            {{-- select convertible --}}
            <div class="mb-4">
                <label for="convertible" class="block text-sm font-semibold">Convertible</label>
                <select id="convertible" name="convertible" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
            </div>

            {{-- select web camera --}}
            <div class="mb-4">
                <label for="webcamera" class="block text-sm font-semibold">Web Camera</label>
                <select id="webcamera" name="webcamera" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
            </div>

            {{-- select speaker --}}
            <div class="mb-4">
                <label for="speaker" class="block text-sm font-semibold">Speaker</label>
                <select id="speaker" name="speaker" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
            </div>

            {{-- select microphone --}}
            <div class="mb-4">
                <label for="microphone" class="block text-sm font-semibold">Microphone</label>
                <select id="microphone" name="microphone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
            </div>

            {{-- select wifi --}}
            <div class="mb-4">
                <label for="wifi" class="block text-sm font-semibold">WiFi</label>
                <select id="wifi" name="wifi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
            </div>

            {{-- select bluetooth --}}
            <div class="mb-4">
                <label for="bluetooth" class="block text-sm font-semibold">Bluetooth</label>
                <select id="bluetooth" name="bluetooth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
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

