<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Presensi Himaster</title>

  <link rel="stylesheet" href="{{asset('assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/input.scss')}}">

  <style>
      .text-main{
          color: #E9D2A3;
      }
  </style>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
      <div class="container">
        <a href="#" class="navbar-brand">Pre<span class="text-primary">sensi.</span></a>

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
            <div class="col-lg-4">
            <div id="jadwal" class="card-service wow fadeInUp">
                <div class="header">
                <img src="{{asset('assets/img/services/service-1.svg')}}" alt="">
                </div>
                <div class="body">
                <h5 class="text-secondary">{{$event->name}}</h5>
                <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                <a href="service.html" class="btn btn-primary">Read More</a>
                </div>
            </div>
            </div>
            @endforeach
        @else
        <div class="col-lg-4">
            <div id="jadwal" class="card-service wow fadeInUp">
                <div class="header">
                <img src="{{asset('assets/img/services/service-1.svg')}}" alt="">
                </div>
                <div class="body">
                <h5 class="text-secondary">Silakan Login terlebih dahulu</h5>
                <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                <a href="service.html" class="btn btn-primary">Read More</a>
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
        <div class="col-lg-3 py-3">
          <h3>SEOGram</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero amet, repellendus eius blanditiis in iusto eligendi iure.</p>

          <div class="social-media-button">
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#"><span class="mai-logo-instagram"></span></a>
            <a href="#"><span class="mai-logo-youtube"></span></a>
          </div>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Help & Support</a></li>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Contact Us</h5>
          <p>203 Fake St. Mountain View, San Francisco, California, USA</p>
          <a href="#" class="footer-link">+00 1122 3344 5566</a>
          <a href="#" class="footer-link">seogram@temporary.com</a>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <p>Get updates, news or events on your mail.</p>
          <form action="#">
            <input type="text" class="form-control" placeholder="Enter your email..">
            <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
          </form>
        </div>
      </div>

      <p class="text-center" id="copyright">Copyright &copy; 2021. Mada Iqbal <a href="https://himaster.id/" target="_blank">Semester Proyek</a></p>
    </div>
  </footer>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/google-maps.js')}}"></script>

<script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/js/theme.js')}}"></script>

</body>
</html>
