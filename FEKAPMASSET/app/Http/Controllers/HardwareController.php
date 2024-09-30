<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HardwareController extends Controller
{
    public function fetchHardwareData()
    {
        $response = Http::get('');
        
        // Check if the request was successful
        if ($response->successful()) {
            $hardwareData = $response->json();  // Get the JSON response
            return view('hardware', compact('hardwareData'));  // Pass data to Blade view
        }

        return back()->withErrors('Failed to fetch maintenance data.');
    }
}
