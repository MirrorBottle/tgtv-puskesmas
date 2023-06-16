@include('web.layout.header')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInLeft;">
                <h1 class="mb-3">Lampiran</h1>
                <p>Berikut merupakan berkas-berkas terlampir Puskesmas Loa Kulu</p>
            </div>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="{{ asset("storage/files/foto-3.jpg") }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @php
                $files = [
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
                ]
            @endphp
            @foreach ($files as $file)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="property-item rounded overflow-hidden">
                        <div class="p-4 pb-0">
                            <p class="d-block h5 mb-2" href="">{{ $file[0] }}</p>
                            <p>Lampiran mengenai {{ $file[0] }}</p>
                        </div>
                        <div class="d-flex border-top">
                            <a href="{{ $file[1] }}" target="_blank" class="flex-fill text-center border-end py-2">
                                <small><i class="fa fa-external-link text-primary me-2"></i>Lihat Lampiran</small>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Header End -->



@include('web.layout.footer')
