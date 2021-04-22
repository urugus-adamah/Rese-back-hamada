<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function post(Request $request)
    {
        $item = User::where('email',$request->email)->first();
        $is_checked = Hash::check($request->password, $item->password);
        if($is_checked){
            return response()->json([
                'auth' => true
            ],200);
        } else{
            return response()->json([
                'auth' => false
            ],401);
        }
    }
}
