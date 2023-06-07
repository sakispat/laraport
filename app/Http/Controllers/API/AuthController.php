<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResources;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User registred successfully',
            'user' => $user,
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($data)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Login Failed'
                ], 400);
            }
        }catch(JWTException $err) {
            return response()->json([
                'status' => 'error',
                'message' => 'Could not create token'
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Logged in successfully',
            compact('token')
        ], 200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ], 200);
    }
}
