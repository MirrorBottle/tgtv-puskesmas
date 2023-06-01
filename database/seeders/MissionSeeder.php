<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $missions = [
            [
                'name' => 'Kepuasan Client',
                'description' => 'Dapat memuaskan konsumen',
                'image' => '/storage/files/mission-1.svg',
            ],
            [
                'name' => 'Kompetitif',
                'description' => 'Dengan berlandaskan iman dan taqwa PT.ANANDITA PUTRI AKMAL menjadi salah satu yang terdepan maju, produktif, dan kompetitif.',
                'image' => '/storage/files/mission-2.svg',
            ],
            [
                'name' => 'Lapangan Kerja',
                'description' => 'Memperluas lapangan kerja untuk kemakmuran masyarakat sekitar',
                'image' => '/storage/files/mission-3.svg',
            ],
            [
                'name' => 'Terdepan',
                'description' => 'Menjadi yang terdepan di bidangnya',
                'image' => '/storage/files/mission-4.svg',
            ],
        ];

        DB::table('missions')->insert($missions);
    }
}
