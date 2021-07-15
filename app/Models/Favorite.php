<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shop_id'
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public static function get($user_id)
    {
        // $items = Favorite::where('user_id', $user_id)->get();
        $items = Favorite::with(['shop', 'user', 'shop.area', 'shop.genre'])->where('user_id', $user_id)->get();
        if (count($items) > 0) {
            return response()->json([
                'message' => 'Favorites got successfully',
                'data' => $items,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }
    public static function put($user_id, $shop_id)
    {
        $item = Favorite::where('shop_id', $shop_id)
            ->where('user_id', $user_id)
            ->first();

        if (is_null($item)) {
            $item = Favorite::create([
                'user_id' => $user_id,
                'shop_id' => $shop_id
            ]);
            return response()->json([
                'message' => 'Favorite added successfully',
                'data' => $item,
            ], 201);
        } else {
            return response()->json([
                'message' => 'Favorites have already been added',
            ], 404);
        }
    }
    public static function deleteFavorites($user_id, $shop_id)
    {
        $items = Favorite::where('shop_id', $shop_id)
            ->where('user_id', $user_id)->delete();

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
}
