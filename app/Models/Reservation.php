<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['num_of_users','date_time','user_id','shop_id'];

    public function get($user_id)
    {
        $items = Reservation::where('user_id', $user_id)->get();
        if (count($items) > 0) {
            return response()->json([
                'message' => 'Reservations got successfully',
                'data' => $items,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }

    public function post($num_of_users, $date_time, $user_id, $shop_id)
    {
        $item = Reservation::create([
            'num_of_users' => $num_of_users,
            'date_time' => $date_time,
            'user_id' => $user_id,
            'shop_id' => $shop_id,
        ]);
        return response()->json([
            'message' => 'Reservation created successfully',
            'data' => $item,
        ], 200);
    }

    public function deleteReservations($shop_id, $reservation_id)
    {
        $items = Reservation::where('shop_id', $shop_id)
            ->where('id', $reservation_id)
            ->first();

        if (isset($items)) {
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
