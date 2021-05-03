<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $user = new User();
        return $user->registUser($request->password, $request->name, $request->email);
    }
}
