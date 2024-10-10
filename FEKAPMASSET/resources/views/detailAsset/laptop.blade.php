@extends('layouts.app')

@section('content')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-lg bg-clip-border">
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 rounded-lg bg-white">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                    {{-- Insert Image here  --}}
                    {{-- <a href="#">
                        <img class="rounded-t-lg w-full" src="D:/laragon/www/KAPMASSETAP1/FEKAPMASSET/public/assets/KAI.png" alt="" />
                    </a> --}}
                    <div class="p-5">
                        <div class="flex justify-between items-center pb-4 mb-4">
                            <!-- Left Aligned Heading -->
                            <a href="#">
                                <h4 class="text-2xl font-bold tracking-tight text-gray-900">
                                    Detail Asset
                                </h4>
                            </a>
                            <!-- Right Aligned Buttons -->
                            <div class="flex space-x-4">
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Print QR
                                </button>
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Update Asset
                                </button>
                            </div>
                        </div>
                        <div class="relative overflow-x-auto">
                            @foreach ($assetData as $assets)
                            @php
                                $assetbrand = isset($assets['assetbrand']) ? $assets['assetbrand'] : 'N/A';
                                $assetmodel = isset($assets['assetmodel']) ? $assets['assetmodel'] : 'N/A';
                                $assetseries = isset($assets['assetseries']) ? $assets['assetseries'] : 'N/A';
                                $assetbms = $assetbrand . ' ' . $assetmodel . ' ' . $assetseries;
                                $assettype = isset($assets['assettype']) ? $assets['assettype'] : 'N/A';
                                $assetcategory = isset($assets['assetcategory']) ? $assets['assetcategory'] : 'N/A';
                                $assetcode = isset($assets['assetcode']) ? $assets['assetcode'] : 'N/A';
                                $assetserialnumber = isset($assets['assetserialnumber']) ? $assets['assetserialnumber'] : 'N/A';
                            @endphp
                            @endforeach
                            @foreach ($assetSpecData as $assetspecs)
                            @php
                                $processorbrand = isset($assetspecs['processorbrand']) ? $assetspecs['processorbrand'] : 'N/A';
                                $processormodel = isset($assetspecs['processormodel']) ? $assetspecs['processormodel'] : 'N/A';
                                $processorseries = isset($assetspecs['processorseries']) ? $assetspecs['processorseries'] : 'N/A';
                                $processor = $processorbrand . ' ' . $processormodel . ' ' . $processorseries;
                                $memorytype = isset($assetspecs['memorytype']) ? $assetspecs['memorytype'] : 'N/A';
                                $memorybrand = isset($assetspecs['memorybrand']) ? $assetspecs['memorybrand'] : 'N/A';
                                $memorymodel = isset($assetspecs['memorymodel']) ? $assetspecs['memorymodel'] : 'N/A';
                                $memoryseries = isset($assetspecs['memoryseries']) ? $assetspecs['memoryseries'] : 'N/A';
                                $memorycapacity = isset($assetspecs['memorycapacity']) ? $assetspecs['memorycapacity'] : 'N/A';
                                $memory = $memorytype . ' ' . $memorybrand . ' ' . $memorymodel . ' ' . $memoryseries . ' ' . $memorycapacity . ' GB';
                                $storagetype = isset($assetspecs['storagetype']) ? $assetspecs['storagetype'] : 'N/A';
                                $storagebrand = isset($assetspecs['storagebrand']) ? $assetspecs['storagebrand'] : 'N/A';
                                $storagemodel = isset($assetspecs['storagemodel']) ? $assetspecs['storagemodel'] : 'N/A';
                                $storagecapacity = isset($assetspecs['storagecapacity']) ? $assetspecs['storagecapacity'] : 'N/A';
                                $storage = $storagetype . ' ' . $storagebrand . ' ' . $storagemodel . ' ' . $storagecapacity . ' GB';
                                $graphicsbrand = isset($assetspecs['graphicsbrand']) ? $assetspecs['graphicsbrand'] : 'N/A';
                                $graphicsmodel = isset($assetspecs['graphicsmodel']) ? $assetspecs['graphicsmodel'] : 'N/A';
                                $graphicsseries = isset($assetspecs['graphicsseries']) ? $assetspecs['graphicsseries'] : 'N/A';
                                $graphicscapacity = isset($assetspecs['graphicscapacity']) ? $assetspecs['graphicscapacity'] : 'N/A';
                                $graphics = $graphicsbrand . ' ' . $graphicsmodel . ' ' . $graphicsseries . ' ' . $graphicscapacity . ' GB';
                                $graphicstype = isset($assetspecs['graphicstype']) ? $assetspecs['graphicstype'] : 'N/A';
                                $screenresolution = isset($assetspecs['screenresolution']) ? $assetspecs['screenresolution'] : 'N/A';
                                $touchscreen = isset($assetspecs['touchscreen']) ? $assetspecs['touchscreen'] : 'N/A';
                                $backlightkeyboard = isset($assetspecs['backlightkeyboard']) ? $assetspecs['backlightkeyboard'] : 'N/A';
                                $convertible = isset($assetspecs['convertible']) ? $assetspecs['convertible'] : 'N/A';
                                $webcamera = isset($assetspecs['webcamera']) ? $assetspecs['webcamera'] : 'N/A';
                                $speaker = isset($assetspecs['speaker']) ? $assetspecs['speaker'] : 'N/A';
                                $microphone = isset($assetspecs['microphone']) ? $assetspecs['microphone'] : 'N/A';
                                $wifi = isset($assetspecs['wifi']) ? $assetspecs['wifi'] : 'N/A';
                                $bluetooth = isset($assetspecs['bluetooth']) ? $assetspecs['bluetooth'] : 'N/A';
                            @endphp
                            @endforeach

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <tbody>
                                    <!-- Table Head in the First Column -->

                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset Type:</th>
                                        <td class="px-6 py-4">: {{$assettype}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Device Type:</th>
                                        <td class="px-6 py-4">: {{$assetcategory}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset Code:</th>
                                        <td class="px-6 py-4">: {{$assetcode}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Device:</th>
                                        <td class="px-6 py-4">: {{$assetbms}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset SerialNumber:</th>
                                        <td class="px-6 py-4">: {{$assetserialnumber}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Processor:</th>
                                        <td class="px-6 py-4">: {{$processor}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Memory:</th>
                                        <td class="px-6 py-4">: {{$memory}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Storage:</th>
                                        <td class="px-6 py-4">: {{$storage}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Graphics Card Type</th>
                                        <td class="px-6 py-4">: {{$graphicstype}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Graphics Card</th>
                                        <td class="px-6 py-4">: {{$graphics}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Screen Resolution</th>
                                        <td class="px-6 py-4">{{$screenresolution}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Touchscreen</th>
                                        <td class="px-6 py-4">@if($touchscreen == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Backlight Keyboard</th>
                                        <td class="px-6 py-4">@if($backlightkeyboard == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Convertible</th>
                                        <td class="px-6 py-4">@if($convertible == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Web Camera</th>
                                        <td class="px-6 py-4">@if($webcamera == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Speaker</th>
                                        <td class="px-6 py-4">@if($speaker == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Microphone</th>
                                        <td class="px-6 py-4">@if($microphone == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Wifi</th>
                                        <td class="px-6 py-4">@if($wifi == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Bluetooth</th>
                                        <td class="px-6 py-4">@if($bluetooth == 'true') yes @else no @endif</td>
                                    </tr>
                                    <!-- Add more rows as necessary -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 bg-white">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center pb-4 mb-4">
                        <!-- Left Aligned Heading -->
                        <a href="#">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                Software
                            </h5>
                        </a>
                        <!-- Right Aligned Buttons -->
                        <div class="flex space-x-4">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="">
                                Add Software
                            </button>
                        </div>
                    </div>
                    <!-- Dynamic Table-like Section with Headers as Rows -->
                        <div class="relative overflow-x-auto">
                            <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">ID</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Type</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Category</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Name</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">License</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Active</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">PIC Added</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Added</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Updated</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Asset Code</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Action</th>
                                </thead>
                            </table>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 bg-white">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center pb-4 mb-4">
                        <!-- Left Aligned Heading -->
                        <a href="#">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                Image
                            </h5>
                        </a>
                        <!-- Right Aligned Buttons -->
                        <div class="flex space-x-4">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Add Image
                            </button>
                        </div>
                    </div>
                    <!-- Dynamic Table-like Section with Headers as Rows -->
                        <div class="relative overflow-x-auto">
                            <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Overview</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Front-View</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Under-View</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Action</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 bg-white">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center pb-4 mb-4">
                        <!-- Left Aligned Heading -->
                        <a href="#">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                History
                            </h5>
                        </a>
                    </div>
                    <!-- Dynamic Table-like Section with Headers as Rows -->
                    <div class="relative overflow-x-auto">
                        <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">ID History</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">NIPP</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Name</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Position</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Unit</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Department</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Directorate</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">PIC Added</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Added</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Updated</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Asset Code</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Action</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 bg-white">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center pb-4 mb-4">
                        <!-- Left Aligned Heading -->
                        <a href="#">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                Maintenance History
                            </h5>
                        </a>
                        <!-- Right Aligned Buttons -->
                        <div class="flex space-x-4">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Add Maintenance History
                            </button>
                        </div>
                    </div>
                    <!-- Dynamic Table-like Section with Headers as Rows -->
                    <div class="relative overflow-x-auto">
                        <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Maintenance ID</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">PIC Added</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Notes</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Added</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Asset Code</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Action</th>
                                </tr>
                            </thead>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for all of the tables --}}
    <!-- Software Modal -->
    <div id="softwareModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-md w-96">
            <h2 class="text-xl font-bold mb-4">Edit Software</h2>

            <form id="editFormSoftware">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->

                <!-- Input fields for master data -->
                <div class="mb-4">
                    <label for="masterid" class="block text-sm font-semibold">ID</label>
                    <input type="text" id="masterid" name="masterid" class="w-full p-2 border rounded" readonly>
                </div>
                
                <div class="mb-4">
                    <label for="condition" class="block text-sm font-semibold">Type</label>
                    <input type="text" id="conditionModal" name="condition" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="nosrModal" class="block text-sm font-semibold">Category</label>
                    <input type="text" id="nosrModal" name="nosrModal" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                  <label for="description" class="block text-sm font-semibold"> Name </label>
                  <input type="text" id="descriptionModal" name="description" class="w-full p-2 border rounded" required>
              </div>
              <div class="mb-4">
                  <label for="valuegcm" class="block text-sm font-semibold"> Lincense </label>
                  <input type="text" id="valuegcmModal" name="valuegcm" class="w-full p-2 border rounded" required>
              </div>
              <div class="mb-4">
                  <label for="typegcm" class="block text-sm font-semibold"> Active </label>
                  <input type="text" id="typegcmModal" name="typegcm" class="w-full p-2 border rounded" required>
              </div>
              <div class="mb-4">
                  <label for="active" class="block text-sm font-semibold"> PIC Added </label>
                  <input type="text" id="activeModal" name="active" class="w-full p-2 border rounded" required>
              </div>
              <div class="mb-4">
                  <label for="active" class="block text-sm font-semibold"> Date Added </label>
                  <input type="text" id="activeModal" name="active" class="w-full p-2 border rounded" required>
              </div>
              <div class="mb-4">
                  <label for="active" class="block text-sm font-semibold"> Date Updated </label>
                  <input type="text" id="activeModal" name="active" class="w-full p-2 border rounded" required>
              </div>
              <div class="mb-4">
                  <label for="active" class="block text-sm font-semibold"> Asset Code </label>
                  <input type="text" id="activeModal" name="active" class="w-full p-2 border rounded" required>
              </div>

                <!-- Add more fields as necessary -->

                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
      </div>
</div>


<script>
    // Function to open modal and pre-fill form
//   function openSoftwareModal(masterData) {
//     document.getElementById('masterid').value = masterData.masterid;
//     document.getElementById('conditionModal').value = masterData.condition;
//     document.getElementById('nosrModal').value = masterData.nosr;
//     document.getElementById('descriptionModal').value = masterData.description;
//     document.getElementById('valuegcmModal').value = masterData.valuegcm;
//     document.getElementById('typegcmModal').value = masterData.typegcm;
//     document.getElementById('activeModal').value = masterData.active;
//       // Populate other form fields as necessary
      
//       document.getElementById('editModal').classList.remove('hidden');
//   }

//   // Function to close modal
//   function closeSoftwareModal() {
//       document.getElementById('editModal').classList.add('hidden');
//   }

//   // Handle form submission via AJAX
//   document.getElementById('editForm').addEventListener('submit', function (event) {
//       event.preventDefault();

//       const masterid = document.getElementById('masterid').value;
//       const formData = new FormData(this);

//       fetch(`/master/${masterid}`, {
//           method: 'POST',
//           headers: {
//               'X-CSRF-TOKEN': '{{ csrf_token() }}',
//               'Accept': 'application/json',
//           },
//           body: formData
//       })
//       .then(response => {
//           if (response.ok) {
//               return response.json();
//           } else {
//               throw new Error('Failed to update record');
//           }
//       })
//       .then(data => {
//           alert('Master updated successfully');
//           location.reload(); // Refresh the page to reflect the changes
//       })
//       .catch(error => {
//           console.error('Error:', error);
//           alert('Failed to update the record');
//       });
//   });


</script>


@endsection