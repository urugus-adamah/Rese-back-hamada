<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\User;

class UsersController extends Controller
{
    private $user;
    private $favorite;
    private $reservation;
    public function __construct()
    {
        $this->user = new User();
        $this->favorite = new Favorite();
        $this->reservation = new Reservation();
    }
    public function getUser(Request $request)
    {
        return $this->user->getUser($request->id); 
    }
    public function getFavorites($user_id)
    {
        return $this->favorite->get($user_id);
    }
    public function getReservations($user_id)
    {
        return $this->reservation->get($user_id);
    }

}
