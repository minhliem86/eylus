@extends('Client::layouts.main')

@section('content')
    @include('Client::layouts.banner')

    <section class="section product-template sidebar-template search-page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @include("Client::layouts.left_sidebar")
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <h4 class="title-brands">Kết quả tìm với từ khóa: <b>{!! $keyword !!}</b></h4>
                        </div>
                    </div>
                    @if(count($product))
                    <div class="row">
                        @foreach($product as $item_product)
                        <div class="col">
                            <div class="each-search">
                                <div class="media">
                                    <a href="{!! route('client.product.detail', $item_product->slug) !!}"><img src="{!! asset('public/uploads/'.$item_product->img_url) !!}" style="max-width:180px" class="img-fluid mr-3" alt="{!! ($name = trans('variable.name')) ? $item_product->$name : null !!}"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="{!! route('client.product.detail', $item_product->slug) !!}">{!! ($name = trans('variable.name')) ? $item_product->$name : null !!}</a></h5>
                                        <div class="media-content">
                                            <a href="{!! route('client.product.detail', $item_product->slug) !!}">
                                                {!! ($content = trans('variable.content')) ? Str::words($item_product->$content, 30) : null !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="row">
                        <div class="col">
                            <h4 class="result-search">Hiện từ khóa bạn tìm kiếm không tồn tại. Bạn có thể xem thêm sản phẩm trên website chúng tôi. </h4>
                            <div class="btn-wrapper  my-3">
                                <a class="btn btn-sp" href="{!! route('client.product.index') !!}">{!! trans('menu.product') !!}</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop

@section("script")

@stop