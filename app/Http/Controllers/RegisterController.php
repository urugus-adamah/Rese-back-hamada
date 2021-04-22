<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $hashed_password=Hash::make($request->password);
        $param=[
            "name" => $request->name,
            "email" => $request->email,
            "password" => $hashed_password,
        ];
        User::insert($param);
        return response()->json([
            'message' =>'User created successfully',
            'data' => $param
        ],200);
    }
}
