<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            // ADMIN
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@apuskesmasloakulu.my.id',
                'phone_number' => 'xxx',
                'password' => Hash::make('123123'),
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@apuskesmasloakulu.my.id',
                'phone_number' => 'xxx',
                'password' => Hash::make('123123'),
            ],
        ]);
    }
}
