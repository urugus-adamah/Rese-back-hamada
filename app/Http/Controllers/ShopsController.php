<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Shop;

class ShopsController extends Controller
{
    // private $shop;
    // private $favorite;
    // private $reservation;
    // public function __construct()
    // {
    //     $this->shop = new Shop();
    //     $this->favorite = new Favorite();
    //     $this->reservation = new Reservation();
    // }
//コントローラーにstatic追加

    public function getShops()
    {
        return Shop::getShops();
    }
    public function getShop($id)
    {
        return Shop::getShop($id);
    }
    public function putFavorites(Request $request, $shop_id)
    {
        return Favorite::put($request->user_id, $shop_id);
    }
    public function deleteFavorites(Request $request, $shop_id)
    {
        return Favorite::deleteFavorites($request->user_id, $shop_id);
    }
    public function postReservations(Request $request, $shop_id)
    {
        return Reservation::post(
            $request->num_of_users, 
            $request->date_time, 
            $request->user_id, 
            $shop_id
        );
    }
    public function deleteReservations($shop_id, $reservation_id)
    {
        return Reservation::deleteReservations($shop_id, $reservation_id);
    }
}
