<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            'name' => '寿司'
        ]);

        Genre::insert([
            'name' => '焼肉'
        ]);

        Genre::insert([
            'name' => '居酒屋'
        ]);

        Genre::insert([
            'name' => 'イタリアン'
        ]);
        Genre::insert([
            'name' => 'ラーメン'
        ]);
    }
}
