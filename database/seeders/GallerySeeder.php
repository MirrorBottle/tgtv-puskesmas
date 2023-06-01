<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 11; $i++) {
            DB::table('galleries')->insert([
                'title' => "Galeri $i",
                'image' => "/storage/files/picture-$i.jpg"
            ]);
        }
    }
}
