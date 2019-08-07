@extends('layout.template')
@section('judul')
    TICKETING | Login
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
                    <h2 class="text-white text-center">LOG IN</h2>
                </div>
                <div class="bg-white p-2">
                    <form action="login/post" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Email :</label>
                            <input required type="email" placeholder="username" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Password :</label>
                            <input required type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                        <button class="btn custom-blue text-white">Log In </button>
                    </form>
                        <a href="register" class="text-custom-blue">Dont have an account? click here!</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('body').addClass('custom-img');
    </script>
@endsection