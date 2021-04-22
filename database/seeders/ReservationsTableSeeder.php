<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'num_of_users' => 2,
            'date_time' => '2021-4-30 18:00:00',
            'user_id' => 1,
            'shop_id' => 1,
        ];
        Reservation::insert($param);

        $param = [
            'num_of_users' => 3,
            'date_time' => '2021-5-1 18:00:00',
            'user_id' => 1,
            'shop_id' => 2,
        ];
        Reservation::insert($param);

        $param = [
            'num_of_users' => 100,
            'date_time' => '2021-5-2 18:00:00',
            'user_id' => 1,
            'shop_id' => 1,
        ];
        Reservation::insert($param);

        $param = [
            'num_of_users' => 2,
            'date_time' => '2021-4-22 18:00:00',
            'user_id' => 2,
            'shop_id' => 1,
        ];
        Reservation::insert($param);
    }
}
