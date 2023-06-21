@include('web.layout.header')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">{!! setting('homepage_banner') !!}</h1>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                @foreach ($banners as $banner)
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset($banner->image) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-12">
                <h3 class="text-white">Cari Hasil Pemeriksaan Lansia</h3>
            </div>
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input id="search-nik" type="text" class="form-control border-0 py-3" placeholder="NIK"
                            required>
                    </div>
                    <div class="col-md-4">
                        <select id="search-month" class="form-select border-0 py-3">
                            @php
                                $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            @endphp
                            <option selected value="all">Semua</option>
                            @foreach ($months as $month)
                                <option value="{{ $loop->iteration }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="search-year" class="form-select border-0 py-3">
                            @php
                                $years = range(date('Y'), 2023);
                            @endphp
                            <option selected value="all">Semua</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button id="search-btn" class="btn btn-dark border-0 w-100 py-3">Cari</button>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Halaman Berita</h1>
        </div>
        <div class="tab-content">
            <div class="row g-4">
                @foreach ($pages as $page)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{ route("web.page", $page->slug) }}"><img class="img-fluid" src="{{ $page->banner }}" alt=""></a>
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{ $page->created_at->translatedFormat('d F') }}</div>
                            </div>
                            <div class="p-4 pb-0">
                                <a class="d-block h5 mb-2" href="">{{ $page->title }}</a>
                                <p>{{ \Illuminate\Support\Str::limit($page->caption, 150, $end='...') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a class="btn btn-primary py-3 px-5" href="{{ route("web.pages") }}">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Program & Layanan</h1>
        </div>
        <div class="row g-4">

            @foreach ($services as $service)
                <div class="col-lg-3 col-12 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="property-item rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset($service->image) }}" alt="">
                        </div>
                        <div class="p-4 pb-0">
                            <p class="d-block h5 mb-2 text-center text-primary" href="">{{ $service->title }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{ asset(setting('homepage_hours_file')) }}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                {!! setting('homepage_hours') !!}
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Call to Action Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="{{ asset(setting('homepage_contact_file')) }}"
                            alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4">
                            {!! setting('homepage_contact') !!}
                        </div>
                        <a href="" class="btn btn-primary py-3 px-4 me-2"><i
                                class="fa-brands fa-whatsapp me-2"></i></i>Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h1 class="mb-3">Sosial Media</h1>
        </div>
        <div class="row g-4" id="social-media-container">
            <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="https://web.facebook.com/puskesmas.loakulu" target="_blank">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="fab fa-facebook fa-4x"></i>
                        </div>
                        <h6>Facebook</h6>
                        <span>Puskesmas Loa Kulu</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="https://www.instagram.com/puskesmas_loa_kulu/" target="_blank">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="fab fa-instagram fa-4x"></i>
                        </div>
                        <h6>Instagram</h6>
                        <span>puskesmas_loa_kulu</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@push('addition-scripts')
    <script>
        $(function() {
            $("#search-btn").click(function() {
                if ($("#search-nik").val() != "") {
                    const nik = $("#search-nik").val();
                    const month = $("#search-month").val();
                    const year = $("#search-year").val();
                    window.location.href = `/pemeriksaan-lansia?nik=${nik}&month=${month}&year=${year}`;
                }
            })

            fetch(
                    "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCJKZiPnTnOaa05RzkstjJcw&maxResults=3&order=date&type=video&key=AIzaSyBth6ePgWV_YBWML35tHly3DUwBhbkvHU8")
                .then(response => response.json())
                .then((data) => {
                    data.items.forEach((item, index) => {
                        $("#social-media-container").append(`<div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="cat-item d-block bg-light text-center rounded p-3" href="https://web.facebook.com/puskesmas.loakulu" target="_blank">
                            <iframe class="w-100" style="min-height: 300px" src="https://www.youtube.com/embed/${item.id.videoId}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        
                    </div>`);
                    })
                })
                .catch(() => {
                    console.log('error')
                })

        })
    </script>
@endpush
@include('web.layout.footer')
