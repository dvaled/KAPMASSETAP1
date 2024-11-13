<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PDFController extends Controller
{
    public function index() {
        $client = new Client();
        $userResponse = $client->request('GET', 'http://localhost:5252/api/user');
        $userBody = $userResponse->getBody();
        $userContent = $userBody->getContents();
        $userData = json_decode($userContent, true);
        
        $data = [
            'userData' => $userData, // This key should match what you use in your view
        ];
        
        
        Log::info($userData); // Log the data to check what is being passed
        $pdf = Pdf::loadView('pdf.usersPdf', $data);
        return $pdf->download('users-lists.pdf');
    }
}   
