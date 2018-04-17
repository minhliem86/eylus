@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","abc")

@section("content")
    @include("Client::layouts.banner")
    <section class="section feature">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-wrapper text-center">
                        <h2 class="title-section">{!! trans('home.feature_product') !!}</h2>
                    </div>

                    <div class="content-wrapper">
                        @if(!$feature_p->isEmpty())
                            <div class="featured-product-slick">
                                @foreach($feature_p as $item_feature)
                                <div class="item-feature">
                                    <img src="{!! asset($item_feature->img_url) !!}" class="img-fluid img-section" alt="{!! $item_feature->name_vi !!}">
                                    <h4 class="title-product">{!! $item_feature->name_vi !!}</h4>
                                    <p class="price">{!! number_format($item_feature->price_vi) !!} vnd</p>
                                    <a href="#" class="btn-detail-product btn-addcart">{!! trans('home.add_cart') !!}</a>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section promotion ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-wrapper text-center">
                        <h2 class="title-section">{!! trans('home.promotion_product') !!}</h2>
                    </div>

                    <div class="content-wrapper">
                        <div class="promotion-slick">
                            <div class="item-promotion">
                                <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                <h4 class="title-product">Product 01</h4>
                                <p class="price">100.000 vnd</p>
                                <a href="#" class="btn-detail-promotion btn-addcart">{!! trans('home.add_cart') !!}</a>
                            </div>
                        </div>

                        <div class="button-container text-center">
                            <a href="#" class="btn-more">{!! trans('home.readmore') !!}</a>
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
                <div class="col">
                    <div class="title-wrapper text-center">
                        <h2 class="title-section">{!! trans('home.fav_product') !!}</h2>
                    </div>
                </div>
            </div>
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
@stop

@section("script")
    <!-- SLICK -->
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/slick/slick.css">
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/slick/slick-theme.css">
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
                responsive: [
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots  : true
                        }
                    }
                ]
            })

            $('.promotion-slick').slick({
                slidesToShow: 4,
                prevArrow: '<span class="btn-control btn-pre"><i class="fa fa-angle-left"></i></span>',
                nextArrow: '<span class="btn-control btn-next"><i class="fa fa-angle-right"></i></span>',
                responsive: [
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true
                        }
                    }
                ]
            })

            $('.imageCompare').imagesCompare()
        })
    </script>
@stop






