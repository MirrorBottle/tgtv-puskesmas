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
        // * SERVICES
        $galleries = array_map(function($service) {
            $image = strtolower(str_replace(' ', '-', $service) . '.jpg');
            return [
                'title' => $service,
                'image' => "/storage/files/services/$image",
                'type' => 'service',
                'link'  => null,
            ];
        }, [
            'Poli Umum',
            'Poli Lansia',
            'Poli Gigi',
            'Poli KIA',
            'Poli KB',
            'Poli Imunisasi',
            'Poli Anak dan gizi',
            'PKPR dan Konsultasi',
            'Apotik dan Obat',
            'Lab dan Klinik DOT',
            'Instalasi Gawat Darurat'
        ]);
        // * BANNER
        $galleries = array_merge($galleries, [
            [
                'title' => "Banner 1",
                'link'  => null,
                'image' => "/storage/files/foto-3.jpg",
                'type' => 'banner'
            ]
        ]);
        // * GALLERY
        $galleries = array_merge($galleries, [
            [
                'title' => "Galeri 1",
                'link'  => null,
                'image' => "/storage/files/foto-3.jpg",
                'type' => 'gallery'
            ]
        ]);
        // * ATTACHMENT
        $attachments = array_map(function($attachment) {
            return [
                'title' => $attachment[0],
                'image' => "-",
                'link'  => $attachment[1],
                'type'  => 'attachment'
            ];
        }, [
            ['Instrumen Akreditasi', 'https://docs.google.com/spreadsheets/d/1-K2jnMsFwq3wYmzXnWrXe8lDblefqF-JdsmCTS19xCA/edit#gid=1296572686'],
            ['Instrumen 5 Bab', 'https://docs.google.com/document/d/1VxdsYaq73P4WhQtRmixoL9GwxUeRFGJkkI6ElOstKDg/edit'],
            ['Laporan PPTK', 'https://docs.google.com/spreadsheets/d/1qjpZICzVnxNSHMLmmzdwVeRGvMSIi0FePJGSNF22f1I/edit#gid=639348333'],
            ['Penimbangan Posyandu', 'https://docs.google.com/spreadsheets/d/1DHMiBzH7RS9pDuZoXyyXVPIKv4k-gfeqUeWbI2prugM/edit#gid=0'],
            ['Imunisasi', 'https://docs.google.com/spreadsheets/d/1R-cHk2JMqvWhuBINE6GFOdyVhv1yNe7Fet-DafbtZMk/edit#gid=0'],
            ['Kunjungan PUSBAN', 'https://docs.google.com/spreadsheets/d/199F1EXKgIgB37YY7Pco_8qpuHQzzHq2Q5jLi44AkIvk/edit#gid=0'],
            ['SPM 2023', 'https://docs.google.com/spreadsheets/d/1hQhnnK1uXj8j1J3BIB9vqG-aEvSrkilQh_jD7sjC3AA/edit#gid=0'],
            ['IVA Test', 'https://docs.google.com/spreadsheets/d/1WLr6q3qjpxV66N7_h4CoKiBM9sWEgAxa0bOMcpInUrw/edit#gid=0'],
            ['Primary Care', 'https://pcarejkn.bpjs-kesehatan.go.id/eclaim/Login'],
            ['e PANTAU', 'https://e-pantau.kukarkab.go.id/2023/home'],
            ['PIS-PK', 'https://kaltim-keluargasehat.kemkes.go.id/login'],
            ['SIKDA GENERIK', 'https://e-sikda.kemkes.go.id/6403/']
        ]);
        $galleries = array_merge($galleries, $attachments);

        DB::table("galleries")->insert($galleries);
    }
}
