<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $hashed_password=Hash::make($request->password);
        $item = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashed_password,
        ]);
        return response()->json([
            'message' =>'User created successfully',
            'data' => $item
        ],201);
    }
}
