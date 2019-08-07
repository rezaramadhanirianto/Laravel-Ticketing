<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("judul")</title>
    <link rel="stylesheet" href="{{ asset('module/css/bootstrap.min.css') }}">
    <script src="{{ asset('module/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('module/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('getisla/dist/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('getisla/dist/modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('getisla/dist/modules/weather-icon/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('getisla/dist/modules/weather-icon/css/weather-icons-wind.min.css')}}">
    <link rel="stylesheet" href="{{ asset('getisla/dist/modules/summernote/summernote-bs4.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('getisla/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('getisla/dist/css/components.css')}}">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li>
                        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fa fa-bars"></i></a>
                    </li>
                </ul>
            </form>
        <ul class="navbar-nav navbar-right">
        <li class="dropdown">
                <a href="logout"  class="nav-link  nav-link-lg nav-link-user">
                        Log out
                </a>
            </li>
        </ul> 
      </nav>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="">TICKETING</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="">TICK</a>
            </div>
            <ul class="sidebar-menu">

                <li class="menu-header">Main</li>
                    <li class="dropdown @yield('bis')">
                        <a href="admin" class="nav-link "><i class="fa fa-columns"></i> <span>Form Bis</span></a>       
                    </li>
                    <li class="dropdown @yield('jadwal')">
                        <a href="jadwal" class="nav-link "><i class="fa fa-columns"></i> <span>Form Jadwal</span></a>       
                    </li>
                    <li class="dropdown @yield('tujuan')">
                        <a href="kota-tujuan" class="nav-link "><i class="fa fa-columns"></i> <span>Form Kota Tujuan</span></a>       
                    </li>
                    <li class="dropdown @yield('berangkat')">
                        <a href="kota-berangkat" class="nav-link "><i class="fa fa-columns"></i> <span>Form Kota Berangkat</span></a>       
                    </li>
                    <li class="dropdown @yield('pembayaran')">
                        <a href="konfirmasi-pembayaran" class="nav-link "><i class="fa fa-columns"></i> <span>Form Pembayaran</span></a>       
                    </li>
                    <li class="dropdown @yield('user')">
                        <a href="user" class="nav-link "><i class="fa fa-users"></i> <span>Form Users</span></a>       
                    </li>
            </ul>
        </aside>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            @if ($message = Session::get('success'))
                <div class="success" data-flashdata="{{ $message }}"></div>
            @endif
            @if ($message = Session::get('failed'))
                <div class="failed" data-flashdata="{{ $message }}"></div>
            @endif
            @yield('content')
        </section>
    </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div>
        </div>
        <div class="footer-right">
          v1.0.0
        </div>
      </footer>
    </div>
  </div>

    @if ($message = Session::get('success'))
    <div class="success" data-flashdata="{{ $message }}"></div>
    @endif
    @if ($message = Session::get('failed'))
    <div class="failed" data-flashdatas="{{ $message }}"></div>
    @endif

        <script src="{{ asset('getisla/dist/modules/jquery.min.js')}}"></script>
        <script src="{{ asset('getisla/dist/modules/popper.js')}}"></script>
        <script src="{{ asset('getisla/dist/modules/tooltip.js')}}"></script>
        <script src="{{ asset('getisla/dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('getisla/dist/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{ asset('getisla/dist/modules/moment.min.js')}}"></script>
        <script src="{{ asset('getisla/dist/js/stisla.js')}}"></script>
        <!-- Page Specific JS File -->
        <!-- <script src="{{ asset('getisla/dist/js/page/dashboard-general.js')}}"></script> -->
        
        <!-- Template JS File -->
        <script src="{{ asset('getisla/dist/js/scripts.js')}}"></script>
        <script src="{{ asset('getisla/dist/js/custom.js')}}"></script>

    <script>
        const flashdata = $('.success').data('flashdata');
        const flashdatas = $('.failed').data('flashdatas');
        if(flashdata)
        {
            swal({
                title: 'Success',
                text: flashdata,
                type: 'success',
            })
        }
        if(flashdatas)
        {
            swal({
                title: 'Failed',
                text: flashdatas,
                type: 'error',
            })
        }
    </script>
</body>
</html>
