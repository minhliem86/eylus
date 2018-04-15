@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Sản Phẩm")

@section('content')
    <section class="addtocart-template section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="photo-wrapper">
                        <img data-zoom-image="{!! asset('public/assets/client') !!}/images/big-photo.png" src="{!! asset('public/assets/client') !!}/images/sp01.png" class="img-fluid" id="zoom_photo" alt="">
                        <div id="gallery">
                            <div class="item-photo">
                                <a href="#" data-image="{!! asset('public/assets/client') !!}/images/sp01.png" data-zoom-image="{!! asset('public/assets/client') !!}/images/big-photo.png">
                                    <img src="{!! asset('public/assets/client') !!}/images/thumb.png" class="img-fluid" id="zoom_photo" />
                                </a>
                            </div>
                            <div class="item-photo">
                                <a href="#" data-image="{!! asset('public/assets/client') !!}/images/lego-gray.jpg" data-zoom-image="{!! asset('public/assets/client') !!}/images/big-photo.png">
                                    <img src="{!! asset('public/assets/client') !!}/images/lego-gray.jpg" class="img-fluid" id="zoom_photo" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    {!! Form::open(['route'=>'client.addtocart', 'class'=>'form']) !!}
                        {!! Form::hidden('product_id',1) !!}
                    <div class="information-wrapper">
                        <h2 class="title-product">Sản Phẩm 01</h2>
                        <div class="info">
                            <p>Thương Hiệu: <i>Chanel</i></p>
                        </div>
                        <div class="quantity-wrapper">
                            <label for="quantity">Số lượng:</label>
                            <input type="number" min="0"  name="quantity" value="1" class="quantity form-control">
                        </div>
                        <div class="price-wrapper">
                            <p class="price">500,000 VND</p>
                        </div>
                        <div class="btn-wrapper">
                            <button type="submit" class="btn btn-submit">Thêm Vào Giỏ Hàng</button>
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
                                <a class="nav-link active" data-toggle="tab" role="tab" aria-controls="description" href="#description">Mô tả sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" role="tab" aria-controls="comment" href="#comment">Đánh giá sản phẩm</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"><p>Lorem ipsum dolor
                                    sit amet, consectetur adipisicing elit. Accusantium, amet ea esse inventore nostrum
                                    perferendis repudiandae temporibus tenetur. Consequuntur facere iure non nostrum
                                    omnis praesentium! Architecto placeat quaerat sunt tenetur.</p>
                                <p>Eligendi excepturi laudantium minima mollitia necessitatibus nesciunt obcaecati
                                    officia quas sint ut? Adipisci animi aspernatur beatae, consequatur dignissimos
                                    dolor ducimus error inventore laborum nam nesciunt perspiciatis recusandae rem, sit
                                    totam!</p>
                                <p>Architecto autem beatae dignissimos dolor expedita hic, in ipsam iure labore libero
                                    mollitia numquam, provident quisquam recusandae rem saepe veritatis voluptas.
                                    Aliquam aliquid cumque delectus excepturi placeat quam quasi, sunt.</p>
                                <p>Accusamus assumenda autem distinctio dolor doloribus, ea exercitationem, facere id
                                    impedit inventore laborum minima molestiae nam porro possimus quos repellat
                                    voluptatum. Ab accusamus at eos explicabo fuga ipsam quia recusandae.</p>
                                <p>Amet, ea laboriosam libero minima nulla optio repudiandae vero voluptatum. Ad, eos,
                                    ex. Aliquam, animi aut autem blanditiis consectetur debitis deserunt dicta, dolor
                                    doloremque ducimus quo rem sapiente sequi voluptatum!</p></div>
                        </div>
                        <div class="tab-pane fade" id="comment" role="tabpanel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium alias commodi
                                corporis exercitationem explicabo ipsam libero molestiae nobis non odio officia
                                perspiciatis porro, provident recusandae sed suscipit temporibus ullam.</p>
                            <p>Ab asperiores, at aut ducimus et fugit illo in laborum minus placeat possimus quam
                                quisquam quod repudiandae rerum sapiente soluta sunt temporibus unde voluptatum. Aliquam
                                atque explicabo nam porro possimus.</p>
                            <p>A cumque dolor, dolores eligendi et labore magnam omnis quam veritatis. Aspernatur culpa
                                et exercitationem illo impedit incidunt molestias quisquam vel! Accusamus deserunt fugit
                                laudantium quam veniam? Accusamus, delectus, excepturi.</p>
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