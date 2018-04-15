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
                    <div class="sidebar-wrapper">
                        <div class="box-sidebar">
                            <h4 class="title-box">Danh Mục Sản Phẩm</h4>
                            <div class="content-box">
                                <ul class="list-template">
                                    <li class="active"><a href="#">Lông Mi</a>
                                        <ul class="sub-list">
                                            <li><a href="#">Chanel</a></li>
                                            <li><a href="#">Jodano</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Màu Mắt</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="box-sidebar">
                            <h4 class="title-box">Video</h4>
                            <div class="content-box">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="each-element">
                                <div class="content-wrapper">
                                    <div class="item-element">
                                        <div class="img-wrapper">
                                            <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                            <div class="mask"></div>
                                            <div class="wrap-btn justify-content-center align-items-center d-md-flex flex-column">
                                                <a href="#" class="btn-detail-product btn-template">Chi tiết</a>
                                                <a href="#" class="btn-template btn-cart">Mua Ngay</a>
                                            </div>
                                        </div>

                                        <h4 class="title-product"><a href="#">Product 01</a></h4>
                                        <p class="price">100.000 vnd</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="each-element">
                                <div class="content-wrapper">
                                    <div class="item-element">
                                        <div class="img-wrapper">
                                            <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                            <div class="mask"></div>
                                            <div class="wrap-btn justify-content-center align-items-center d-md-flex flex-column">
                                                <a href="#" class="btn-detail-product btn-template">Chi tiết</a>
                                                <a href="#" class="btn-template btn-cart">Mua Ngay</a>
                                            </div>
                                        </div>

                                        <h4 class="title-product"><a href="#">Product 01</a></h4>
                                        <p class="price">100.000 vnd</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="each-element">
                                <div class="content-wrapper">
                                    <div class="item-element">
                                        <div class="img-wrapper">
                                            <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                            <div class="mask"></div>
                                            <div class="wrap-btn justify-content-center align-items-center d-md-flex flex-column">
                                                <a href="#" class="btn-detail-product btn-template">Chi tiết</a>
                                                <a href="#" class="btn-template btn-cart">Mua Ngay</a>
                                            </div>
                                        </div>

                                        <h4 class="title-product"><a href="#">Product 01</a></h4>
                                        <p class="price">100.000 vnd</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="each-element">
                                <div class="content-wrapper">
                                    <div class="item-element">
                                        <div class="img-wrapper">
                                            <img src="{!! asset('public/assets/client') !!}/images/lego.jpg" class="img-fluid img-section" alt="">
                                            <div class="mask"></div>
                                            <div class="wrap-btn justify-content-center align-items-center d-md-flex flex-column">
                                                <a href="#" class="btn-detail-product btn-template">Chi tiết</a>
                                                <a href="#" class="btn-template btn-cart">Mua Ngay</a>
                                            </div>
                                        </div>

                                        <h4 class="title-product"><a href="#">Product 01</a></h4>
                                        <p class="price">100.000 vnd</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section("script")

@stop