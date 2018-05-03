@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Danh Mục Sản Phẩm")

@section("content")
    @include('Client::layouts.banner')

    <section class="section product-template sidebar-template">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @include("Client::layouts.left_sidebar")
                </div>
                <div class="col-md-8">
                    @if(count($cate))
                        @foreach($cate->brands()->paginate(15)->chunk(3) as $chunk)
                    <div class="row">
                        @foreach($chunk as $item_brand)
                        <div class="col-md-4">
                            <div class="each-element">
                                <div class="content-wrapper">
                                    <div class="item-element">
                                        <div class="img-wrapper">
                                            <img src="{!! asset($item_brand->img_url) !!}" class="img-fluid img-section" alt="{!! ($name = trans('variable.name')) ? $item_brand->$name : null !!}">
                                            <div class="mask"></div>
                                            <div class="wrap-btn justify-content-center align-items-center d-md-flex flex-column">
                                                <a href="{!! route('client.brand', $item_brand->slug) !!}" class="btn-detail-product btn-template">Chi tiết</a>
                                                {{--<a href="#" class="btn-template btn-cart">Mua Ngay</a>--}}
                                            </div>
                                        </div>

                                        <h4 class="title-product"><a href="{!! route('client.brand', $item_brand->slug) !!}">{!! ($name = trans('variable.name')) ? $item_brand->$name : null !!}</a></h4>
                                        {{--<p class="price">100.000 vnd</p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        @endforeach
                        <div class="row">
                            <div class="col">
                                @include('Client::pagination.boot4', ['paginator' => $cate->brands()->paginate(15)])
                            </div>
                        </div>
                    @else
                        <h4 class="title">Sản phẩm đang được cập nhật</h4>
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
        })
    </script>
@stop