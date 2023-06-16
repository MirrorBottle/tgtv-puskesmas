@include('web.layout.header')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInLeft;">
                <h1 class="mb-3">Galeri</h1>
                <p>Galeri foto kegiatan Puskesmas Loa Kulu</p>
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
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="property-item rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <a href=""><img class="img-fluid" src="{{ asset("storage/files/foto-4.jpg") }}" alt=""></a>
                    </div>
                    <div class="p-4 pb-0">
                        <a class="d-block h5 mb-2" href="">Kegiatan 1</a>
                        <p>-</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="property-item rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <a href=""><img class="img-fluid" src="{{ asset("storage/files/foto-5.jpg") }}" alt=""></a>
                    </div>
                    <div class="p-4 pb-0">
                        <a class="d-block h5 mb-2" href="">Kegiatan 2</a>
                        <p>-</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="property-item rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <a href=""><img class="img-fluid" src="{{ asset("storage/files/foto-7.jpg") }}" alt=""></a>
                    </div>
                    <div class="p-4 pb-0">
                        <a class="d-block h5 mb-2" href="">Kegiatan 3</a>
                        <p>-</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->



@include('web.layout.footer')
