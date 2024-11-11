@extends('layouts.app')

@section('content')
@foreach ($assetData as $assets)
@php
    // Asset Information
    $assetbrand = isset($assets['assetbrand']) ? $assets['assetbrand'] : 'N/A';
    $assetmodel = isset($assets['assetmodel']) ? $assets['assetmodel'] : 'N/A';
    $assetseries = isset($assets['assetseries']) ? $assets['assetseries'] : 'N/A';
    $assetbms = $assetbrand . ' ' . $assetmodel . ' ' . $assetseries;
    $assettype = isset($assets['assettype']) ? $assets['assettype'] : 'N/A';
    $assetcategory = isset($assets['assetcategory']) ? $assets['assetcategory'] : 'N/A';
    $assetcode = isset($assets['assetcode']) ? $assets['assetcode'] : 'N/A';
    $assetserialnumber = isset($assets['assetserialnumber']) ? $assets['assetserialnumber'] : 'N/A';

    // Employee Information
    $employeeNIPP = isset($assets['employee']['nipp']) ? $assets['employee']['nipp'] : 'N/A';
    $employeeName = isset($assets['employee']['name']) ? $assets['employee']['name'] : 'N/A';
    $employeePosition = isset($assets['employee']['position']) ? $assets['employee']['position'] : 'N/A';
    $employeeUnit = isset($assets['employee']['unit']) ? $assets['employee']['unit'] : 'N/A';
    $employeeDepartment = isset($assets['employee']['department']) ? $assets['employee']['department'] : 'N/A';
    $employeeDirectorate = isset($assets['employee']['directorate']) ? $assets['employee']['directorate'] : 'N/A';
    $employeeActive = isset($assets['employee']['active']) ? $assets['employee']['active'] : 'N/A';
@endphp 
@endforeach

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="relative flex flex-col w-full min-w-0 mb-2 break-words bg-white border-0 border-transparent border-solid shadow-    -xl rounded-lg bg-clip-border">
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 bg-white">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="p-5">
                        <div class="flex justify-between items-center pb-4 mb-4">
                            <!-- Left Aligned Heading -->
                            @if (empty($employeeNIPP) || $employeeNIPP === 'Null')
                            <a href="#">
                                <h4 class="text-2xl font-bold tracking-tight text-gray-900">
                                    This asset is available and ready to be assigned
                                </h4>
                            </a>
                            <!-- Right Aligned Buttons -->
                            <div class="flex space-x-4">
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Assign This Asset
                                </button>
                            </div>
                            @else
                            <a href="#">
                                <h4 class="text-2xl font-bold tracking-tight text-gray-900 flex flex-wrap">
                                    <span class="mr-4">{{$employeeNIPP}}</span>
                                    <span class="mr-4">{{$employeeName}}</span>
                                    <span class="mr-4">{{$employeePosition}}</span>
                                    <span>{{$employeeUnit}}</span>
                                </h4>
                            </a>    
                            <!-- Right Aligned Buttons -->
                            <div class="flex space-x-4">
                                {{-- @auth --}}
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300"
                                        onclick="unassignAsset('{{ route('transaction.unassign', ['assetcode' => $assetcode]) }}')">
                                    Unassign
                                </button>
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Print BAST
                                </button>
                                {{-- @endauth --}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
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
                            {{-- @auth --}}
                            <div class="flex space-x-4">
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Print QR
                                </button>
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('transaction.laptop',[
                                    'assetcategory' => $assetcategory, 
                                    'assetcode' => $assetcode,
                                    ])}}'">
                                    Update Asset
                                </button>
                            </div>
                            {{-- @endauth --}}
                        </div>
                        <div class="relative overflow-x-auto">
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
                                $graphicsbrand1 = isset($assetspecs['graphicsbranD1']) ? $assetspecs['graphicsbranD1'] : 'N/A';
                                $graphicsmodel1 = isset($assetspecs['graphicsmodeL1']) ? $assetspecs['graphicsmodeL1'] : 'N/A';
                                $graphicsseries1 = isset($assetspecs['graphicsserieS1']) ? $assetspecs['graphicsserieS1'] : 'N/A';
                                $graphicscapacity1 = isset($assetspecs['graphicscapacitY1']) ? $assetspecs['graphicscapacitY1'] : 'N/A';
                                $graphics1 = $graphicsbrand1 . ' ' . $graphicsmodel1 . ' ' . $graphicsseries1 . ' ' . $graphicscapacity1 . ' GB';
                                $graphicstype1 = isset($assetspecs['graphicstypE1']) ? $assetspecs['graphicstypE1'] : 'N/A';

                                $graphicsbrand2 = isset($assetspecs['graphicsbranD2']) ? $assetspecs['graphicsbranD2'] : 'N/A';
                                $graphicsmodel2 = isset($assetspecs['graphicsmodeL2']) ? $assetspecs['graphicsmodeL2'] : 'N/A';
                                $graphicsseries2 = isset($assetspecs['graphicsserieS2']) ? $assetspecs['graphicsserieS2'] : 'N/A';
                                $graphicscapacity2 = isset($assetspecs['graphicscapacitY2']) ? $assetspecs['graphicscapacitY2'] : 'N/A';
                                $graphics2 = $graphicsbrand2 . ' ' . $graphicsmodel2 . ' ' . $graphicsseries2 . ' ' . $graphicscapacity2 . ' GB';
                                $graphicstype2 = isset($assetspecs['graphicstypE2']) ? $assetspecs['graphicstypE2'] : 'N/A';

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
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">First Graphics Card Type</th>
                                        <td class="px-6 py-4">: {{$graphicstype1}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">First Graphics Card</th>
                                        <td class="px-6 py-4">: {{$graphics1}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Second Graphics Card Type</th>
                                        <td class="px-6 py-4">: {{$graphicstype2}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Second Graphics Card</th>
                                        <td class="px-6 py-4">: {{$graphics2}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Screen Resolution</th>
                                        <td class="px-6 py-4">: {{$screenresolution}}</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Touchscreen</th>
                                        <td class="px-6 py-4">: @if($touchscreen == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Backlight Keyboard</th>
                                        <td class="px-6 py-4">: @if($backlightkeyboard == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Convertible</th>
                                        <td class="px-6 py-4">: @if($convertible == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Web Camera</th>
                                        <td class="px-6 py-4">: @if($webcamera == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Speaker</th>
                                        <td class="px-6 py-4">: @if($speaker == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Microphone</th>
                                        <td class="px-6 py-4">: @if($microphone == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Wifi</th>
                                        <td class="px-6 py-4">: @if($wifi == 'true') yes @else no @endif</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Bluetooth</th>
                                        <td class="px-6 py-4">: @if($bluetooth == 'true') yes @else no @endif</td>
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
                            {{-- @auth --}}
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('detailAsset.software', ['assetcode' => $assetcode]) }}'">
                                {{-- onclick="window.location.href='{{ route('software.create' --}}
                                Add Software
                            </button>
                            {{-- @endauth --}}
                        </div>
                    </div>
                    <!-- Dynamic Table-like Section with Headers as Rows -->
                        <div class="relative overflow-x-auto">
                            <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">ID</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Type</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Category</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Description</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Added</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Active</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Action</th>
                                    </tr>
                                </thead>
                            @if(!empty($detailSoftwareData))
                                @foreach ($detailSoftwareData as $software)
                                <tbody>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="text-center mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $software['idassetsoftware'] }}</p> <!-- Display Condition -->
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $software['softwaretype'] }}</p> <!-- Display Condition -->
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $software['softwarecategory'] }}</p> <!-- Display Condition -->
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $software['softwarename'] }} - {{ $software['softwarelicense'] }}</p> <!-- Display Condition -->
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $software['dateadded'] }}</p> <!-- Display Condition -->
                                    </td>
                                    {{-- @auth     --}}
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent"> 
                                        <form action="{{ route('software.delete', ['id' => $software['idassetsoftware']]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" 
                                                       name="active" 
                                                       value="Y" 
                                                       class="sr-only peer" 
                                                       onchange="this.form.submit()"
                                                       {{ $software['active'] == 'Y' ? 'checked' : '' }}>
                                                       
                                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                    
                                            <input type="hidden" name="active" value="{{ $software['active'] == 'Y' ? 'N' : 'Y' }}">
                                        </form>
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <!-- Edit Icon -->
                                        <a href="javascript:void(0);" class="text-blue-500 text-sm font-bold mr-2" onclick="openSoftwareModal({{ json_encode($software) }})">
                                            <i class="fas fa-edit"></i>
                                         </a>

                                        {{-- href="{{ route('detailAsset.software.edit', ['assetcode' => $assetcode, 'id' => $software['idassetsoftware']]) }}" --}}

                                        


                                        {{-- <a href="javascript:void(0);" class="text-red-500 text-sm font-bold mr-2" onclick="openDeleteModal({{json_encode($detailSoftwareData)}})">
                                           <i class="fas fa-trash"></i>
                                        </a> --}}
                                      
                                    </td>
                                    {{-- @endauth --}}
                                </tbody>
                                @endforeach
                                @else
                                <p class=" font-semibold leading-tight text-xl border-gray-300 mb-2">No data is available</p> <!-- Display Condition -->                                    
                            @endif
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
                    {{-- @auth    --}}
                    <div class="flex justify-between items-center pb-4 mb-4">
                        <!-- Left Aligned Heading -->
                        <a href="#">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                Image
                            </h5>
                        </a>
                        <!-- Right Aligned Buttons -->
                        <div class="flex space-x-4">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('detailAsset.image', ['assetcode' => $assetcode]) }}'">
                                Add Image
                            </button>
                        </div>
                    </div>
                    {{-- @endauth --}}
                    <!-- Dynamic Table-like Section with Headers as Rows -->
                        <div class="relative overflow-y-auto max-h-[400px]">
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 overflow-auto">
                                @foreach ($imgData as $img)
                                    <div>
                                            <button onclick="openImgModal({{ json_encode($img) }})">
                                                <img class="h-auto max-w-full rounded-lg" src="{{ $img['assetpic'] }}" alt="Asset Image">
                                            </button >
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @auth --}}
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 bg-white">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center pb-4 mb-4">
                        <!-- Left Aligned Heading -->
                        <a href="#">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                Device's User History
                            </h5>
                        </a>
                    </div>
                    <!-- Dynamic Table-like Section with Headers as Rows -->
                    <div class="relative overflow-x-auto">
                        <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">ID History</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">NIPP</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Name</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Position</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Unit</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Department</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Directorate</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">PIC Added</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Added</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Updated</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Asset Code</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($histData))
                                @foreach ($histData as $histData)
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['idassethistory'] }}</p> <!-- Display Condition -->
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['assetcode'] }}</p> <!-- Display Condition -->                                    
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['nipp'] }}</p> <!-- Display Condition -->                                    
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['name'] }}</p> <!-- Display Condition -->                                    
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['position'] }}</p> <!-- Display Condition -->                                    
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['unit'] }}</p> <!-- Display Condition -->                                    
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['department'] }}</p> <!-- Display Condition -->                                    
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['directorate'] }}</p> <!-- Display Condition -->                                    
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                        <p class="mb-2 font-semibold leading-tight text-xs border-gray-300">{{ $histData['picadded'] }}</p> <!-- Display Condition -->                                    
                                    </td>
                                @endforeach
                            @else
                                <p class="mb-2 font-semibold leading-tight text-xl border-gray-300">No data is available</p> <!-- Display Condition -->                                    
                            @endif        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 bg-white">
                <div class="w-full p-6 bg-white border border-gray-300 rounded-lg shadow">
                    <div class="flex justify-between items-center pb-4 mb-4">
                        <!-- Left Aligned Heading -->
                        <a href="#">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                Device Maintenance History
                            </h5>
                        </a>
                        <!-- Right Aligned Buttons -->
                        @if (empty($employeeNIPP) || $employeeNIPP === 'Null')
                        <div class="flex space-x-4">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('maintenance.create', ['assetcode' => $assetcode]) }}'"">
                                    Add Record
                            </button>
                        </div>
                        @endif
                    </div>
                    <!-- Dynamic Table-like Section with Headers as Rows -->
                    <div class="relative overflow-x-auto">
                        <table class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Maintenance ID</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">PIC Added</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Date Added</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70 border-r border-gray-300">Notes</th>
                                </tr>
                            </thead>
                        @if(!empty($historyMaintenanceData))
                            @foreach ($historyMaintenanceData as $history)
                            <tbody>
                                <tr>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent"> 
                                        <p class="text-center mb-2 font-semibold leading-tight text-xs">{{ $history['maintenanceid'] }}</p> <!-- Display Condition -->
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent"> 
                                        <p class="text-center mb-2 font-semibold leading-tight text-xs">{{ $history['picadded'] }}</p> <!-- Display Condition -->
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent"> 
                                        <p class="text-center mb-2 font-semibold leading-tight text-xs">{{ $history['dateadded'] }}</p> <!-- Display Condition -->
                                    </td>
                                    <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent"> 
                                        <p class="text-center mb-2 font-semibold leading-tight text-xs">{{ $history['notes'] }}</p> <!-- Display Condition -->
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            @else
                            <p class="mb-2 font-semibold leading-tight text-xl border-gray-300">No data is available</p> <!-- Display Condition -->                                    
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- @endauth --}}

    {{-- Modal for all of the tables --}}
    <!-- Software Modal -->
    <div id="softwareModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-md w-96 overflow-y-auto max-h-[90vh]">
            <h2 class="text-xl font-bold mb-4">Edit Software</h2>

            <form id="updateFormSoftware" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->

                <!-- Input fields for assetMaster data -->
                <div class="mb-4">
                    <label for="idassetsoftware" class="block text-sm font-semibold">Software ID</label>
                    <input id="idassetsoftware" name="idassetsoftware" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly></input>
                </div>
                <div class="mb-4">
                    <label for="assetcode" class="block text-sm font-semibold">Asset Code</label>
                    <input id="assetcode" name="assetcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly value="{{ $assetcode }}"></input>
                </div>
                
                <div class="mb-4">
                    <label for="softwaretype" class="block text-sm font-semibold">Type</label>
                    <select id="softwaretype" name="softwaretype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($assetMaster as $user)
                            <option value="{{ $user['condition'] }}">{{ $user['condition'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="softwarecategory" class="block text-sm font-semibold">Category</label>
                    <select id="softwarecategory" name="softwarecategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($assetMaster as $user)
                            <option value="{{ $user['condition'] }}">{{ $user['condition'] }}</option>
                        @endforeach
                    </select>
                </div>  
                <div class="mb-4">
                    <label for="softwarename" class="block text-sm font-semibold">Name</label>
                    <select id="softwarename" name="softwarename" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($assetMaster as $user)
                        <option value="{{ $user['condition'] }}">{{ $user['condition'] }}</option>
                        @endforeach
                    </select>
                </div>  
                <div class="mb-4">
                    <label for="softwarelicense" class="block text-sm font-semibold">License</label>
                    <select id="softwarelicense" name="softwarelicense" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($assetMaster as $user)
                        <option value="{{ $user['condition'] }}">{{ $user['condition'] }}</option>
                        @endforeach
                    </select>
                </div>  
                
                <div class="mb-4">
                    <label for="softwareperiod" class="block text-sm font-semibold">Software Period</label>
                    <select id="softwareperiod" name="softwareperiod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($userData as $user)
                            <option value="{{ $user['name'] }}">{{ $user['name'] }}</option>
                        @endforeach
                    </select>
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
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
      </div>
      
    {{-- modal for maintenance data --}}
    <div id="mtcModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-md w-96">
            <h2 class="text-xl font-bold mb-4">Maintenance Record</h2>
    
            <form id="mtcForm">
                @csrf
                {{-- asset code --}}

                <div class="mb-4">
                    <label for="mtcId" class="block text-sm font-semibold">Maintenance ID</label>
                    <input id="mtcId" name="mtcId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly value="{{$assetcode}}"></input>
                </div>

                <div class="mb-4">
                    <label for="mtcAssetcode" class="block text-sm font-semibold">Asset Code</label>
                    <input id="mtcAssetcode" name="mtcAssetcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly value="{{$assetcode}}"></input>
                </div>
                
                {{-- PIC Addded --}}
                <div class="mb-4">
                    <label for="mtcPicadded" class="block text-sm font-semibold">PIC</label>
                    <select id="mtcPicadded" name="mtcPicadded" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($userData as $user)
                            <option value="{{ $user['name'] }}">{{ $user['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                
                {{-- Notes --}}
                <div class="mb-4">  
                    <label for="mtcNotes" class="block text-sm font-semibold">Notes</label>
                    <input type="text" id="mtcNotes" name="mtcNotes" class="w-full p-2 border rounded" required>
                </div>
    
                {{-- Date  --}}
                <div class="mb-4">
                    <label for="mtcDateadded" class="block text-sm font-semibold">Date</label>
                    <input type="date" id="mtcDateadded" name="mtcDateadded" class="w-full p-2 border rounded" required>
                </div>    
    
                <!-- Buttons -->
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    {{-- modal for image data --}}
    <div id="imgModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-md w-96">
            <h2 class="text-xl font-bold mb-4">Update picture</h2>
    
            <form id="imgForm" method="POST" enctype="multipart/form-data" action="{{ route('detailAsset.image.update', ['idassetpic' => $img['idassetpic'], 'assetcode' => $img['assetcode']]) }}">
                @method('PUT')
                @csrf
                {{-- assetcode --}}
                <div class="mb-4">
                    <label for="idassetpic" class="block text-sm font-semibold">ID Picture</label>
                    <input id="idassetpic" name="idassetpic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly value="{{ $img['idassetpic'] }} ></input>
                </div>
                <div class="mb-4">
                    <label for="imgAssetCode" class="block text-sm font-semibold">Asset Code</label>
                    <input id="imgAssetCode" name="assetcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly value="{{ $assetcode }}"></input>
                </div>
                <div class="mb-4">
                    <label for="assetpic" class="block text-sm font-semibold">Asset Image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="assetimage" id="assetpic" name="assetpic" type="file">
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
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    function unassignAsset(url) {
        fetch(url, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                alert('Asset unassigned successfully!');
            } else {
                alert('Asset unassigned successfully!');
                location.reload(); // Optional: reload page or redirect if needed
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function openSoftwareModal(software) {

        //Passing data to the modal
        document.getElementById('idassetsoftware').value = software.idassetsoftware;
        document.getElementById('assetcode').value = software.assetcode;
        document.getElementById('softwaretype').value = software.softwaretype;
        document.getElementById('softwarecategory').value = software.softwarecategory;
        document.getElementById('softwarename').value = software.softwarename;
        document.getElementById('softwarelicense').value = software.softwarelicense;
        document.getElementById('active').value = software.active;
        document.getElementById('picadded').value = software.picadded;

        // Set the form action dynamically
        const assetcode = "{{ $assetcode }}"; // Get the assetcode from Blade
        const idassetsoftware = software.idassetsoftware; // Get the idassetsoftware from the software object
        document.getElementById('updateFormSoftware').action = `{{ route('detailAsset.software.update', ['assetcode' => ':assetcode', 'idassetsoftware' => ':idassetsoftware']) }}`.replace(':assetcode', assetcode).replace(':idassetsoftware', idassetsoftware);

        // Opening the modal    
        document.getElementById('softwareModal').classList.remove('hidden');

        console.log(document.getElementById('updateFormSoftware').action); // Log the action URL

        // Add event listener for form submission
    const form = document.getElementById('updateFormSoftware');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(form); // Get the form data
        const jsonData = Object.fromEntries(formData.entries()); // Convert FormData to a plain object

        fetch(form.action, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json', // Set content type to JSON
            },
            body: JSON.stringify(jsonData) // Send the data as JSON
        })
        .then(response => {
            if (response.ok) {
                alert('Failed to update software.');
                location.reload();
            } else {
                return response.text().then(text => {
                    console.error('Response:', text); // Log the response body for debugging
                    alert('Software updated successfully!');
                    location.reload();
                });
            }
        })
        .catch(error => console.error('Error:', error));
    });
  }

  // Function to close modal
  function closeModal() {   
      document.getElementById('softwareModal').classList.add('hidden');
      document.getElementById('mtcModal').classList.add('hidden');
      document.getElementById('imgModal').classList.add('hidden');
    //   document.getElementById('deleteModal').classList.add('hidden');
  }

  function openImgModal(imgData) {        
        // Set the value of the imgAssetCode if needed
        
        document.getElementById('idassetpic').value = imgData.idassetpic;
        document.getElementById('imgAssetCode').value = imgData.assetcode; 
        document.getElementById('active').value = imgData.active;
        document.getElementById('picadded').value = imgData.picadded;
        
        document.getElementById('imgModal').classList.remove('hidden');
    }

</script>


@endsection     