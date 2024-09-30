<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class UserController extends Controller{
    public function FetchUser(){
        // Fetch data from .NET API
        $response = Http::get("");

        // Check if the request was successful
        if ($response->successful()) {
            $users = $response->json(); // Get the JSON response
            return view('users', compact('users')); // Pass data to Blade view
        }

        return back()->withErrors('Unable to fetch data.');
    }
}
