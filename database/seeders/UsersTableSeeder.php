<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'name' => 'tanaka',
            'email' => 'tanaka@hogehoge',
            'password' => 'hogehoge'
        ];
        User::insert($param);

        $param=[
            'name'=>'saitou',
            'email'=>'saitou@hogehoge',
            'password'=>'hogehoge'
        ];
        User::insert($param);

        $param=[
            'name'=>'yoshida',
            'email'=>'yoshida@hogehoge',
            'password'=>'hogehoge'
        ];
        User::insert($param);
    }
}
