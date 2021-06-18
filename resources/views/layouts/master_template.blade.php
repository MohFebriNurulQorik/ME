<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Team Developer">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Master Enterprise</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ url('template/assets/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ url('template/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('template/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{ url('template/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('template/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('template/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('template/assets/vendor/select2/dist/css/select2.min.css') }}" />

  <!-- Argon CSS -->
  <link type="text/css" href="{{ url('template/assets/css/argon.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ url('template/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
  <script src="{{ url('template/assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

  @yield('header')
  @yield('style')
  <link type="text/css" href="{{ url('template/assets/css/argon.min5438.css?v=1.2.0') }}" rel="stylesheet">

  <script src="{{ url('template/assets/js/customs/jquery-3.5.1.js') }}"></script>
</head>

<body>
  <!-- Sidenav -->
  <style>
    @media only screen and (max-width: 767px) {
      #gambar{
        height: 87px !important;
      }
    }
  @media only screen and (max-width: 767px) {
    #widgetku{
      display: none;
    }
  }
  @media only screen and (min-width: 768px) {
    #widgetku{
      display: block;
    }
  }
  @media only screen and (min-width: 767px) {
    #widgetku2{
      display: none;
    }
  }
  @media only screen and (max-width: 768px) {
    #widgetku2{
      display: block;
      padding: 61px 31px;
    }
  }
  </style>
  @if($_SERVER['REQUEST_URI']!='/login')
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{ url('template/assets/img/brand/logo.png') }}" id ="gambar" class="navbar-brand-img" alt="...">
          <span style="font-size: 14px;font-weight: bold">Master Enterprise</span>
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          @include('layouts.navbar_items')
        </div>
      </div>
    </div>
  </nav>
  @endif
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @if(Auth::check())
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom" style="border: none !important;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          @include('layouts.nav_top')
        </div>
      </div>
    </nav>
    @endif
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6" >
      <div class="container-fluid" id="widgetku">
        @include('layouts.widget')
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        @yield('content')

      <!-- Footer -->

    </div>
    <div class="container-fluid mt--6" id="widgetku2" style="padding: " >
      @include('layouts.widget')
    </div>
    <div class="container">
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Master Enterprise</a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="copyright text-center  text-sm-right " style="color: #dee2e6">
              by <a href="#" class="font-weight-bold ml-1 " style="color: #adb5bd" target="_blank">Developer Team Master Enterprise</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>


    {{-- {{dd(>unreadNotifications)}} --}}
  @yield('modal')
  <!-- Argon Scripts -->
  <!-- Core -->

  {{-- custom --}}
  <style href="{{ url('template/assets/js/customs//css/editor.dataTables.min.css') }}"></style>


  <script src="{{ url('template/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('template/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ url('template/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ url('template/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
    @yield('footer')
    <script src="{{ url('template/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('template/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('template/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('template/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('template/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('template/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('template/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('template/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ url('template/assets/vendor/select2/dist/js/select2.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ url('template/assets/js/argon.js?v=1.2.0?qweqw') }}"></script>
  <script src="{{ url('template/assets/js/argon.min.js?v=1.2.0?qweqw') }}"></script>
  <script src="{{ url('template/assets/js/argon.min5438.js?v=1.2.0?asdasd') }}"></script>

    @yield('script')
</body>

</html>
