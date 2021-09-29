<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Auth\Events\PasswordReset;

use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        /* if (Auth::attempt($request->only('email', 'password'))){
            return response()->json(Auth::user(), 200);
        }
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.']
        ]); */

        // Check email
        $user = User::where('email',$fields['email'])->first();

        // Check Password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);    

    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
        // Auth::logout();
    }
}
