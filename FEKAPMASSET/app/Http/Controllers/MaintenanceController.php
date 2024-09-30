<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MaintenanceController extends Controller
{
    public function fetchMaintenanceData()
    {
        
        $response = Http::get("");
        
        // Check if the request was successful
        if ($response->successful()) {
            $maintenanceData = $response->json();  // Get the JSON response
            return view('maintenance', compact('maintenanceData'));  // Pass data to Blade view
        }

        return back()->withErrors('Failed to fetch maintenance data.');
    }
}
