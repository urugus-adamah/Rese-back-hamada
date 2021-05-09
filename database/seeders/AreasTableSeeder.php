<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::factory()->count(4)->create();
        // $param = [
        //     'name' => '東京都',
        // ];
        // Area::insert($param);
        // $param = [
        //     'name' => '大阪府',
        // ];
        // Area::insert($param);
        // $param = [
        //     'name' => '福岡県',
        // ];
        // Area::insert($param);
    }
}
