<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Secure Me</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('') }}assets/frontend/img/favicon.png" rel="icon">
  <link href="{{ asset('') }}assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Vendor CSS Files -->
  <link href="{{ asset('') }}assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/frontend/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/css/select2.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('') }}assets/frontend/css/style.css" rel="stylesheet">

  @stack('css')

</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.frontend.nav')
  <!-- End Header -->
  
@if (Request::segment(1) == null)
<!-- ======= Emergency Section ======= -->
  @include('layouts.frontend.emergency')

<!-- End Emergency -->
@endif

  <main id="main">

    @yield('content')

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  @include('layouts.frontend.footer')


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('') }}assets/frontend/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="{{ asset('') }}assets/frontend/vendor/aos/aos.js"></script>
  <script src="{{ asset('') }}assets/frontend/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('') }}assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('') }}assets/frontend/vendor/purecounter/purecounter.js"></script>
  <script src="{{ asset('') }}assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('') }}assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{{ asset('') }}assets/frontend/js/main.js"></script>
  <script src="{{ asset('') }}assets/js/jquery.min.js"></script>
  <script src="{{ asset('') }}assets/js/select2.min.js"></script>
  
  @stack('js')

</body>

</html>