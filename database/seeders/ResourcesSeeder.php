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
                'link'=> 'https://lenta.ru/rss',
            ],
        ];

        return $data;
    }
}
