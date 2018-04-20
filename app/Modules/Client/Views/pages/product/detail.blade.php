@extends("Client::layouts.main")

@section("meta")

@stop

@section("title")
    {!! ($name = trans('variable.name') ) ? $product->$name : null !!}
@stop

@section('content')
    <section class="addtocart-template section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="photo-wrapper">
                        <img data-zoom-image="{!! asset('public/uploads/'.$product->img_url) !!}" src="{!! asset($product->thumb_img_url) !!}" class="img-fluid" id="zoom_photo" alt="{!! ($name = trans('variable.name') ) ? $product->$name : null !!}">
                        @if(!$product->photos->isEmpty())
                        <div id="gallery">
                            @foreach($product->photos as $photo)
                            <div class="item-photo">
                                <a href="#" data-image="{!! asset($photo->img_url) !!}" data-zoom-image="{!! asset($photo->big_url) !!}">
                                    <img src="{!! asset($photo->thumb_url) !!}" class="img-fluid" id="zoom_photo" />
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-7">
                    {!! Form::open(['route'=>'client.product.addToCart', 'class'=>'form']) !!}
                    {!! Form::hidden('product_id',$product->id) !!}
                    <div class="information-wrapper">
                        <h2 class="title-product">{!! ($name = trans('variable.name') ) ? $product->$name : null !!}</h2>
                        <div class="info">
                            <p>{!! trans('static.brand') !!}: <i>{!! ($name = trans('variable.name') ) ? $product->brands->$name : null !!}</i></p>
                        </div>
                        <div class="quantity-wrapper">
                            <label for="quantity">{!! trans('static.quantity') !!}:</label>
                            <input type="number" min="1"  name="quantity" value="1" class="quantity form-control">
                        </div>
                        <div class="price-wrapper">
                            <p class="price">{!! ($price = trans('variable.price') ) ? number_format($product->$price) : null !!} {!! trans('variable.currency') !!}</p>
                        </div>
                        <div class="btn-wrapper">
                            <button type="submit" class="btn btn-submit">{!! trans('home.add_cart') !!}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-description">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" role="tab" aria-controls="description" href="#description">{!! trans('static.product_description') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" role="tab" aria-controls="comment" href="#comment">{!! trans('static.product_comment') !!}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                {!! ($content = trans('variable.content') ) ? $product->$content : null !!}
                            </div>
                            <div class="tab-pane fade" id="comment" role="tabpanel">

                            </div>
                        </div>

                    </div>
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

    <script src="{!! asset('public/assets/client') !!}/js/plugins/zoom/jquery.elevateZoom.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#zoom_photo").elevateZoom({
                gallery: "gallery",
                cursor: "pointer",
                galleryActiveClass: "active",
                loadingIcon: "http://www.elevateweb.co.uk/spinner.gif",
                imageCrossfade: true
            })

            $('#gallery').slick({
                slidesToShow: 4,
            })


        })
    </script>
@stop