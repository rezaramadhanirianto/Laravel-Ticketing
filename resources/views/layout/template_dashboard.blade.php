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
</head>
<body>
    <style>
        .custom-blue{
            background: rgb(103, 119, 239);
        }
        .text-custom-blue{
            color: rgb(103, 119, 239);
        }
        .custom-img{
            background-image: url('{{ asset("img/back.jpg") }}');
            background-position: cover;
            background-repeat: no-repeat;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark bg custom-blue">
        <div class="container">
            <a class="navbar-brand" href="#">@yield("subjudul")</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse float-right d-flex justify-content-end" id="navbarNav" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('logout')}}" class="text-white nav-link">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    @if ($message = Session::get('success'))
    <div class="success" data-flashdata="{{ $message }}"></div>
    @endif
    @if ($message = Session::get('failed'))
    <div class="failed" data-flashdatas="{{ $message }}"></div>
    @endif
    <script>
        $('body').addClass('custom-img');
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