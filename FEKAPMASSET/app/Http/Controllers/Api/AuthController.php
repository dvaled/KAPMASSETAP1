<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

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

    public function loginCheck(Request $request){
        // Validate input
        $request->validate([
            'nipp' => 'required|string',
            'password' => 'required|string',
        ]);

        // Log the input data to see if it's being passed correctly
        Log::info('Login Attempt Data: ', $request->all());

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post('http://localhost:5252/api/Auth/Login', [
                'json' => [
                    'nipp' => $request->input('nipp'),
                    'password' => $request->input('password'),
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['token'])) {
                session([
                    'userdata' => $data,
                    'token' => $data['token']
                ]);
                return redirect()->route('dashboard');
            }

            return redirect()->route('login')->with('login_error', 'Login failed. Please check your credentials.');

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            Log::error('API Error: ' . $responseBody);
            return redirect()->route('login')->with('login_error', 'Login failed.');
        } catch (\Exception $e) {
            Log::error('Login failed: ' . $e->getMessage());
            return redirect()->route('login')->with('login_error', 'An error occurred while processing your request.');
        }
    }


    


    // Show login form
    public function loginForm()
    {
        return view('auth.login'); // Return the Blade view for the login form
    }
}
