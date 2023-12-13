@include('web.layout.header')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Tentang</h1>
        </div>
        {{-- <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                @foreach ($banners as $banner)
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset($banner->image) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
</div>

<div class="container-fluid bg-white m-4 p-4">
    <div>
        {!! setting('about_page') !!}
        
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Tenaga Kesehatan</h1>
                </div>
                <div class="row g-4">
                    @foreach ($workers as $worker)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                            <div class="team-item rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="{{ asset($worker->image) }}" alt="">
                                </div>
                                <div class="text-center p-4 mt-3">
                                    <h5 class="fw-bold mb-0">{{ $worker->title }}</h5>
                                    <small>{{ $worker->description }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Pusban</h1>
                </div>
                <div class="row g-4">
                    @foreach ($helpers as $helper)
                        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                            <div class="team-item rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="{{ asset($helper->image) }}" alt="">

                                </div>
                                <div class="text-center p-4 mt-3">
                                    <h5 class="fw-bold mb-0">{{ $helper->title }}</h5>
                                    <small>{{ $helper->description }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4 wow fadeIn d-flex align-items-center justify-content-center" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" style="width: 300px" src="{{ asset("storage/files/tgtv.png") }}"
                            alt="">
                    </div>
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4">
                            <h2>Dibuat oleh TGTV Unmul</h2>
                            <p>
                                TGTV (Tecnology Goes to Village) adalah suatu kegiatan yang diadakan oleh Universitas Mulawarman khususnya Prodi Informatika yang bertujuan untuk pengabdian kita kepada Masyarakat dengan memberikan Pembinaan desa berbasis IT dan pemaham kepada masyarakat tentang dunia IT.
                            </p>
                            <p>
                                Program kerja ini masuk dalam program kerja terbaik dan program kerja yang besar dari program kerja AI UNMUL di tahun 2023. Untuk tema dari kegiatan TGTV tahun ini yaitu “Teknologi Sebagai Penggerak Perubahan Pada Masyarakat Menuju Desa Cerdas".
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header End -->



@include('web.layout.footer')
