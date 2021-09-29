<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' =>['required', 'min:6', 'confirmed']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

         
        $token = $user->createToken('myapptoken')->plainTextToken;
        $user->notify(new WelcomeEmailNotification($token));
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}