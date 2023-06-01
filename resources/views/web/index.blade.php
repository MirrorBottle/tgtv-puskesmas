<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {!! SEO::generate() !!}
    <link rel="shortcut icon" href="{{ asset(setting('favicon')) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset(setting('favicon')) }}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/unicons.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/owl.theme.default.min.css')}}">
    
    <!-- MAIN STYLE -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"
    />
    <link rel="stylesheet" href="{{asset('web/css/tooplate-style.css')}}">
    
<!--

Tooplate 2115 Marvel

https://www.tooplate.com/view/2115-marvel

-->
  </head>
  <body>

    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
              <img style="height: 70px;" src="{{ asset(setting('logo')) }}" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#about" class="nav-link"><span data-hover="Tentang">Tentang</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#mission" class="nav-link"><span data-hover="Visi Misi">Visi Misi</span></a>
                  </li>
                    <li class="nav-item">
                        <a href="#project" class="nav-link"><span data-hover="Galeri">Galeri</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#resume" class="nav-link"><span data-hover="Experience">Experience</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link"><span data-hover="Kontak">Kontak</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ABOUT -->
    <section class="about full-screen d-lg-flex justify-content-center align-items-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  @if (session('status'))
                    <div class="container-fluid">
                        <div class="alert alert-success left-icon-big alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="uil uil-times"></i></span>
                            </button>
                            <div class="media">
                                <div class="alert-left-icon-big">
                                    <span><i class="uil uil-check-circle"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-1 mb-2">Sukses!</h5>
                                    <p class="mb-0">{{ Session::get('status') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endif
                </div>
                <div class="col-lg-7 col-md-12 col-12 d-flex align-items-center">
                    <div class="about-text">
                        <h1 class="animated animated-text">
                            <span class="mr-2">{!! setting('about_header') !!}</span>
                        </h1>

                        <p>{!! setting('about_description') !!}</p>
                        
                        <div class="custom-btn-group mt-4">
                          <a href="{!! setting('about_resume') !!}" target="_blank" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Download Resume</a>
                          <a href="https://api.whatsapp.com/send?phone={!! setting('phone_number') !!}&text=Saya ingin bekerja sama" target="_blank" class="btn custom-btn custom-btn-bg custom-btn-link">Kontak Kami Sekarang</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-12">
                    <div class="about-image svg">
                        <img src="{{asset(setting('about_image'))}}" class="img-fluid" alt="svg image">
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- VISI MISI --}}
    <section class="mission py-5" id="mission">
      <div class="container">
              
        <div class="row">
          <div class="col-lg-11 text-center mx-auto col-12 mb-4">
            <div class="col-lg-8 mx-auto">
              <h2>Visi Misi</h2>
            </div>
          </div>
          @foreach ($missions as $mission)
            <div class="col-md-3 col-lg-3 col-12">
              <div class="card">
                <div class="img-container">
                  <img src="{{asset($mission->image)}}" class="card-img-top" alt=".{{$mission->name}}">
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$mission->name}}</h5>
                  <p class="card-text">{{$mission->description}}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- PROJECTS -->
    <section class="project py-5" id="project">
        <div class="container">
                
          <div class="row">
            <div class="col-lg-11 text-center mx-auto col-12">
              <div class="col-lg-8 mx-auto">
                <h2>Galeri</h2>
              </div>

              <div class="owl-carousel owl-theme">
                @foreach ($galleries as $gallery)
                <div class="item" data-fancybox="gallery" href="{{asset($gallery->image)}}">
                  <div class="project-info">
                    <img src="{{asset($gallery->image)}}" class="img-fluid" alt="{{$gallery->name}}">
                    @if ($gallery->description)
                      <p>{{$gallery->description}}</p>
                    @endif
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="resume py-5 d-lg-flex justify-content-center align-items-center" id="resume">
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2 text-center mb-3">
                  <h2>Experience</h2> 
                  <p>{!! setting('experience_description') !!}</p>
                </div>
                <div class="col-lg-6 col-12">
                  <h2 class="mb-4">Catering</h2>

                    <div class="timeline">
                      @foreach ($catherings as $cathering)
                        <div class="timeline-wrapper">
                          <div class="timeline-yr">
                            <span>{{$cathering->year}}</span>
                          </div>
                          <div class="timeline-info">
                            <h3>{{$cathering->name}}</h3>
                            <p>{{$cathering->description}}</p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                  <h2 class="mb-4 mobile-mt-2">Rental</h2>
                    <div class="timeline">
                      @foreach ($rents as $rent)
                        <div class="timeline-wrapper">
                          <div class="timeline-yr">
                            <span>{{$rent->year}}</span>
                          </div>
                          <div class="timeline-info">
                            <h3>{{$rent->name}}</h3>
                            <p>{{$rent->description}}</p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="contact py-5" id="contact">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-5 mr-lg-5 col-12">
            <div class="google-map w-100">
              <iframe src="{!! setting('maps') !!}" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="contact-info d-flex justify-content-between align-items-center py-4 px-lg-5">
                <div class="contact-info-item">
                  <p class="footer-text mb-0">{!! setting('phone_number') !!}</p>
                  <p><a href="mailto:{!! setting('email') !!}">{!! setting('email') !!}</a></p>
                </div>

                {{-- <ul class="social-links">
                     <li><a href="#" class="uil uil-dribbble" data-toggle="tooltip" data-placement="left" title="Dribbble"></a></li>
                     <li><a href="#" class="uil uil-instagram" data-toggle="tooltip" data-placement="left" title="Instagram"></a></li>
                     <li><a href="#" class="uil uil-youtube" data-toggle="tooltip" data-placement="left" title="Youtube"></a></li>
                </ul> --}}
            </div>
          </div>

          <div class="col-lg-6 col-12">
            <div class="contact-form">
              <h2 class="mb-4">{!! setting('contact_title') !!}</h2>

              <form action="{{route('web.inbox')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <input required type="text" class="form-control" name="name" placeholder="Nama anda" id="name">
                    @error('name')
                      <div class="invalid-feedback d-block">{{$message}}</div>
                    @enderror
                  </div>

                  <div class="col-lg-6 col-12">
                    <input required type="email" class="form-control" name="email" placeholder="Email" id="email">
                    @error('email')
                      <div class="invalid-feedback d-block">{{$message}}</div>
                    @enderror
                  </div>

                  <div class="col-12">
                    <textarea required name="message" rows="6" class="form-control" id="message" placeholder="Pesan"></textarea>
                    @error('message')
                      <div class="invalid-feedback d-block">{{$message}}</div>
                    @enderror
                  </div>

                  <div class="ml-lg-auto col-lg-5 col-12">
                    <input type="submit" class="form-control submit-btn" value="Kirim">
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- FOOTER -->
     <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-12">
            <h3>Jam Buka</h3>
            <p>Setiap Hari, 07:00 - 22:00</p>
          </div>
          <div class="col-lg-4 col-12">
            <h3>Kontak Kami</h3>
            <p><i class="uil uil-envelope"></i>{{setting('email')}}</p>
            <p><i class="uil uil-phone"></i>{{setting('phone_number')}}</p>
          </div>
          <div class="col-lg-4 col-12">
            <h3>Alamat</h3>
            <p>{{setting('address')}}</p>
          </div>
          <div class="col-lg-12 col-12 mt-4">                                
            <p class="copyright-text text-center">Copyright &copy; {{date('Y')}} PT. Anandita . All rights reserved</p>
          </div>
        </div>
      </div>
     </footer>

    <script src="{{('web/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{('web/js/popper.min.js')}}"></script>
    <script src="{{('web/js/bootstrap.min.js')}}"></script>
    <script src="{{('web/js/Headroom.js')}}"></script>
    <script src="{{('web/js/jQuery.headroom.js')}}"></script>
    <script src="{{('web/js/owl.carousel.min.js')}}"></script>
    <script src="{{('web/js/smoothscroll.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="{{('web/js/custom.js')}}"></script>

  </body>
</html>