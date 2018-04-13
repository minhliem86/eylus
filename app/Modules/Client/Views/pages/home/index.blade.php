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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <!-- SLICK -->
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/slick/slick.css">
    <script src="{!! asset('public/assets/client') !!}/js/plugins/slick/slick.min.js"></script>


    <!-- IMAGE COMPARE -->
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/compare/css/images-compare.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <script src="{!! asset('public/assets/client') !!}/js/plugins/compare/js/jquery.images-compare.js"></script>

    <script>
        $(document).ready(function(){
            $('.featured-product-slick').slick({
                slidesToShow: 3,
                prevArrow: '<span class="btn-control btn-pre"><i class="fa fa-angle-left"></i></span>',
                nextArrow: '<span class="btn-control btn-next"><i class="fa fa-angle-right"></i></span>',
            })

            $('.promotion-slick').slick({
                slidesToShow: 4,
                prevArrow: '<span class="btn-control btn-pre"><i class="fa fa-angle-left"></i></span>',
                nextArrow: '<span class="btn-control btn-next"><i class="fa fa-angle-right"></i></span>',
            })

            $('.imageCompare').imagesCompare()
        })
    </script>
    <title>Document</title>
</head>
<body>
    <div class="page">
        <div class="pre-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <div class="item-wrap">
                                 <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
                            </div>
                            <div class="item-wrap">
                                <a href="#"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                            </div>
                            <div class="item-wrap">
                                <a href="#"><img src="{!! asset('public/assets/client') !!}/images/flag-en.png" class="img-fluid" alt="English"></a>
                                <a href="#"><img src="{!! asset('public/assets/client') !!}/images/flag-vi.png" class="img-fluid" alt="Tiếng Việt"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->

        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo-wrapper">
                            <a href="#"><img src="{!! asset('public/assets/client') !!}/images/logo_bk.png" class="img-fluid" alt="Eylux"></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="navbar-wrapper height d-flex justify-content-md-end align-items-md-end">
                            <nav class="navbar navbar-expand-lg my-navbar ">
                                <div class="collapse navbar-collapse" id="main-menu">
                                    <ul class="navbar-nav nav-menu align-content-end">
                                        <li class="nav-item">
                                            <a href="#">Trang Chủ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#">Về Chúng Tôi</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-toggle" href="#" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Sản Phẩm
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="submenu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                            </div>
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
                                        <li class="nav-item search-item">
                                            <span data-toggle="collapse" data-target="#search-box" aria-controls="search-box"><i class="fa fa-search"></i></span>
                                            <div id="search-box" class="collapse">
                                                <div class="input-group">
                                                    <input type="text" name="search-key" class="form-control">
                                                    <button class="input-group-append" type="submit"><i class="fa fa-search"></i></button>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end -->

        <section class="banner section">
            <div class="container-fluid">
                <div class="row">
                    <img src="{!! asset('public/assets/client') !!}/images/banner-fair.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </section>
        <!-- end -->

        <section class="section feature">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="title-wrapper text-center">
                            <h2 class="title-section">Featured Product</h2>
                        </div>

                        <div class="content-wrapper">
                            <div class="featured-product-slick">
                                <div class="item-feature">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-product btn-addcart">Chi tiết</a>
                                </div>
                                <div class="item-feature">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-product btn-addcart">Chi tiết</a>
                                </div>
                                <div class="item-feature">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-product btn-addcart">Chi tiết</a>
                                </div>
                                <div class="item-feature">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-product btn-addcart">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section promotion">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="title-wrapper text-center">
                            <h2 class="title-section">Promotion Product</h2>
                        </div>

                        <div class="content-wrapper">
                            <div class="promotion-slick">
                                <div class="item-promotion">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-promotion btn-addcart">Chi tiết</a>
                                </div>
                                <div class="item-promotion">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-promotion btn-addcart">Chi tiết</a>
                                </div>
                                <div class="item-promotion">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-promotion btn-addcart">Chi tiết</a>
                                </div>
                                <div class="item-promotion">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-promotion btn-addcart">Chi tiết</a>
                                </div>
                                <div class="item-promotion">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                    <h4 class="title-product">Product 01</h4>
                                    <p class="price">100.000 vnd</p>
                                    <a href="#" class="btn-detail-promotion btn-addcart">Chi tiết</a>
                                </div>
                            </div>

                            <div class="button-container text-center">
                                <a href="#" class="btn-more">Xem thêm sản phẩm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section bg-yellow compare-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="imageCompare">
                            <div style="display:none">
                                <img src="{!! asset('public/assets/client') !!}/images/lego-gray.jpg" class="img-fluid" alt="Before">
                            </div>
                            <div>
                                <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid" alt="After">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="imageCompare">
                            <div style="display:none">
                                <img src="{!! asset('public/assets/client') !!}/images/lego-gray.jpg" class="img-fluid" alt="">
                            </div>
                            <div>
                                <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="imageCompare">
                            <div style="display:none">
                                <img src="{!! asset('public/assets/client') !!}/images/lego-gray.jpg" class="img-fluid" alt="">
                            </div>
                            <div>
                                <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="imageCompare">
                            <div style="display:none">
                                <img src="{!! asset('public/assets/client') !!}/images/lego-gray.jpg" class="img-fluid" alt="">
                            </div>
                            <div>
                                <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end -->

        <section class="section best-seller">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="each-bestSeller">
                            <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                            <h4 class="title-product">Product 01</h4>
                            <p class="price">100.000 vnd</p>
                            <div class="button-container text-center">
                                <a href="#" class="btn-detail-product btn-addcart">Chi tiết</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="each-bestSeller">
                            <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                            <h4 class="title-product">Product 01</h4>
                            <p class="price">100.000 vnd</p>
                             <div class="button-container text-center">
                                <a href="#" class="btn-detail-product btn-addcart">Chi tiết</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="each-bestSeller">
                            <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                            <h4 class="title-product">Product 01</h4>
                            <p class="price">100.000 vnd</p>
                             <div class="button-container text-center">
                                <a href="#" class="btn-detail-product btn-addcart">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end -->

        <section class="section photo-home">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        {{--<img src="{!! asset('public/assets/client') !!}/images/img-home.png" class="img-fluid mx-auto" alt="">--}}
                    </div>
                </div>
            </div>
        </section>
        <!-- end -->

        <section class="section video">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="video-container">
                            <div class="title-wrapper text-center">
                                <img src="{!! asset('public/assets/client') !!}/images/video.png" class="img-fluid mx-auto" alt="">
                            </div>
                            <div class="video-wrapper">

                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="photo-container">
                            <div class="title-wrapper text-center">
                                <img src="{!! asset('public/assets/client') !!}/images/look.png" class="img-fluid mx-auto" alt="">
                            </div>
                            <div class="photo-wrapper">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- end -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-container">
                            <ul class="list-footer">
                                <li class="header">About Eylux</li>
                                <li class="item-footer"><a href="#">Trang chủ</a></li>
                                <li class="item-footer"><a href="#">Giới thiệu</a></li>
                                <li class="item-footer"><a href="#">Khuyến mãi</a></li>
                                <li class="item-footer"><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-container">
                            <ul class="list-footer">
                                <li class="header">Hướng Dẫn</li>
                                <li class="item-footer"><a href="#">Hướng dẫn mưa hàng</a></li>
                                <li class="item-footer"><a href="#">Hướng dẫn thanh toán</a></li>
                                <li class="item-footer"><a href="#">Hướng dẫn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-container">
                            <ul class="list-footer">
                                <li class="header">Sản Phẩm</li>
                                <li class="item-footer"><a href="#">Product 01</a></li>
                                <li class="item-footer"><a href="#">Product 02</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-container">
                            <div class="title-wrapper">
                                <h3 class="title-footer">ĐĂNG KÝ THÔNG TIN</h3>
                                <sup>Đăng ký để nhận thông tin.</sup>
                            </div>
                            <div class="form-wrapper mb-2">
                                {!! Form::open(['route' => 'client.home', 'class' => 'form']) !!}
                                <div class="input-group">
                                    <input type="text" name="subscribe" class="form-control" placeholder="Your Email ..." ria-describedby="inputAppend" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-submit input-group-text"><i class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="icon-footer d-flex justify-content-end">
                                <a href="#" class="ic-wrapper ic-fb"><i class="fa fa-facebook-f"></i></a>
                                <a href="#" class="ic-wrapper ic-yt"><i class="fa fa-youtube"></i></a>
                                <a href="#" class="ic-wrapper ic-tw"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>