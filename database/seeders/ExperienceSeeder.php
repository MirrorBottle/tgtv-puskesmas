<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catherings = [
            [
                'name' => 'PT. Indo Perkasa',
                'year' => '2010',
                'type' => '1'
            ],
            [
                'name' => 'PT. Putra Perkasa Abadi',
                'year' => '2011',
                'type' => '1'
            ],
            [
                'name' => 'PT. Cardig Logistic Indonesia',
                'year' => '2012',
                'type' => '1'
            ],
            [
                'name' => 'PT. Bina Sarana Sukses',
                'year' => '2013',
                'type' => '1'
            ],
            [
                'name' => 'PT. Alam Barajaya Pratama',
                'year' => '2013',
                'type' => '1'
            ],
            [
                'name' => 'PT. Komunitas Bangun Bersama',
                'year' => '2014',
                'type' => '1'
            ],
            [
                'name' => 'PT. Prima Multi Utama',
                'year' => '2015',
                'type' => '1'
            ],
            [
                'name' => 'PT. Mitra Terminal Kaltim',
                'year' => '2016',
                'type' => '1'
            ],
            [
                'name' => 'PT. Antareja Mahada Makmur',
                'year' => '2016',
                'type' => '1'
            ],
            [
                'name' => 'PT. PT. Alf Minindo',
                'year' => '2016',
                'type' => '1'
            ],
            [
                'name' => 'PT. Cipta Kridatama',
                'year' => '2018',
                'type' => '1'
            ],
            [
                'name' => 'PT. Karya Putra Borneo',
                'year' => '2019',
                'type' => '1'
            ],
            [
                'name' => 'PT. Gurano Bintang Papua',
                'year' => '2019',
                'type' => '1'
            ],
            [
                'name' => 'PT. Prima Unggul Persada',
                'year' => '2020',
                'type' => '1'
            ],
            [
                'name' => 'PT. Benami',
                'year' => '2020',
                'type' => '1'
            ],
            [
                'name' => 'PT. Aramco',
                'year' => '2020',
                'type' => '1'
            ],
            [
                'name' => 'PT. Tectona Mitra Utama',
                'year' => '2020',
                'type' => '1'
            ],
            [
                'name' => 'PT. Sumber Niaga Utama Jaya',
                'year' => '2020',
                'type' => '1'
            ],
            [
                'name' => 'PT. Tangan Kanan Investama',
                'year' => '2021',
                'type' => '1'
            ],
            [
                'name' => 'PT. Titan Rajawali Internasional',
                'year' => '2021',
                'type' => '1'
            ],
            [
                'name' => 'PT. Mutiara Merdeka Jaya',
                'year' => '2021',
                'type' => '1'
            ],
            [
                'name' => 'PT. PP Presisi ',
                'year' => '2021',
                'type' => '1'
            ],
            [
                'name' => 'PT. Tunas Inti Abadi',
                'year' => '2021',
                'type' => '1'
            ],
            [
                'name' => 'PT. Baramulti Sukses Sarana',
                'year' => '2021',
                'type' => '1'
            ],
            [
                'name' => 'PT. Trimegah Karya Bersama',
                'year' => '2021',
                'type' => '1'
            ],
        ];

        $rents = [
            [
                'name' => 'PT. Putra Perkasa Abadi',
                'year' => '2011',
                'type' => '2'
            ],
            [
                'name' => 'PT. Alam Barajaya Pratama',
                'year' => '2013',
                'type' => '2'
            ],
            [
                'name' => 'PT. Bina Sarana Sukses',
                'year' => '2013',
                'type' => '2'
            ],
            [
                'name' => 'PT. Komunitas Bangun Bersama',
                'year' => '2014',
                'type' => '2'
            ],
            [
                'name' => 'PT. Alf Minindo ',
                'year' => '2016',
                'type' => '2'
            ],
            [
                'name' => 'PT. Antareja Mahada Makmur',
                'year' => '2016',
                'type' => '2'
            ],
            [
                'name' => 'PT. Mitra Terminal Kaltim ',
                'year' => '2016',
                'type' => '2'
            ],
            [
                'name' => 'PT. Gurano Bintang Papua',
                'year' => '2019',
                'type' => '2'
            ],
            [
                'name' => 'PT. Karya Putra Borneo',
                'year' => '2019',
                'type' => '2'
            ],
            [
                'name' => 'PT. Aramco',
                'year' => '2020',
                'type' => '2'
            ],
            [
                'name' => 'PT. Prima Unggul Persada',
                'year' => '2020',
                'type' => '2'
            ],
            [
                'name' => 'PT. Sumber Niaga Utama Jaya',
                'year' => '2020',
                'type' => '2'
            ],
            [
                'name' => 'PT. Baramulti Sukses Sarana',
                'year' => '2021',
                'type' => '2'
            ],
            [
                'name' => 'PT. Mutiara Merdeka Jaya',
                'year' => '2021',
                'type' => '2'
            ],
            [
                'name' => 'PT. Trimegah Karya Bersama',
                'year' => '2021',
                'type' => '2'
            ],
        ];
        DB::table('experiences')->insert($rents);
        DB::table('experiences')->insert($catherings);
    }
}
