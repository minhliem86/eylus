<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <link href="{!! asset('public/favi.png') !!}" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&amp;subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/aos/aos.css">
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/alertify/alertify.css">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/client/js/plugins/revslider') !!}/css/settings.css" media="screen" />

    <link rel="stylesheet" href="{{asset('public/assets/client/css/style.css')}}">

    <!-- SCRIPT -->
    <script src="{{asset('public/assets/client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{!! asset('public/assets/client') !!}/js/plugins/aos/aos.js"></script>
    <script src="{!! asset('public/assets/client') !!}/js/plugins/alertify/alertify.js"></script>

    <!-- jQuery REVOLUTION Slider  -->
    <script type="text/javascript" src="{!! asset('public/assets/client/js/plugins/revslider') !!}/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{!! asset('public/assets/client/js/plugins/revslider') !!}/js/jquery.themepunch.revolution.min.js"></script>

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
                            @if(!Auth::guard('customer')->check())
                            <a href="{!! route('client.auth.login') !!}"><i class="fa fa-user"></i> {!! trans('menu.login') !!}</a>
                            @else
                                <div class="dropdown">
                                    <p class="dropdown-toggle customer-name"  id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! Auth::guard('customer')->user()->name !!}</p>
                                    <div class="dropdown-menu" aria-labelledby="dropdownProfile">
                                        <a class="dropdown-item" href="{!! route('client.auth.profile') !!}">{!! trans('user.profile') !!}</a>
                                        {{--<a class="dropdown-item" href="#">{!! trans('user.order') !!}</a>--}}
                                        <a class="dropdown-item" href="{!! route('client.auth.logout') !!}">{!! trans('user.logout') !!}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="item-wrap" id="cart-wrapper">
                            @include("Client::ajax.cart_header")
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

    $(document).ready(function(){
        @if(session('success'))
            alertify.success("{!! session()->get('success') !!}");
        @endif

        @if(session('error'))
            alertify.error("{!! session()->get('error') !!}");
        @endif
    })

</script>

@yield("script")
<script>
    $(document).ready(function(){
        //BANNER
        $('#banner-slider').show().revolution({
            sliderLayout: 'auto',
            startwidth:1920,
            startheight:500,
            startWithSlide:0,
            responsiveLevels: [1240, 1024, 778, 480],
            gridwidth:[1240, 1024, 778, 480],
            gridheight:[450, 430, 450, 500],
        })
    })
</script>
</body>
</html>
