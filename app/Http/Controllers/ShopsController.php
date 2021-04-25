<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Reservation;

class ShopsController extends Controller
{
    public function getShops()
    {
        $items = Shop::all();
        if (count($items) > 0 ) {
            foreach ($items as $item) {
                $item->area->name;
                $item->genre;
                $item->favorites;
            }
            return response()->json([
                'message'=>'Shops goted successfully',
                'data'=>$items,
            ],200);
            //エリアとジャンルの情報といいねの情報を取得（リレーションつかう）
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    public function getShop($id)
    {
        //エリアとジャンルの情報といいねの情報を取得（リレーションつかう）
        $item = Shop::find($id);
        if ($item) {
            $item->area->name;
            $item->genre->name;
            $item->favorites;
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
        $item = Favorite::where('shop_id',$shop_id)
            ->where('user_id',$request->user_id)
            ->first(); 

        if (is_null($item)) {
            $item = Favorite::create(['user_id' => $request->user_id, 'shop_id' => $request->shop_id]);
            return response()->json([
                'message' => 'Favorite added successfully',
                'data' => $item,
            ], 200);
            
        } else {
            return response()->json([
                'message' => 'Favorites have already been added',
            ], 404); 
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
        $item = Reservation::create([
            'num_of_users'=>$request->num_of_users,
            'date_time'=> $request->date_time,
            'user_id' => $request->user_id,
            'shop_id' => $shop_id,
        ]);
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
            
        if (is_null($items)) {
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
