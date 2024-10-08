<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Optionally, log the user in automatically after registration
        Auth::login($user);

        // Return response or redirect
        return response()->json(['message' => 'User registered successfully!', 'user' => $user], 201);
        
    }

    // Login existing user
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        return response()->json([
            'message' => 'Login success',
            'user' => Auth::login($credentials),
            ]);

        // if (Auth::attempt($credentials)) {
        //     $user = Auth::user();

        //     // Generate an API token (for API authentication)
        //     $token = $user->createToken('auth_token')->plainTextToken;

        //     return response()->json([
        //         'message' => 'Login successful',
        //         'access_token' => $token,
        //         'token_type' => 'Bearer',
        //     ]);
        // }

        // throw ValidationException::withMessages([
        //     'email' => ['The provided credentials are incorrect.'],
        // ]);
    }
}
