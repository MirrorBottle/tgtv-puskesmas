<?php

return [
    'app' => [
        'title' => 'General',
        'desc'  => 'All the general settings for application.',
        'icon'  => 'fas fa-cube',
        'elements' => [
            [
                'type'  => 'text', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'app_name', // unique name for field
                'label' => 'App Name', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'Puskesmas Loa Kulu', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'footer_text', // unique name for field
                'label' => 'Footer Text', // you know what label it is
                'rules' => 'required|min:2', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'Puskesmas Loa Kulu', // default value if you want
            ],
            [
                'type'  => 'email', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'email', // unique name for field
                'label' => 'Email', // you know what label it is
                'rules' => 'required|email', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'loakulupuskesmas@gmail.com', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'phone_number', // unique name for field
                'label' => 'Phone Number', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '085250606606', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'address', // unique name for field
                'label' => 'Alamat', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '-', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'maps', // unique name for field
                'label' => 'Google Map', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.657885828804!2d117.0207672!3d-0.5138205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67d0e1ea3d4e1%3A0x496974b5b4a63d7d!2sPuskesmas%20Loa%20Kulu!5e0!3m2!1sen!2sid!4v1686511543233!5m2!1sen!2sid', // default value if you want
            ],
            [
                'type'  => 'file', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'logo', // unique name for field
                'label' => 'Logo', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'storage/files/logo.png', // default value if you want
            ],
            [
                'type'  => 'file', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'favicon', // unique name for field
                'label' => 'Favicon', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'storage/files/logo/favicon.png', // default value if you want
            ],

        ],
    ],
    'homepage' => [
        'title' => 'Beranda',
        'desc'  => 'Bagian Beranda di Halaman Depan',
        'icon'  => 'fas fa-home',

        'elements' => [
            [
                'type'  => 'editor', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'homepage_banner', // unique name for field
                'label' => 'Tulisan Banner Beranda', // you know what label it is
                'rules' => 'required|nullable', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'Terwujudnya Masyarakat Kecamatan Loa Kulu Mandiri Untuk <span class="text-primary">Hidup Sehat.</span>', // default value if you want
            ],
            [
                'type'  => 'file', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'homepage_hours_file', // unique name for field
                'label' => 'Gambar Jam Pelayanan', // you know what label it is
                'rules' => 'required|nullable', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '/storage/files/foto-7.jpg', // default value if you want
            ],
            [
                'type'  => 'editor', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'homepage_hours', // unique name for field
                'label' => 'Jam Pelayanan', // you know what label it is
                'rules' => 'required|nullable', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '<h1 class="mb-4">Jam Pelayanan Rawat Jalan</h1>
                <p class="mb-4">Berikut jam pelayanan rawat jalan di Puskesmas Loa Kulu</p>
                <p><i class="fa fa-check text-primary me-3"></i>Senin - Kamis: 07.45 - 13.30 WITA</p>
                <p><i class="fa fa-check text-primary me-3"></i>Jumat: 07.45 - 11.30 WITA</p>
                <p><i class="fa fa-check text-primary me-3"></i>Sabtu: 07.45 - 12.00 WITA</p>', // default value if you want
            ],
            [
                'type'  => 'file', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'homepage_contact_file', // unique name for field
                'label' => 'Gambar Hubungi Kami', // you know what label it is
                'rules' => 'required|nullable', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '/storage/files/foto-6.jpg', // default value if you want
            ],
            [
                'type'  => 'editor', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'homepage_contact', // unique name for field
                'label' => 'Tulisan Hubungi Kami', // you know what label it is
                'rules' => 'required|nullable', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '<h1 class="mb-3">Hubungi Kami</h1>
                <p>Anda dapat menghubungi kami melalui kontak WA berikut</p>', // default value if you want
            ],
        ],
    ],
    'about' => [
        'title' => 'Tentang',
        'desc'  => 'Bagian Tentang di Halaman Depan',
        'icon'  => 'fas fa-user',

        'elements' => [
            [
                'type'  => 'editor', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'about_page', // unique name for field
                'label' => 'Judul Tentang', // you know what label it is
                'rules' => 'required|nullable', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '<p>Puskesmas Loa Kulu merupakan salah satu Puskesmas yang ada di wilayah Tengah Kabupaten Kutai Kartanegara. Puskesmas Loa Kulu terletak di Kecamatan Loa Kulu. Kecamatan Loa Kulu yang beribukota kecamatan di Loh Sumber dan berjarak ± 12 KM dari ibu kota Kabupaten Kutai Kartanegara Tenggarong.</p><p>Puskesmas Loa Kulu difungsikan sejak tahun 1973  merupakan Puskesmas Perawatan.</p><p>Batas wilayah kerja Puskesmas Loa Kulu adalah :</p>                
                <p>o   Sebelah utara  berbatasan dengan Kec Kota Bangun dan Kecamatan Tenggarong</p>
                <p>o   Sebelah timur berbatasan dengan Kecamatan Loa Janan</p>
                <p>o   Sebelah selatan berbatasan dengan Kecamatan Muara Muntai dan Kab Kutai Barat</p>
                <p>o   Sebelah barat berbatasan dengan Kabupaten Panajam Paser Utara</p>', // default value if you want
            ],
        ],
    ],
    'meta' => [
        'title' => 'Meta ',
        'desc'  => 'Application Meta Data',
        'icon'  => 'fas fa-globe-asia',

        'elements' => [
            [
                'type'  => 'text', // input fields type
                'data'  => 'text', // data type, string, int, boolean
                'name'  => 'meta_site_name', // unique name for field
                'label' => 'Meta Site Name', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'Puskesmas Loa Kulu', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'text', // data type, string, int, boolean
                'name'  => 'meta_description', // unique name for field
                'label' => 'Meta Description', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'Puskesmas Loa Kulu', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'text', // data type, string, int, boolean
                'name'  => 'meta_keyword', // unique name for field
                'label' => 'Meta Keyword', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'Web Application, Laravel,Laravel starter,Bootstrap,Admin,Template,Open,Source, nasir khan, nasirkhan', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'text', // data type, string, int, boolean
                'name'  => 'meta_image', // unique name for field
                'label' => 'Meta Image', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'img/default_banner.jpg', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'text', // data type, string, int, boolean
                'name'  => 'meta_fb_app_id', // unique name for field
                'label' => 'Meta Facebook App Id', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '569561286532601', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'text', // data type, string, int, boolean
                'name'  => 'meta_twitter_site', // unique name for field
                'label' => 'Meta Twitter Site Account', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '@nasir8891', // default value if you want
            ],
            [
                'type'  => 'text', // input fields type
                'data'  => 'text', // data type, string, int, boolean
                'name'  => 'meta_twitter_creator', // unique name for field
                'label' => 'Meta Twitter Creator Account', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '@nasir8891', // default value if you want
            ],
        ],
    ],
    'analytics' => [
        'title' => 'Analytics',
        'desc'  => 'Application Analytics',
        'icon'  => 'fas fa-chart-line',

        'elements' => [
            [
                'type'  => 'text', // input fields type
                'data'  => 'string', // data type, string, int, boolean
                'name'  => 'google_analytics', // unique name for field
                'label' => 'Google Analytics', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'UA-36770598-2', // default value if you want
            ],
        ],

    ],
];
