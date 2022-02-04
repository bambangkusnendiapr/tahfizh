<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>{{ $profil->profil_nama }} | Official Website</title>
  <meta content="Taman tahfizh al-qur'an hamzah, tahfizh qur'an, taman tahfizh, hafizh qur'an, hafal qur'an, taman hamzah, taman qur'an, tempat menghafal al'quran" name="description">
  <meta content="Taman tahfizh al-qur'an hamzah,tahfizh qur'an,taman tahfizh,hafizh qur'an,hafal qur'an,taman hamzah,taman qur'an,tempat menghafal al'quran" name="keywords">

  <meta property="og:title" content="{{ $profil->profil_nama }}">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ $profil->profil_nama }}">
  <meta property="og:url" content="https://tahfizhhamzah.com/">
  <meta property="og:description" content="Taman tahfizh al-qur'an hamzah, tahfizh qur'an, taman tahfizh, hafizh qur'an, hafal qur'an, taman hamzah, taman qur'an, tempat menghafal al'quran">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('images/profil/'.$profil->profil_logo)}}">
  <meta property="fb:app_id" content="123">

  <meta property="twitter:card" content="Taman Tahfizh Al-Qur'an Hamzah">
  <meta property="twitter:url" content="https://tahfizhhamzah.com/">
  <meta property="twitter:title" content="Taman Tahfizh Al-Qur'an Hamzah">
  <meta name="twitter:site" content="@taman_tahfizh_alquran_hamzah" />
  <meta property="twitter:description" content="Taman tahfizh al-qur'an hamzah, tahfizh qur'an, taman tahfizh, hafizh qur'an, hafal qur'an, taman hamzah, taman qur'an, tempat menghafal al'quran">
  <meta property="twitter:image" content="{{ asset('images/profil/'.$profil->profil_logo)}}">
  <meta name="twitter:creator" content="@taman_tahfizh_alquran_hamzah" />

  <!-- Favicons -->
  <link href="{{ asset('images/profil/'.$profil->profil_logo)}}" rel="icon">
  <link href="{{ asset('images/profil/'.$profil->profil_logo)}}" rel="apple-touch-icon">

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
  <style>
  .tombol {
    margin-top: -9px;
  }

  @media screen and (max-width: 768px) {
    .tombol {
      margin: 10px 10px 0px;
    } 
  }
  </style>

  <!-- =======================================================
  * Template Name: Tempo - v2.2.1
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('front.index') }}" class="logo mr-auto"><img src="{{ asset('images/profil/'.$profil->profil_logo)}}" alt="" class="img-fluid"></a>
      <!-- <h3 class="logo mr-auto"><a href="{{ route('front.index') }}">{{ $profil->profil_nama }}</a></h3> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Program</a></li>
          <li><a href="#portfolio">Kegiatan</a></li>
          <li><a href="#team">Guru</a></li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="{{ route('front.artikel') }}">Artikel</a></li>
          <li class="tombol"><a class="btn btn-success btn-lg px-5 py-2 mb-1 text-white" href="{{ url('/login') }}">Masuk</a></li>
          <li class="tombol"><a class="btn btn-primary btn-lg px-5 py-2 text-white" href="{{ url('/register') }}">Daftar</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h3>Selamat Datang di</h3>
      <h1>Taman Tahfizh Al-Quran Hamzah</h1>
      <h2>Menjadikan Al-qur'an bagian dari kehidupan</h2>
      <a href="#about" class="btn-get-started scrollto">Tentang Kami</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Tentang Kami</h2>
          <h3>Taman Tahfizh Al-Qur'an <span>Hamzah</span></h3>
          <p>Menjadikan Al-qur'an bagian dari kehidupan</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <img src="{{ asset('front/assets/img/about.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Taman Tahfizh Al-Qur'an Hamzah adalah lembaga khusus untuk menghafal qur'an untuk anak-anak, remaja dan dewasa. Kami menanamkan kepada para santri untuk bisa:
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Menjadikan Al-qur'an bagian dari kehidupan</li>
              <li><i class="ri-check-double-line"></i> Mewujudkan jiwa kepemimpinan sekaligus sebagai hafizh qur'an</li>
              <li><i class="ri-check-double-line"></i> Sebaik-baik kamu orang yang belajar Al-Qur'an dan mengajarkannya (HR. Bukhari)</li>
            </ul>
            <p>
              Jangan Tunda! Menghafal Al-Qur'an adalah amalan yang tidak mengenal kata terlambat, namun ketika ada waktu luang dan kesempatan jangan ditunda-tunda hafalkan sekarang selagi Allah masih memberikan nafas kepada kita.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Program</h2>
          <h3>Program-program <span>Kami</span></h3>
          <p>Untuk mewujudkan Al-Qur'an bagian dari kehidupan kami membagi dalam beberapa program diantaranya</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-user-circle"></i></div>
              <h4 class="title"><a href="">Kelas Balita</a></h4>
              <p class="description">Kelas ini untuk anak umur dibawah 5 tahun</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-user-rectangle"></i></div>
              <h4 class="title"><a href="">Kelas Anak-anak</a></h4>
              <p class="description">Kelas ini untuk anak umur 6-12 tahun</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-user"></i></div>
              <h4 class="title"><a href="">Kelas Remaja</a></h4>
              <p class="description">Kelas ini untuk remaja umur 13-18 tahun</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-user"></i></div>
              <h4 class="title"><a href="">Kelas Dewasa</a></h4>
              <p class="description">Kelas ini untuk orang umur diatas 19 tahun</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3>Mari Bergabung bersama kami</h3>
          <p> Jika anda tertarik atau anak anda ingin dititipkan kepada kami silahkan daftarkan</p>
          <a class="cta-btn" href="{{ url('/register') }}">Daftar</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Kegiatan</h2>
          <h3>Lihat Kegiatan <span>Kami</span></h3>
          <p>Ini adalah dokumentasi kegiatan kami</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Tahfizh</li>
              <li data-filter=".filter-card">Pengajian</li>
              <li data-filter=".filter-web">Camping</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('front/assets/img/portfolio/Slide1.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Tahfizh</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide1.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('front/assets/img/portfolio/Slide2.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Tahfizh</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide2.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{ asset('front/assets/img/portfolio/Slide3.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Pengajian</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide3.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('front/assets/img/portfolio/Slide4.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Tahfizh</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide4.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('front/assets/img/portfolio/Slide5.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Tahfizh</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide5.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{ asset('front/assets/img/portfolio/Slide6.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Camping</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide6.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('front/assets/img/portfolio/Slide7.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Tahfizh</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide7.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('front/assets/img/portfolio/Slide8.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Tahfizh</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide8.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('front/assets/img/portfolio/Slide9.jpg') }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Tahfizh</h4>
              <a href="{{ asset('front/assets/img/portfolio/Slide9.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title">
          <h2>Pertanyaan Umum</h2>
          <h3>Pertanyaan Umum</h3>
        </div>

        <ul class="faq-list">

          <li>
            <a data-toggle="collapse" class="" href="#faq1">Apa itu Taman Tahfizh Qur'an Hamzah? <i class="icofont-simple-up"></i></a>
            <div id="faq1" class="collapse show" data-parent=".faq-list">
              <p>
                Taman Tahfizh Qur'an Hamzah adalah lembaga khusus tempat menghafal Al-Qur'an
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">Siapa saja yang bisa ikut bergabung? <i class="icofont-simple-up"></i></a>
            <div id="faq2" class="collapse" data-parent=".faq-list">
              <p>
                Siapapun bisa bergabung mulai dari balita hingga dewasa.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">Berapa Biayanya? <i class="icofont-simple-up"></i></a>
            <div id="faq3" class="collapse" data-parent=".faq-list">
              <p>
                Untuk biaya cukup terjangakau hanya Rp. 100.000,- per bulan untuk 1 santri
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">Apa keunggulan lembaga ini? <i class="icofont-simple-up"></i></a>
            <div id="faq4" class="collapse" data-parent=".faq-list">
              <p>
                1. Keunggulan lembaga kami adalah metode yang diberikan menyesuaikan usia dan kemampuan santri.<br>
                2. Lembaga kami dilengkapi dengan sistem aplikasi website untuk memantau bacaan, hafalan dan murajaah quran secara realtime dapat dilihat di www.tahfizhhamzah.com
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Guru</h2>
          <h3>Guru Handal <span>Kami</span></h3>
          <p>Guru sebagai tenaga pengajar untuk membimbing santrinya berprestasi.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('front/assets/img/team/Slide1.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="#"><i class="icofont-twitter"></i></a>
                  <a href="#"><i class="icofont-facebook"></i></a>
                  <a href="#"><i class="icofont-instagram"></i></a>
                  <a href="#"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Namikaze Minato</h4>
                <span>Hokage Ke-4</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('front/assets/img/team/Slide2.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="#"><i class="icofont-twitter"></i></a>
                  <a href="#"><i class="icofont-facebook"></i></a>
                  <a href="#"><i class="icofont-instagram"></i></a>
                  <a href="#"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Hatake Kakashi</h4>
                <span>Hokage Ke-6</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('front/assets/img/team/Slide3.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="#"><i class="icofont-twitter"></i></a>
                  <a href="#"><i class="icofont-facebook"></i></a>
                  <a href="#"><i class="icofont-instagram"></i></a>
                  <a href="#"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Uchiha Sasuke</h4>
                <span>Bayangan Hokage Ke-7</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('front/assets/img/team/Slide4.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="#"><i class="icofont-twitter"></i></a>
                  <a href="#"><i class="icofont-facebook"></i></a>
                  <a href="#"><i class="icofont-instagram"></i></a>
                  <a href="#"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Uzumaki Naruto</h4>
                <span>Hokage Ke-7</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Kontak</h2>
          <h3>Kontak <span>Kami</span></h3>
          <p>Untuk lebih jelasnya silahkan hubungi kontak kami dibawah ini.</p>
        </div>

        <div>
          <!-- <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.986758919582!2d107.64607691390844!3d-6.892186595019731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e734c4dd42a5%3A0x236ea3dced439344!2sTaman%20Tahfidz%20Qur&#39;an%20Hamzah!5e0!3m2!1sen!2sid!4v1624870330983!5m2!1sen!2sid" style="border:0; width: 100%; height: 270px;" allowfullscreen= frameborder="0"></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Lokasi:</h4>
                <p>Komplek D U F C 5, Jl. Pasir Leutik, Sukapada, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40125</p>
              </div>

            </div>

          </div>

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>tahfizhhamzah@gmail.com</p>
              </div>

            </div>

          </div>

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-phone"></i>
                <h4>Kontak (WhatsApp):</h4>
                <p><a href="http://wa.me/{{ $profil->profil_no }}" target="_blank">+{{ $profil->profil_no }}</a></p>
              </div>

            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Tentang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Program</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Kegiatan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Guru</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
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

</body>

</html>