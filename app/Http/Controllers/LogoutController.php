<?php

namespace App\Http\Controllers;

use App\Models\User;

class LogoutController extends Controller
{
    public function post()
    {
        $user = new User();
        return $user->logout();
    }
}
