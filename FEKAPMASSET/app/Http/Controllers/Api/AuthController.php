<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    // Show dashboard only for authenticated users
    public function showDashboard()
    {
        // Check if the user is authenticated (session contains user data)
        if (session()->has('userdata')) {
            return view('dashboard'); // Return the Blade view for dashboard
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Please log in first.']);
        }
    }

        // This method authenticates the user by sending a request to the API
        public function loginCheck(Request $request){
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
                    // Store user data and token in session
                    session([
                        'userdata' => $data,
                        'token' => $data['token']
                    ]);

                    // Redirect to the dashboard after successful login
                    return redirect()->route('dashboard')->with('success', 'Login successful!');
                }

                // If login fails, return to login with error
                return redirect()->route('login')->with('login_error', 'Login failed, invalid credentials.');

            } catch (\Exception $e) {
                // Handle any exceptions that may occur
                return redirect()->route('login')->with('login_error', 'An error occurred during login.');
            }
    }


    // Show login form
    public function loginForm()
    {
        return view('auth.login'); // Return the Blade view for the login form
    }
}
