@extends('layout.template')
@section('judul')
    TICKETING | Register
@endsection
@section('content')
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
    <div class="row" style="margin-right: 0px">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h1 class="text-custom-blue m-3 text-center" style="text-shadow: 1px 1px 5px #000;">TICKETING</h1>
            <div class="bg-white rounded mt-2">
                <div class="custom-blue p-2">
                    <h2 class="text-white text-center">SIGN IN</h2>
                </div>
                <div class="bg-white p-2">
                    <form action="register/post" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input required type="text" placeholder="Nama" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input required type="email" placeholder="Email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor Telp :</label>
                            <input required type="number" placeholder="Nomor Telp" name="nomor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input required type="password" placeholder="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password :</label>
                            <input required type="password" placeholder="Confirm Password" name="cpassword" class="form-control">
                        </div>
                        <button class="btn custom-blue text-white">Sign In </button>
                    </form>
                        <a href="login" class="text-custom-blue">Have an account? click here!</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('body').addClass('custom-img');
    </script>
@endsection