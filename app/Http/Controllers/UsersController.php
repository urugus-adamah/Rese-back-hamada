<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\User;

class UsersController extends Controller
{
    public function get()
    {
        return User::get(); 
    }
    public function getUser(Request $request)
    {
        return User::getUser($request->id); 
    }
    public function getFavorites($user_id)
    {
        return Favorite::get($user_id);
    }
    public function getReservations($user_id)
    {
        return Reservation::get($user_id);
    }
    
    public function putUser(Request $request, $user_id)
    {
        return User::put($request->name,$request->email,$request->password,$user_id);
    }
}
