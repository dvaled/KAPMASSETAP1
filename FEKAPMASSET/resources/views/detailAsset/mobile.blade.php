@extends('layouts.app')

@section('content')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="flex-row justify-evenly">
        <div class="flex flex-wrap justify-evenly gap-4 p-6 bg-white">
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> Detail Asset </h5>
            </div>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="flex flex-wrap justify-evenly gap-4 p-4 bg-white">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                    {{-- Insert Image here  --}}
                    {{-- <a href="#">
                        <img class="rounded-t-lg w-full" src="D:/laragon/www/KAPMASSETAP1/FEKAPMASSET/public/assets/KAI.png" alt="" />
                    </a> --}}
                    <!-- Read more button -->
                    <div class="w-full p-4 flex justify-end space-x-4">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 mt-4">
                            Print QR
                        </a>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 mt-4">
                            Update Asset    
                        </a>
                    </div>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">PT. KAI Properti</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">KAI Properti</p>
                        <!-- Dynamic Table-like Section with Headers as Rows -->
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <tbody>
                                        <!-- Table Head in the First Column -->
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset Type:</th>
                                        <td class="px-6 py-4">IT Asset</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Device Type:</th>
                                          <td class="px-6 py-4">Laptop</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Processor Brand:</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Processor Model:</th>
                                                <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Processor Series:</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Memory Type</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Memory Brand</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Memory Model</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Memory Series</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Memory Capacity</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Storage Type</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Storage Brand</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Storage Model</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Storage Capacity</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">External Memory Compatibility</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Graphics Type</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Graphics Brand</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Graphics Model</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Graphics Series</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Graphics Capacity</th>
                                            <td class="px-6 py-4">Intel Ultra 7 155H</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Screen Type</th>
                                            <td class="px-6 py-4">OLED</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Screen Resolution</th>                                                <td class="px-6 py-4">1920 x 1080</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Camera Resolution</th>
                                            <td class="px-6 py-4">48MP</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Charging Port</th>
                                            <td class="px-6 py-4">Type-C</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">SIM Card Available</th>
                                            <td class="px-6 py-4">Yes</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">SIM Card Slot</th>
                                            <td class="px-6 py-4">Single</td>
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
</div>


@endsection