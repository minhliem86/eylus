<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <link rel="stylesheet" href="{{asset('public/assets/client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/client/css/style.css')}}">

    <script src="{{asset('public/assets/client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{asset('public/assets/client/js/bootstrap.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <title>Document</title>
</head>
<body>
    <div class="page">
        <div class="pre-header">

        </div>
        <!-- end -->

        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo-wrapper">
                            <a href="#"><img src="{!! asset('public/assets/client') !!}/images/logo.png" class="img-fluid" alt="Eylux"></a>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end align-content-end">
                        <nav class="navbar navbar-expand-lg my-navbar ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="main-menu">
                                <ul class="navbar-nav nav-menu align-content-end">
                                    <li class="nav-item">
                                        <a href="#">Trang Chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Về Chúng Tôi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Sản Phẩm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Bộ Sưu Tập</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Khuyến Mãi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Liên Hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>
</body>
</html>