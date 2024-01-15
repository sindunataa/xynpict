<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>XynPict</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets2/img/apple-touch-icon.png ')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets2/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets2/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">XynPict</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="getstarted scrollto" href="/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Get more inspiration with XynPict</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with Bootstrap</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="{{ asset('assets2/img/2802783.jpg')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              Stay in touch with our latest photo collection. We're constantly updating our galleries with the latest content, ensuring you'll always get new inspiration every time you visit our site.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Feel close to each photo through our interactive features.</li>
              <li><i class="ri-check-double-line"></i> Discover beauty in an instant with an easy-to-navigate interface.</li>
              <li><i class="ri-check-double-line"></i> Enjoy the stunning visual beauty through our photo gallery.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              Welcome to a world of stunning visuals! Explore the beauty in every pixel through our photo gallery, where each image tells a unique and unforgettable story. Discover infinite beauty in every click, and enjoy a visual experience that is a feast for your eyes.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->



    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>OUR Albums</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          @foreach ($album as $albums)
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-gallery-line" style="color: #4AA3DF;"></i>
              <h3><a href="">{{$albums->title}}</a></h3>
            </div>
          </div>
              
          @endforeach
    
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="gallery" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Gallery</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach($album as $item)
              <li data-filter=".filter-{{ $item->id }}">{{ $item->title }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
          @foreach($filteredData ?? $galery as $item)
              <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->albums_id }}">
                  <div class="portfolio-wrap">
                      <img src="/image/{{ $item->image }}" class="img-fluid" alt="">
                      <div class="portfolio-info">
                          <h4>{{ $item->name }}</h4>
                          <p>{{ $item->status }}</p>
                          <div class="portfolio-links">
                              <a href="/image/{{ $item->image }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $item->name }}"><i class="bx bx-plus"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>XynPict</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">XynPict</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets2/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('assets2/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets2/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('assets2/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets2/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('assets2/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets2/js/main.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Tangani klik pada elemen li di dalam ul
        $('#portfolioFilter li').click(function() {
            // Ambil nilai yang diklik
            var filterValue = $(this).data('filter');

            // Sembunyikan semua item portofolio
            $('.portfolio-item').hide();

            // Tampilkan item portofolio yang sesuai dengan filter yang dipilih
            $(filterValue).show();
        });
    });
</script>

</body>

</html>