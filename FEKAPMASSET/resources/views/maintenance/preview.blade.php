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

<div id="BAP" class="inset-0 bg-white flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-md w-full"> <!-- Changed w-96 to w-full -->
        <div class="table-container mx-auto w-full"> <!-- Ensure this is w-full -->
            <table class="p-4 items-center w-full mb-8 align-top border border-gray-200 text-slate-500">
                <tbody>
                    <tr>
                        <td rowspan="4" class="text-center p-2 align-middle border-b border-r max-h-1">
                            <img src="{{ asset('assets/logo/KAPM-logo.png') }}" alt="" class="w-32 h-auto mx-auto">
                        </td>
                        <td rowspan="2" class="text-center p-2 align-middle border-b border-r">
                            <h2> PT. KA Properti Manajemen</h2>
                            <h3> Teknologi Informasi </h3>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r">
                            <h3 class=""> Nomor </h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r">Tanggal Terbit</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="text-center p-2 align-middle border-b border-r">Berita Acara Pemeriksaan</td>
                        <td class="text-center p-2 align-middle border-b border-r">Status Revisi </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r">Halaman</td>
                    </tr>
                </tbody>
            </table>

            <table class="p-4 items-center w-full mb-8 align-top border border-gray-200 text-slate-500">
                <tbody>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>No ref </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: BAP.SR.YYMMXXXX</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Tanggal </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: 2024-12-31</h1>
                        </td>
                    </tr>
                </tbody>
            </table>

            
            <table class="p-4 items-center w-full mb-8 align-top border border-gray-200 text-slate-500">
                <tbody>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>No ref </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: BAP.SR.YYMMXXXX</h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> Tanggal Perbaikan</h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> Jenis Perangkat</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Serial Number </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: ITL2312341</h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Jenis Perangkat </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: Laptop </h1>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="p-4 items-center w-full mb-8 align-top border border-gray-200 text-slate-500">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-start p-2 align-middle border-b border-r max-h-1">
                            <h1>Tindakan Perbaikan</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-start p-2 align-middle border-b border-r max-h-1">
                            <h1>Suku cadang yang digunakan</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-start p-2 align-middle border-b border-r max-h-1">
                            <h1>Hasil Perbaikan</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Pelaksana Perbaikan</h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Mengetahui</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> </h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> Nama Lengkap Pelaksana</h1>
                            <h1> NIPPM </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> Nama Lengkap Subdep TI </h1>
                            <h1> NIPPM </h1>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
</div>
@endsection