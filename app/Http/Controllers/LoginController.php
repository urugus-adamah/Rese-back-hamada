<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function post(Request $request)
    {
        $user = new User();
        return $user->login($request->email, $request->password);
    }
}
