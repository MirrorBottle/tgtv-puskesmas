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
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'puskesmasloakulu1',
                'username' => 'puskesmasloakulu1',
                'email' => 'puskesmasloakulu1@apuskesmasloakulu.my.id',
                'phone_number' => 'xxx',
                'password' => Hash::make('puskesmasloakulu1'),
            ],
            [
                'name' => 'puskesmasloakulu2',
                'username' => 'puskesmasloakulu2',
                'email' => 'puskesmasloakulu2@apuskesmasloakulu.my.id',
                'phone_number' => 'xxx',
                'password' => Hash::make('puskesmasloakulu2'),
            ],
            [
                'name' => 'puskesmasloakulu3',
                'username' => 'puskesmasloakulu3',
                'email' => 'puskesmasloakulu3@apuskesmasloakulu.my.id',
                'phone_number' => 'xxx',
                'password' => Hash::make('puskesmasloakulu3'),
            ],
            [
                'name' => 'puskesmasloakulu4',
                'username' => 'puskesmasloakulu4',
                'email' => 'puskesmasloakulu4@apuskesmasloakulu.my.id',
                'phone_number' => 'xxx',
                'password' => Hash::make('puskesmasloakulu4'),
            ],
            [
                'name' => 'puskesmasloakulu5',
                'username' => 'puskesmasloakulu5',
                'email' => 'puskesmasloakulu5@apuskesmasloakulu.my.id',
                'phone_number' => 'xxx',
                'password' => Hash::make('puskesmasloakulu5'),
            ],
        ]);
    }
}
