<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Reservation;

class ShopsController extends Controller
{
    public function getShops(Request $request)
    {
        $items = Shop::all();
        if (count($items) > 0 ) {
            return response()->json([
                'message'=>'Shops goted successfully',
                'data'=>$items,
            ],200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    public function getShop($id)
    {
        $item = Shop::where('id',$id)->first();
        if ($item) {
            return response()->json([
                'message' => 'Shop goted successfully',
                'data' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    public function putFavorites(Request $request, $shop_id)
    {
        $items = Favorite::where('shop_id',$shop_id)
            ->where('user_id',$request->user_id)
            ->first(); 

        if ($items<>null) {
            return response()->json([
                'message' => 'Favorites have already been added',
            ], 404); 
        } else {
            $item = new Favorite();
            $item->user_id = $request->user_id;
            $item->shop_id = $shop_id;
            $item->save();
            return response()->json([
                'message' => 'Favorite added successfully',
                'data' => $item,
            ], 200);
        }
    }

    public function deleteFavorites(Request $request, $shop_id)
    {
        $items = Favorite::where('shop_id', $shop_id)
            ->where('user_id', $request->user_id)->delete();
            
        if ($items) {
            return response()->json([
                'message' => 'Favorite deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }   
    }

    public function postReservations(Request $request, $shop_id)
    {
        $item = new Reservation();
        $item->num_of_users = $request->num_of_users;
        $item->date_time = $request->date_time;
        $item->user_id = $request->user_id;
        $item->shop_id = $shop_id;
        $item->save();
        return response()->json([
            'message'=>'Reservation created successfully',
            'data'=> $item,
        ],200);
    }

    public function deleteRservatons($shop_id, $reservation_id)
    {
        $items = Reservation::where('shop_id', $shop_id)
            ->where('id', $reservation_id)
            ->first();
            
        if ($items<>null) {
            Reservation::destroy($reservation_id);
            return response()->json([
                'message' => 'Rservations deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Rservations was not found',
            ], 404);
        }
    }
}
