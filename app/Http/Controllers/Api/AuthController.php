<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        // This method is responsible for authenticating a user and providing an access token upon successful login.

        // Attempt to authenticate the user with the provided email and password
        if (!Auth::attempt($request->only('email', 'password'))) {
            // If authentication fails, return an unauthorized (401) response
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        // Find the user by their email address
        $user = User::where('email', $request['email'])->firstOrFail();

        // Create a new access token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return a JSON response with the access token and token type
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


}
