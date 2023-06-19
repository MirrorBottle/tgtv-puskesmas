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
            @foreach ($attachments as $attachment)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="property-item rounded overflow-hidden">
                        @if ($attachment->image != null && $attachment->image != "-")
                            <div class="position-relative overflow-hidden">
                                <a href="{{ $attachment->link }}"><img class="img-fluid" src="{{ asset($attachment->image) }}" alt=""></a>
                            </div>
                        @endif
                        <div class="p-4 pb-0">
                            <p class="d-block h5 mb-2" href="">{{ $attachment->title }}</p>
                            <p>Lampiran mengenai {{ $attachment->description }}</p>
                        </div>
                        <div class="d-flex border-top">
                            <a href="{{ $attachment->link }}" target="_blank" class="flex-fill text-center border-end py-2">
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
