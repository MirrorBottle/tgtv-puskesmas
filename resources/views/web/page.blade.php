@include('web.layout.header')

@if ($page)
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="animated fadeIn mb-4">{{ $page->title }}</h1>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ $page->banner }}" alt="">
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white m-4 p-4">
        <div>
            {!! $page->content !!}

        </div>
    </div>
@else
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="mb-4">Halaman Tidak Ada</h1>
                    <p class="mb-4">Halaman tidak ada atau telah dihapus</p>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Header End -->



@include('web.layout.footer')
