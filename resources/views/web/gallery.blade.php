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
            @foreach ($galleries as $gallery)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="property-item rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ $gallery->link }}"><img class="img-fluid" src="{{ asset($gallery->image) }}" alt=""></a>
                        </div>
                        <div class="p-4 pb-0">
                            <a class="d-block h5 mb-2" href="{{ $gallery->link }}">{{ $gallery->title }}</a>
                            <p>{{ $gallery->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Header End -->



@include('web.layout.footer')
