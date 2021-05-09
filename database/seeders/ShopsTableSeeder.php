<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Shop::factory()->count(10000)->create();
        // $shop = Shop::factory()->count(10000)->for($genre)->create();
        // $param = [
        //     'name' => '牛助',
        //     'area_id' => Area::where('name', '大阪府')->value('id'),
        //     'genre_id' => Genre::where('name', '焼肉')->value('id'),
        //     'description' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
        //     'img_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
        // ];
        // Shop::insert($param);

        // $param = [
        //     'name' => '仙人',
        //     'area_id' => Area::where('name', '東京都')->value('id'),
        //     'genre_id' => Genre::where('name','寿司')->value('id'),
        //     'description' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
        //     'img_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        // ];
        // Shop::insert($param);

        // $param = [
        //     'name' => '戦慄',
        //     'area_id' => Area::where('name', '福岡県')->value('id'),
        //     'genre_id' => Genre::where('name', '居酒屋')->value('id'),
        //     'description' => '気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
        //     'img_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
        // ];
        // Shop::insert($param);

        // $param = [
        //     'name' => 'ルーク',
        //     'area_id' => Area::where('name', '東京都')->value('id'),
        //     'genre_id' => Genre::where('name', 'イタリアン')->value('id'),
        //     'description' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
        //     'img_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
        // ];
        // Shop::insert($param);

        // $param = [
        //     'name' => '晴海',
        //     'area_id' => Area::where('name', '大阪府')->value('id'),
        //     'genre_id' => Genre::where('name', '焼肉')->value('id'),
        //     'description' => '毎年チャンピオン牛を買い付け、仙台市長から表彰されるほどの上質な仕入れをする精肉店オーナーの本当に美味しい国産牛を食べてもらいたいという思いから誕生したお店です。',
        //     'img_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
        // ];
        // Shop::insert($param);
    }
}
