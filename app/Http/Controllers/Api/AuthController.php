<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $token = Auth::user()->createToken('mobile')->plainTextToken;
            $data = [
                'user' => auth()->user(),
                'token' => $token

            ];
            return response()->json(['data' => $data], 200);
        }

        // Authentication failed
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
