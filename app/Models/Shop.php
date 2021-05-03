<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getShops()
    {
        $items = Shop::with(['area', 'genre'])->get();
        if (count($items) > 0) {
            foreach ($items as $item) {
                foreach ($item->favorites as $favorite) {
                }
            }
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

    public function getShop($id)
    {
        $item = Shop::with(['area', 'genre'])->find($id);
        if (isset($item)) {
            foreach ($item->favorites as $favorite) {
            }
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
