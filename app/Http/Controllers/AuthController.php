<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request -> validate([
            'name' => 'required|string',
            'email' => 'required|string|uique:user,email',
            'password' => 'required|string|confirmed',
            'role' => 'required|integer',
        ]);

        $user = User::created([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role' => $fields['role'],
        ]);

        // $token = $user->createToken($request->userAgent(), [$fields['role']])->plainTextToken;
        $token = $user->createToken($request->userAgent(),[$fields['role']])->plainTextToken;

        $reponse = [
            'user' => $user,
            'token' => $token
        ];

        return response($reponse,201);
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'requred|string',
            'password' => 'requred|string',
        ]);

    $user = User::where('email',$fields['email'])->first();

    if(!$user || !Hash::check($fields['password'], $user->password)) {
        return response([
            'massage' => 'Invalid Login',
        ], 401);
    } else {
        $user->tokens()->delete();
        $token = $user->createToken($request->userAgent(),["$user->role"])->plainTextToken;

        $reponse = [
            'user' => $user,
            'token' => $token,
        ];
        return response($reponse, 200);
    }

    }

    public function logotu(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response([

            'message' => 'Logged Out',

        ],200);
    }
}
