<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ElderlySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('elderlies')->insert([
            [
                'nik' => Str::random(),
                'name' => 'Samuel .T',
                'birth_date' => Carbon::now()->subYear(64)->toDateString(),
                'gender' => 'L',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'SLTP',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'Soleh',
                'birth_date' => Carbon::now()->subYear(68)->toDateString(),
                'gender' => 'L',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'SD',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'Asiah',
                'birth_date' => Carbon::now()->subYear(83)->toDateString(),
                'gender' => 'P',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'Tidak Tamat SD',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'Abdul Hadi',
                'birth_date' => Carbon::now()->subYear(65)->toDateString(),
                'gender' => 'L',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'Tidak Tamat SD',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'Dariah',
                'birth_date' => Carbon::now()->subYear(63)->toDateString(),
                'gender' => 'P',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'SLTP',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'Ramnah',
                'birth_date' => Carbon::now()->subYear(69)->toDateString(),
                'gender' => 'P',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'SD',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'Sapnah',
                'birth_date' => Carbon::now()->subYear(62)->toDateString(),
                'gender' => 'P',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'SLTP',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'Arfani',
                'birth_date' => Carbon::now()->subYear(62)->toDateString(),
                'gender' => 'L',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'SD',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'Abdurahman',
                'birth_date' => Carbon::now()->subYear(77)->toDateString(),
                'gender' => 'L',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'SD',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'nik' => Str::random(),
                'name' => 'HJ. Salamiah',
                'birth_date' => Carbon::now()->subYear(75)->toDateString(),
                'gender' => 'L',
                'address' => '-',
                'phone_number' => '-',
                'last_education' => 'SD',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
