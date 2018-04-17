<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&amp;subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/client/css/style.css')}}">

    <!-- SCRIPT -->
    <script src="{{asset('public/assets/client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    @yield("tracking")

    <title>@yield("title", "EXLUX")</title>
</head>
<body>
<div class="page">
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-end ">
                        <div class="item-wrap">
                            <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
                        </div>
                        <div class="item-wrap">
                            <a href="#"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                        </div>
                        <div class="item-wrap">
                            <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><img src="{!! asset('public/assets/client') !!}/images/flag-en.png" class="img-fluid" alt="English"></a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('vi', null, [], true) }}"><img src="{!! asset('public/assets/client') !!}/images/flag-vi.png" class="img-fluid" alt="Tiếng Việt"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("Client::layouts.header")
        @yield('content')
    @include("Client::layouts.footer")
</div>

<script src="{{asset('public/assets/client/js/bootstrap.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield("script")
</body>
</html>
