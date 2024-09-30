<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SoftwareController extends Controller
{
    public function fetchSoftwareData()
    {
        
        $response = Http::get("");
        
        // Check if the request was successful
        if ($response->successful()) {
            $softwareData = $response->json();  // Get the JSON response
            return view('software', compact('softwareData'));  // Pass data to Blade view
        }

        return back()->withErrors('Failed to fetch maintenance data.');
    }
}
