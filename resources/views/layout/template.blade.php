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
    
    @yield('content')

    @if ($message = Session::get('success'))
    <div class="success" data-flashdata="{{ $message }}"></div>
    @endif
    @if ($message = Session::get('failed'))
    <div class="failed" data-flashdatas="{{ $message }}"></div>
    @endif

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