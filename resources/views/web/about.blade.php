@include('web.layout.header')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Tentang</h1>
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

<div class="container-fluid bg-white m-4 p-4">
    <div>
        {!! setting('about_page') !!}
    </div>
</div>
<!-- Header End -->



@include('web.layout.footer')
