<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Presensi Himaster</title>
  <link rel="stylesheet" href="{{asset('assets/css/input.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">

  <link rel="shortcut icon" href="{{asset('img/HIMASTER.ico')}}">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <style>
      .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
            background-color: #ce8232 !important;
        }
        .text-primary, .text-primary:hover, .text-primary:active, .text-primary:visited {
            color : #ce8232 !important;
        }
  </style>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
      <div class="container">
        <a href="#" class="navbar-brand">Pre<span class="text-primary">sensi.</span> (Beta Version 1.4)</a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                @if (Auth::check())
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary ml-lg-2" type="submit">Logout</button>
                </form>
                @else
                <a class="btn btn-primary ml-lg-2" href="{{route('login')}}">Login</a>
                @endif
            </li>
          </ul>
        </div>

      </div>
    </nav>
    @yield('content')
  </header>

  <div class="page-section">
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1 class="mx-auto">Kegiatan yang kamu ikuti</h1>
        </div>
      <div class="row">
        @if (Auth::check())
            @foreach ($event as $event)
            @if ($event->status == 0)
                @continue
            @else
            <div class="col-lg-4 mx-auto">
            <div id="jadwal" class="card-service wow fadeInUp">
                <div class="header">
                <img src="{{asset('assets/img/services/service-1.svg')}}" alt="">
                </div>
                <div class="body">
                <h5 class="text-secondary">{{$event->name}}</h5>
                <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
            </div>
            @endif
            @endforeach
            <div class="col-lg-4 mx-auto">
                <div id="jadwal" class="card-service wow fadeInUp">
                    <div class="header">
                    <img src="{{asset('assets/img/services/service-1.svg')}}" alt="">
                    </div>
                    <div class="body">
                    <h5 class="text-secondary">Masukan kode anda</h5>
                    <p>Masukan kode kegiatan baru anda</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-event-code">
                        Go!!
                      </button>
                    </div>
                </div>
                </div>

            <!-- Modal -->
                <div class="modal fade" id="modal-event-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Masukan kode kegiatan kamu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('addEvent')}}" method="post" enctype="multipart/form">
                                <input type="text" class="form-control" name="check_code" placeholder="contoh : cx2qqw">
                                <button type="submit" class="btn btn-warning btn-block mt-2"> Simpan</button>
                              </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
        @else
        <div class="col-lg-4 mx-auto">
            <div id="jadwal" class="card-service wow fadeInUp">
                <div class="header">
                <img src="{{asset('assets/img/services/service-1.svg')}}" alt="">
                </div>
                <div class="body">
                <h5 class="text-secondary">Silakan Login terlebih dahulu</h5>
                <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                </div>
            </div>
            </div>
        @endif

      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <footer class="page-footer bg-image" style="background-image: url({{asset('assets/img/world_pattern.svg')}});">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-3 py-3 mx-auto">
          <h3>KEILMUAN HIMASTER</h3>
          <p>Website masih dalam tahap pengembangan</p>

          <div class="social-media-button">
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#"><span class="mai-logo-instagram"></span></a>
            <a href="#"><span class="mai-logo-youtube"></span></a>
          </div>
        </div>
        {{-- <div class="col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Help & Support</a></li>
          </ul>
        </div> --}}
        <div class="col-lg-3 py-3 mx-auto">
          <h5>Contact Us</h5>
          <p>Tanjungpura University, Pontianak, Indonesia. <br> Right by Gedung Prodi Sistem Komputer</p>
          <a href="#" class="footer-link">himaster@fmipa.untan.ac.id</a>
        </div>
        {{-- <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <p>Get updates, news or events on your mail.</p>
          <form action="#">
            <input type="text" class="form-control" placeholder="Enter your email..">
            <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
          </form>
        </div> --}}
      </div>

      <p class="text-center" id="copyright">Copyright &copy; Keilmuan <a href="https://himaster.id" target="_blank">Himaster</a>  2022 </p>
    </div>
  </footer>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/google-maps.js')}}"></script>

<script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/js/theme.js')}}"></script>

@include('sweetalert::alert')
</body>
</html>
