@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","EYLUXLASHES")

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
                                    <a href="{!! route('client.product.detail', $item_feature->slug ) !!}"><img src="{!! asset('public/uploads/'.$item_feature->img_url) !!}" class="img-fluid img-section" alt="{!! ($title = trans('variable.title') ) ? $item_feature->$title : null !!}"></a>
                                    <h4 class="title-product"><a href="{!! route('client.product.detail', $item_feature->slug) !!}">{!! ($name = trans('variable.name') ) ? $item_feature->$name : null !!}</a></h4>
                                    <p class="price">{!! number_format($item_feature->price_vi) !!} vnd</p>
                                    <a href="{!! route('client.product.detail', $item_feature->slug) !!}" class="btn-detail-product btn-addcart">{!! trans('static.detail') !!}</a>
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
                    @if(!$promotion_p->isEmpty())
                    <div class="content-wrapper">

                        <div class="promotion-slick">
                            @foreach($promotion_p as $item_promotion)
                            <div class="item-promotion">
                                <a href="{!! route('client.product.detail', $item_promotion->slug) !!}"> <img src="{!! asset('public/uploads/'.$item_promotion->img_url )!!}" class="img-fluid img-section" alt="{!! ($title = trans('variable.title') ) ? $item_promotion->$title : null !!}"></a>
                                <h4 class="title-product"><a href="{!! route('client.product.detail', $item_promotion->slug) !!}">{!! ($name = trans('variable.name') ) ? $item_promotion->$name : null !!}</a></h4>
                                <p class="price">{!! number_format($item_feature->price_vi) !!} vnd</p>
                                <a href="{!! route('client.product.detail', $item_promotion->slug) !!}" class="btn-detail-promotion btn-addcart">{!! trans('static.detail') !!}</a>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="button-container text-center">
                            <a href="{!! route('client.product.index') !!}" class="btn-more">{!! trans('static.detail') !!}</a>
                        </div>
                    </div>
                    @endif
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
                            <img src="{!! asset('public/assets/client') !!}/images/before.png" class="img-fluid" alt="Before">
                        </div>
                        <div>
                            <img src="{!! asset('public/assets/client') !!}/images/after.png" class="img-fluid" alt="After">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="imageCompare">
                        <div style="display:none">
                            <img src="{!! asset('public/assets/client') !!}/images/before.png" class="img-fluid" alt="Before">
                        </div>
                        <div>
                            <img src="{!! asset('public/assets/client') !!}/images/after.png" class="img-fluid" alt="After">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="imageCompare">
                        <div style="display:none">
                            <img src="{!! asset('public/assets/client') !!}/images/before.png" class="img-fluid" alt="Before">
                        </div>
                        <div>
                            <img src="{!! asset('public/assets/client') !!}/images/after.png" class="img-fluid" alt="After">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="imageCompare">
                        <div style="display:none">
                            <img src="{!! asset('public/assets/client') !!}/images/before.png" class="img-fluid" alt="Before">
                        </div>
                        <div>
                            <img src="{!! asset('public/assets/client') !!}/images/after.png" class="img-fluid" alt="After">
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
            @if(!$fav_p->isEmpty())
            <div class="row">
                @foreach($fav_p as $item_fav)
                <div class="col-md-4">
                    <div class="each-bestSeller">
                        <a href="{!! route('client.product.detail',$item_fav->slug ) !!}"><img src="{!! asset('public/uploads/'.$item_fav->img_url )!!}" class="img-fluid img-section" alt="{!! ($title = trans('variable.title') ) ? $item_fav->$title : null !!}"></a>
                        <h4 class="title-product"><a href="{!! route('client.product.detail',$item_fav->slug ) !!}">{!! ($name = trans('variable.name') ) ? $item_fav->$name : null !!}</a></h4>
                        <p class="price">{!! number_format($item_feature->price_vi) !!} vnd</p>
                        <div class="button-container text-center">
                            <a href="{!! route('client.product.detail',$item_fav->slug ) !!}" class="btn-detail-product btn-addcart">{!! trans('static.detail') !!}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <!-- end -->

    <section class="section photo-home">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <img src="{!! asset('public/assets/client') !!}/images/img-home.png" class="img-fluid mx-auto" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- end -->

    <section class="section video">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="video-container">
                        <div class="title-wrapper text-center">
                            <img src="{!! asset('public/assets/client') !!}/images/video.png" class="img-fluid mx-auto" alt="">
                        </div>
                        <div class="video-wrapper">
                            @if(!$videos->isEmpty())
                                @foreach($videos as $item_video)
                                <div class="video-slick">
                                    <div class="each-video">
                                        <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{!! $item_video->video_url !!}"></div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="photo-container">
                        <div class="title-wrapper  text-center">
                            <img src="{!! asset('public/assets/client') !!}/images/look.png" class="img-fluid mx-auto" alt="">
                        </div>
                        <div class="photo-wrapper">
                            <div class="photo-foot-slick">
                                <div class="item-photo">
                                    <img src="{!! asset('public/assets/client') !!}/images/photo-foot/home-photo01.jpg" class="img-fluid mx-auto" alt="">
                                </div>
                                <div class="item-photo">
                                    <img src="{!! asset('public/assets/client') !!}/images/photo-foot/home-photo02.jpg" class="img-fluid mx-auto" alt="">
                                </div>
                                <div class="item-photo">
                                    <img src="{!! asset('public/assets/client') !!}/images/photo-foot/home-photo03.jpg" class="img-fluid mx-auto" alt="">
                                </div>
                            </div>
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

    <!-- VIDEO -->
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/video/plyr.css">
    <script src="{!! asset('public/assets/client') !!}/js/plugins/video/plyr.min.js"></script>

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

            $('.photo-foot-slick').slick({
                slidesToShow: 1,
                autoplay: true,

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

            $('.video-slick').slick({
                slidesToShow: 1,
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

            /** VIDEO **/
            const player = new Plyr('#player');

            $('.btn-cart').click(function(){
                var product_id = $(this).data('id');
                $.ajax({
                    url: "{!! route('client.addtocart') !!}",
                    type: 'POST',
                    data:{id: product_id},
                    success: function(data){
                        $('#cart-wrapper').html(data.cart_header);
                    }
                })
            })
        })
    </script>
@stop






