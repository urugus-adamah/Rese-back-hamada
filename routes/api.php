<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShopsController;
use Psy\Command\ShowCommand;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/v1/register',[RegisterController::class,'post']);
Route::post('/v1/login', [LoginController::class, 'post']);
Route::post('/v1/logout',[LogoutController::class,'post']);
Route::get('/v1/users/{id}',[UsersController::class,'getUser']);
Route::get('/v1/users/{user_id}/favorites',[UsersController::class,'getFavorites']);
Route::get('/v1/users/{user_id}/reservations',[UsersController::class,'getReservations']);
Route::get('/v1/shops',[ShopsController::class,'getShops']);
Route::get('/v1/shops/{id}',[ShopsController::class,'getShop']);
Route::put('/v1/shops/{shop_id}/favorites',[ShopsController::class, 'putFavorites']);
Route::delete('/v1/shops/{shop_id}/favorites',[ShopsController::class, 'deleteFavorites']);
Route::post('/v1/shops/{shop_id}/reservations',[ShopsController::class,'postReservations']);
Route::delete('/v1/shops/{shop_id}/reservations/{reservation_id}',[ShopsController::class,'deleteRservatons']);