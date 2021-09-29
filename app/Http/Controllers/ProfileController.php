<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {

        $request->validate([
            'company' => ['required'],
            'phone' => ['required'],
        ]);


        Profile::create([
            'company' => $request->company,
            'phone' => $request->phone,
            'user_id' => auth()->id()   
        ]);
    }
}
