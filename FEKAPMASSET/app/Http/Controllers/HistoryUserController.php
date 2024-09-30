<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoryUserController extends Controller
{
    public function fetchHistoryUserData()
    {
        
        $response = Http::get('');  

        // Check if the request was successful
        if ($response->successful()) {
            $historyUserData = $response->json();  // Get the JSON response
            return view('history', compact('historyUserDatas'));  // Pass data to Blade view
        }

        return back()->withErrors('Failed to fetch maintenance data.');
    }
}
