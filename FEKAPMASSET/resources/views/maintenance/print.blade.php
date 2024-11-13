@extends('layouts.app')
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

        <h1>Test Print</h1>
    <p>This is a test</p>
    <br/>
    <br/>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>position</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>

            @foreach($userData as $user)
            <tr>
                <td>{{ $user['nipp'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['position'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
