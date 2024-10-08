@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
    <!-- Title -->
    <div class="border-b-2 pb-4 mb-4">
        <h1 class="text-2xl font-bold text-gray-700">DETAIL ASSET</h1>
    </div>

    <!-- Asset Information -->
    <div class="grid grid-cols-2 gap-4">
        <!-- Left Column -->
        <div>
            <div class="flex justify-between py-2">
                <span>Asset Type</span><span>: IT Asset</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Device Type</span><span>: Laptop</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Laptop</span><span>: Lenovo Ideapad Slim5i</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Processor</span><span>: Intel Ultra 7 155H</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Memory</span><span>: Sk Hynix 16GB LPDDR5 PC40000</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Storage</span><span>: Sk Hynix 512GB NVME GEN3×4</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Graphic card 1</span><span>: Integrated Intel Arc Graphics</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Graphic card 2</span><span>: No</span>
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <div class="flex justify-between py-2">
                <span>Screen Resolution</span><span>: 1920×1200</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Touchscreen</span><span>: None</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Backlight keyboard</span><span>: Yes</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Convertible</span><span>: None</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Webcam</span><span>: Yes</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Speaker</span><span>: Yes</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Microphone</span><span>: Yes</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Wifi</span><span>: Yes</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Bluetooth</span><span>: Yes</span>
            </div>
        </div>
    </div>

    <!-- QR and Update buttons -->
    <div class="mt-6 flex justify-end space-x-4">
        <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded">Print QR</button>
        <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded">Update Asset</button>
    </div>
</div>

{{-- <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
    <!-- Title -->
    <div class="border-b-2 pb-4 mb-4">
        <h1 class="text-2xl font-bold text-gray-700">DETAIL ASSET</h1>
    </div>

    <!-- Asset Information -->
    <div class="grid grid-cols-2 gap-4">
        <!-- Left Column -->
        <div>
            <div class="flex justify-between py-2">
                <span>Asset Type</span><span>: {{ $assetspec->asset_type }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Device Type</span><span>: {{ $assetspec->device_type }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Laptop</span><span>: {{ $assetspec->laptop }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Processor</span><span>: {{ $assetspec->processor }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Memory</span><span>: {{ $assetspec->memory }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Storage</span><span>: {{ $assetspec->storage }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Graphic card 1</span><span>: {{ $assetspec->graphic_card1 }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Graphic card 2</span><span>: {{ $assetspec->graphic_card2 ?? 'No' }}</span>
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <div class="flex justify-between py-2">
                <span>Screen Resolution</span><span>: {{ $assetspec->screen_resolution }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Touchscreen</span><span>: {{ $assetspec->touchscreen ?? 'None' }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Backlight keyboard</span><span>: {{ $assetspec->backlight_keyboard ?? 'No' }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Convertible</span><span>: {{ $assetspec->convertible ?? 'None' }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Webcam</span><span>: {{ $assetspec->webcam ?? 'Yes' }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Speaker</span><span>: {{ $assetspec->speaker ?? 'Yes' }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Microphone</span><span>: {{ $assetspec->microphone ?? 'Yes' }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Wifi</span><span>: {{ $assetspec->wifi ?? 'Yes' }}</span>
            </div>
            <div class="flex justify-between py-2">
                <span>Bluetooth</span><span>: {{ $assetspec->bluetooth ?? 'Yes' }}</span>
            </div>
        </div>
    </div>

    <!-- QR and Update buttons -->
    <div class="mt-6 flex justify-end space-x-4">
        <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded">Print QR</button>
        <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded">Update Asset</button>
    </div>
</div> --}}
    
@endsection