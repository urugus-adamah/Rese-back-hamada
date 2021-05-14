<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

ini_set("memory_limit","1000M");
set_time_limit(300);

class Shop extends Model
{
    use HasFactory;

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'shop_id', 'user_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public static function getShops()
    {
        $items = Shop::with(['area', 'genre','favorites'])->get();
        if (count($items) > 0) {
                return response()->json([
                    'message' => 'Shops goted successfully',
                    'data' => $items,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
        }
        
        public static function getShop($id)
        {
            $item = Shop::with(['area', 'genre','favorites'])->find($id);
            if (isset($item)) {
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
}
