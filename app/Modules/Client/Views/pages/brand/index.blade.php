@extends("Client::layouts.main")

@section("meta")

@stop

@section("title")
    Thương Hiệu Sản Phẩm
@stop
@section("content")
    @include('Client::layouts.banner')

    <section class="section product-template sidebar-template">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @include("Client::layouts.left_sidebar")
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <h4 class="title-brands">{!! ($name = trans('variable.name') ) ? $brand->$name : null !!}</h4>
                        </div>
                    </div>
                    @if(count($brand))
                        @foreach($brand->products()->paginate(15)->chunk(3) as $chunk)
                    <div class="row">
                        @foreach($chunk as $item_product)
                        <div class="col-md-4">
                            <div class="each-element">
                                <div class="content-wrapper">
                                    <div class="item-element">
                                        <div class="img-wrapper">
                                            <img src="{!! asset('public/uploads/'.$item_product->img_url) !!}" class="img-fluid img-section" alt="{!! ($name = trans('variable.name')) ? $item_product->$name : null !!}">
                                            <div class="mask"></div>
                                            <div class="wrap-btn justify-content-center align-items-center d-md-flex flex-column">
                                                <a href="{!! route('client.product.detail',$item_product->slug) !!}" class="btn-detail-product btn-template">{!! trans !!}</a>
                                                <button href="{!! route('client.product.detail',$item_product->slug) !!}" class="btn-template btn-cart" data-id="{!! $item_product->id !!}" type="button">{!! trans('home.add_cart') !!}</button>
                                            </div>
                                        </div>

                                        <h4 class="title-product"><a href="{!! route('client.product.detail',$item_product->slug) !!}">{!! ($name = trans('variable.name')) ? $item_product->$name : null !!}</a></h4>
                                        <p class="price">{!! ( $price = trans('variable.price') ) ? $item_product->$price : null !!} {!! trans('variable.currency') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        @endforeach
                        <div class="row">
                            <div class="col">
                                @include('Client::pagination.boot4', ['paginator' => $brand->products()->paginate(15)])
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop

@section("script")
    <!-- SLICK -->
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/slick/slick.css">
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/slick/slick-theme.css">
    <script src="{!! asset('public/assets/client') !!}/js/plugins/slick/slick.min.js"></script>

    <!-- VIDEO -->
    <link rel="stylesheet" href="{!! asset('public/assets/client') !!}/js/plugins/video/plyr.css">
    <script src="{!! asset('public/assets/client') !!}/js/plugins/video/plyr.min.js"></script>


    <script>
        $(document).ready(function(){
            /** VIDEO **/
            const player = new Plyr('.player-sidebar');

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