@php
use App\Models\Master\Profil;
$profil = Profil::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $profil->profil_nama }} | @yield('title')</title>
  
  <meta content="@yield('description')" name="description">
  <meta content="@yield('description')" name="keywords">

  <meta property="og:title" content="{{ $profil->profil_nama }}">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ $profil->profil_nama }}">
  <meta property="og:url" content="https://tahfizhhamzah.com/">
  <meta property="og:description" content="@yield('description')">
  <meta property="og:type" content="website">
  @if(Request::segment(2) == null || Request::segment(2) == 'kategori' || Request::segment(2) == 'tag')
  <meta property="og:image" content="{{ asset('images/profil/'.$profil->profil_logo)}}">
  @else
  <meta property="og:image" content="{{ asset('images/artikel/'.$artikel->artikel_gambar) }}">
  @endif
  <meta property="fb:app_id" content="123">

  <meta property="twitter:card" content="Taman Tahfizh Al-Qur'an Hamzah">
  <meta property="twitter:url" content="https://tahfizhhamzah.com/">
  <meta property="twitter:title" content="Taman Tahfizh Al-Qur'an Hamzah">
  <meta name="twitter:site" content="@taman_tahfizh_alquran_hamzah" />
  <meta property="twitter:description" content="@yield('description')">
  @if(Request::segment(2) == null || Request::segment(2) == 'kategori' || Request::segment(2) == 'tag')
  <meta property="og:image" content="{{ asset('images/profil/'.$profil->profil_logo)}}">
  @else
  <meta property="og:image" content="{{ asset('images/artikel/'.$artikel->artikel_gambar) }}">
  @endif
  <meta name="twitter:creator" content="@taman_tahfizh_alquran_hamzah" />

  <!-- Favicons -->
  <link href="{{ asset('images/profil/'.$profil->profil_favicon) }}" rel="icon">
  <link href="{{ asset('images/profil/'.$profil->profil_favicon) }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v2.2.1
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('front.index') }}" class="logo mr-auto"><img src="{{ asset('images/profil/'.$profil->profil_logo) }}" alt="" class="img-fluid"></a>
      <!-- <h1 class="logo mr-auto"><a href="{{ route('front.index') }}">{{ $profil->profil_nama }}</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="{{ route('front.index') }}">Home</a></li>
          <li><a href="{{ route('front.index') }}#about">Tentang</a></li>
          <li><a href="{{ route('front.index') }}#services">Program</a></li>
          <li><a href="{{ route('front.index') }}#portfolio">Kegiatan</a></li>
          <li><a href="{{ route('front.index') }}#team">Guru</a></li>
          <li><a href="{{ route('front.index') }}#contact">Kontak</a></li>
          <li class="active"><a href="{{ route('front.artikel') }}">Artikel</a></li>
          <li><a class="btn btn-success btn-lg px-3 py-1 mb-1 text-white" href="{{ url('/login') }}">Masuk</a></li>
          <li><a class="btn btn-primary btn-lg px-3 py-1 text-white" href="{{ url('/register') }}">Daftar</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Tahfizh Hamzah</h3>
            <p>
              Komplek D U F C 5, Jl. Pasir Leutik, Sukapada, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40125 <br><br>
              <strong>Phone: </strong><a href="http://wa.me/{{ $profil->profil_no }}" target="_blank">+{{ $profil->profil_no }}</a><br>
              <strong>Email:</strong> tahfizhhamzah@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/login') }}">Login</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/register') }}">Daftar</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('front.artikel') }}">Artikel</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Tentang Kami</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('front.index') }}#about">Tentang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('front.index') }}#services">Program</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('front.index') }}#portfolio">Kegiatan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('front.index') }}#team">Guru</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('front.index') }}#contact">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Developer</h4>
            <p>Sistem / aplikasi ini dibuat oleh Bambang K. Apr</p>
            <div class="social-links text-center text-md-left pt-3 pt-md-0">
              <a href="https://twitter.com/AprBambang" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/bambang.kusnendiapr.7/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/bambangkusnendiapr/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.linkedin.com/in/bambang-kusnendi-apr-b8799a172/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Tempo</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('front/assets/js/main.js') }}"></script>
  @stack('script')

</body>

</html>