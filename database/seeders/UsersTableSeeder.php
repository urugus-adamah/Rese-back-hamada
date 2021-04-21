<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert($param);

        $param=[
            'name'=>'saitou',
            'email'=>'saitou@hogehoge',
            'password'=>'hogehoge'
        ];
        DB::table('users')->insert($param);

        $param=[
            'name'=>'yoshida',
            'email'=>'yoshida@hogehoge',
            'password'=>'hogehoge'
        ];
        DB::table('users')->insert($param);
    }
}
