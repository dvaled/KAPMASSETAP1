<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    // Show login form
    public function loginForm()
    {
        return view('auth.login'); // Return the Blade view for the login form
    }

    public function login(Request $request){
         // Validate the input
         $request->validate([
            'nipp' => 'required|string',
            'password' => 'required|string',
        ]);

        $client = new Client();

        try {
            // Send POST request to your API
            $response = $client->post('http://localhost:5252/api/Auth/Login', [
                'json' => [
                    'nipp' => $request->input('nipp'),
                    'password' => $request->input('password'),
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['token'])) {
                // Store token or handle successful login
                // Redirect to a dashboard or wherever needed
                return redirect()->route('dashboard')->with('success', 'Login successful!');
            }

            return back()->withErrors(['login_error' => 'Invalid credentials.']);

        } catch (\Exception $e) {
            return back()->withErrors(['login_error' => 'An error occurred while trying to login.']);
        }
    }
}
