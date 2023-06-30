@include('web.layout.header')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="animated fadeIn mb-4">Daftar Halaman</h1>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="tab-content">
            <div class="row g-4">
                @foreach ($pages as $page)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{ route('web.page', $page->slug) }}"><img class="img-fluid"
                                        src="{{ $page->banner }}" alt=""></a>
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    {{ $page->created_at->translatedFormat('d F') }}</div>
                            </div>
                            <div class="p-4 pb-0">
                                <a class="d-block h5 mb-2" href="{{ route("web.page", $page->slug) }}">{{ $page->title }}</a>
                                <p>{{ \Illuminate\Support\Str::limit($page->caption, 150, $end = '...') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($pages->hasPages())
                <div class="d-flex justify-content-center">
                    {!! $pages->links() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>



@include('web.layout.footer')
