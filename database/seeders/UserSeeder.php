<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'is_admin' => true,
            ],
            [
                'name' => 'user1',
                'email' => 'user1@user1.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'is_admin' => false,
            ],
            [
                'name' => 'user2',
                'email' => 'user2@user2.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'is_admin' => false,
            ],
            [
                'name' => 'user3',
                'email' => 'user3@user3.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'is_admin' => false,
            ],
        ];
        DB::table('users')->insert($users);
    }
}
