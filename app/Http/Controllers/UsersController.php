<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favorite;

class UsersController extends Controller
{
    public function getUser(Request $request){
        $items = User::where('id', $request->id)->first();

        if ($items<>null) {
            return response()->json([
                'messate' => 'User got successfully',
                'data' => $items,
            ], 200);
        } else {
            return response()->json([
                'messate' => 'No user was found',
                'data' => $items,
            ], 404);
        }
    }

    public function getFavorites($user_id)
    {
        $items = Favorite::where('user_id', $user_id)->get();
        if (count($items)>0) {
            return response()->json([
                'message' => 'Favorites got successfully',
                'data' => $items,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not fount'
            ],404);
        }
    }

    public function getReservations($user_id)
    {
        $items = Favorite::where('user_id', $user_id)->get();
        if (count($items) > 0) {
            return response()->json([
                'message' => 'Reservations got successfully',
                'data' => $items,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not fount'
            ], 404);
        }
    }
}
