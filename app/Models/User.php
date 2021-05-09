<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUser($id)
    {
        $item = User::find($id);

        if (isset($item)) {
            return response()->json([
                'message' => 'User got successfully',
                'data' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => 'No user was found',
                'data' => $item,
            ], 404);
        }
    }
    public function registUser($password, $name, $email)
    {
        $hashed_password=Hash::make($password);
        $item = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password,
        ]);
        return response()->json([
            'message' =>'User created successfully',
            'data' => $item
        ],201);
    }
    public function login($email, $password)
    {
        $item = User::where('email', $email)->first();
        $is_checked = Hash::check($password, $item->password);
        if ($is_checked) {
            return response()->json([
                'auth' => true
            ], 200);
        } else {
            return response()->json([
                'auth' => false
            ], 401);
        }
    }
    public function logout()
    {
        return response()->json(['auth' => false], 200);
    }
}
