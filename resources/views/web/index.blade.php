@include('web.layout.header')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Terwujudnya Masyarakat Kecamatan Loa Kulu Mandiri Untuk <span class="text-primary">Hidup Sehat.</span></h1>
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
                        <input id="search-nik" type="text" class="form-control border-0 py-3" placeholder="NIK" required>
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
                                $years = range(date('Y'), 2023)
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


<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Program & Layanan</h1>
        </div>
        @php
            $services = [
                ['Poli Umum', 'fa-house-medical'],
                ['Poli Lansia', 'fa-person-cane'],
                ['Poli Gigi', 'fa-face-grimace'],
                ['Poli KIA', 'fa-person-breastfeeding'],
                ['Poli KB', 'fa-children'],
                ['Poli Imunisasi', 'fa-shield-heart'],
                ['Poli Anak dan gizi', 'fa-apple-whole'],
                ['PKPR dan Konsultasi', 'fa-hospital-user'],
                ['Apotik dan Obat', 'fa-prescription-bottle-medical'],
                ['Lab dan Klinik DOT', 'fa-flask-vial'],
                ['Instalasi Gawat Darurat', 'fa-truck-medical'],
            ];
        @endphp
        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="cat-item d-block bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <div class="icon mb-3"><i class="fa-solid {{ $service[1] }} fa-2x"></i></div>
                            <h6>{{ $service[0] }}</h6>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
</div>
<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{ asset("storage/files/foto-7.jpg") }}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">Jam Pelayanan Rawat Jalan</h1>
                <p class="mb-4">Berikut jam pelayanan rawat jalan di Puskesmas Loa Kulu</p>
                <p><i class="fa fa-check text-primary me-3"></i>Senin - Kamis: 07.45 - 13.30 WITA</p>
                <p><i class="fa fa-check text-primary me-3"></i>Jumat: 07.45 - 11.30 WITA</p>
                <p><i class="fa fa-check text-primary me-3"></i>Sabtu: 07.45 - 12.00 WITA</p>
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
                        <img class="img-fluid rounded w-100" src="{{ asset("storage/files/foto-6.jpg") }}" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4">
                            <h1 class="mb-3">Hubungi Kami</h1>
                            <p>Anda dapat menghubungi kami melalui kontak WA berikut</p>
                        </div>
                        <a href="" class="btn btn-primary py-3 px-4 me-2"><i class="fa-brands fa-whatsapp me-2"></i></i>Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('addition-scripts')
    <script>
        $(function() {
            $("#search-btn").click(function() {
                if($("#search-nik").val() != "") {
                    const nik = $("#search-nik").val();
                    const month = $("#search-month").val();
                    const year = $("#search-year").val();
                    window.location.href = `/pemeriksaan-lansia?nik=${nik}&month=${month}&year=${year}`;
                }
            })
        })
    </script>
@endpush
@include('web.layout.footer')
