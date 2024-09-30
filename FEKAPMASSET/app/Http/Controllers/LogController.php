<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LogController extends Controller
{
    public function fetchLogData()
    {
        
        $response = Http::get("");
        
        // Check if the request was successful
        if ($response->successful()) {
            $logData = $response->json();  // Get the JSON response
            return view('log', compact('logData'));  // Pass data to Blade view
        }

        return back()->withErrors('Failed to fetch maintenance data.');
    }
}
