<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert($this->getData());
    }

    public function getData()
    {
        $data = [
            '1' => [
                'id' => 1,
                'link'=> 'https://lenta.ru/rss/news',
              ],
            '2' => [
                'id' => 2,
                'link'=> 'https://news.yandex.ru/index.rss',
            ],
            '3' => [
                'id' => 3,
                'link'=> 'https://news.yandex.ru/martial_arts.rss',
            ],
            '4' => [
                'id' => 4,
                'link'=> 'https://news.yandex.ru/communal.rss',
            ],
            '5' => [
                'id' => 5,
                'link'=> 'https://news.yandex.ru/health.rss',
            ],
            '6' => [
                'id' => 6,
                'link'=> 'https://news.yandex.ru/games.rss',
            ],
            '7' => [
                'id' => 7,
                'link'=> 'https://news.yandex.ru/internet.rss',
            ],
            '8' => [
                'id' => 8,
                'link'=> 'https://news.yandex.ru/cyber_sport.rss',
            ],
            '9' => [
                'id' => 9,
                'link'=> 'https://news.yandex.ru/movies.rss',
            ],
            '10' => [
                'id' => 10,
                'link'=> 'https://news.yandex.ru/cosmos.rss',
            ],
            '11' => [
                'id' => 11,
                'link'=> 'https://news.yandex.ru/culture.rss',
            ],
            '12' => [
                'id' => 12,
                'link'=> 'https://news.yandex.ru/music.rss',
            ],
            '13' => [
                'id' => 13,
                'link'=> 'https://news.yandex.ru/science.rss',
            ],
            '14' => [
                'id' => 14,
                'link'=> 'https://news.yandex.ru/realty.rss',
            ],
            '15' => [
                'id' => 15,
                'link'=> 'https://news.yandex.ru/society.rss',
            ],
            '16' => [
                'id' => 16,
                'link'=> 'https://news.yandex.ru/politics.rss',
            ],
            '17' => [
                'id' => 17,
                'link'=> 'https://news.yandex.ru/incident.rss',
            ],
            '18' => [
                'id' => 18,
                'link'=> 'https://news.yandex.ru/travels.rss',
            ],
            '19' => [
                'id' => 19,
                'link'=> 'https://news.yandex.ru/sport.rss',
            ],
            '20' => [
                'id' => 20,
                'link'=> 'https://news.yandex.ru/theaters.rss',
            ],
            '21' => [
                'id' => 21,
                'link'=>  'https://news.yandex.ru/computers.rss',
            ],
            '22' => [
                'id' => 22,
                'link'=> 'https://news.yandex.ru/vehicle.rss',
            ],
            '23' => [
                'id' => 23,
                'link'=>  'https://news.yandex.ru/finances.rss',
            ],
            '24' => [
                'id' => 24,
                'link'=> 'https://news.yandex.ru/showbusiness.rss',
            ],
            '25' => [
                'id' => 25,
                'link'=> 'https://news.yandex.ru/ecology.rss',
            ],
            '26' => [
                'id' => 26,
                'link'=>  'https://news.yandex.ru/business.rss',
            ],
            '27' => [
                'id' => 27,
                'link'=> 'https://news.yandex.ru/energy.rss'
            ],
            '28' => [
                'id' => 28,
                'link'=> 'https://news.yandex.ru/auto.rss',
            ],
            '29' => [
                'id' => 29,
                'link'=> 'https://news.yandex.ru/auto_racing.rss',
            ],
            '30' => [
                'id' => 30,
                'link'=> 'https://news.yandex.ru/army.rss',
            ],
            '31' => [
                'id' => 31,
                'link'=> 'https://news.yandex.ru/world.rss',
            ],
            '32' => [
                'id' => 32,
                'link'=> 'https://news.yandex.ru/gadgets.rss',
            ],
        ];

        return $data;
    }
}
