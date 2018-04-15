@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Tin Tức")

@section('content')
    @include("Client::layouts.banner")

    <section class="sidebar-template section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-content">
                        <div class="row no-gutters">
                            <div class="title-content-wrapper">
                                <h2 class="title-content">Tin Tức</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="each-template">
                                    <a href="#"><img src="https://picsum.photos/350/200" class="img-fluid mb-4" alt="Generic placeholder image"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="#">Media heading</a></h5>
                                        <div class="media-content">
                                            <a href="#">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium aliquid, animi aspernatur consequatur, deleniti eum minima nam necessitatibus nobis odio perspiciatis quam quos ratione reiciendis rerum suscipit tempora ullam!</p>
                                            </a>
                                        </div>
                                        <a href="#" class="btn-more my-2 d-block">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="each-template">
                                    <a href="#"><img src="https://picsum.photos/350/200" class="img-fluid mb-4" alt="Generic placeholder image"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="#">Media heading</a></h5>
                                        <div class="media-content">
                                            <a href="#">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium aliquid, animi aspernatur consequatur, deleniti eum minima nam necessitatibus nobis odio perspiciatis quam quos ratione reiciendis rerum suscipit tempora ullam!</p>
                                            </a>
                                        </div>
                                        <a href="#" class="btn-more my-2 d-block">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="each-template">
                                    <a href="#"><img src="https://picsum.photos/350/200" class="img-fluid mb-4" alt="Generic placeholder image"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="#">Media heading</a></h5>
                                        <div class="media-content">
                                            <a href="#">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium aliquid, animi aspernatur consequatur, deleniti eum minima nam necessitatibus nobis odio perspiciatis quam quos ratione reiciendis rerum suscipit tempora ullam!</p>
                                            </a>
                                        </div>
                                        <a href="#" class="btn-more my-2 d-block">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-wrapper">
                        <div class="box-sidebar">
                            <h4 class="title-box">Tin Khuyến Mãi</h4>
                            <div class="content-box">
                                <div class="media">
                                    <a href="#"><img class="mr-3" src="https://picsum.photos/80" alt="Generic placeholder image"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="#">Media heading</a></h5>
                                        <div class="media-content">
                                            <a href="#">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi consequatur deleniti dignissimos eligendi, enim excepturi fuga id maiores mollitia nam neque nesciunt nihil nobis officiis quisquam, sed, sunt tempore.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="media">
                                    <a href="#"><img class="mr-3" src="https://picsum.photos/80" alt="Generic placeholder image"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="#">Media heading</a></h5>
                                        <div class="media-content">
                                            <a href="#">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi consequatur deleniti dignissimos eligendi, enim excepturi fuga id maiores mollitia nam neque nesciunt nihil nobis officiis quisquam, sed, sunt tempore.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-sidebar">
                            <h4 class="title-box">Tin Khuyến Mãi</h4>
                            <div class="content-box">
                                <div class="media">
                                    <a href="#"><img class="mr-3" src="https://picsum.photos/80" alt="Generic placeholder image"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="#">Media heading</a></h5>
                                        <div class="media-content">
                                            <a href="#">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi consequatur deleniti dignissimos eligendi, enim excepturi fuga id maiores mollitia nam neque nesciunt nihil nobis officiis quisquam, sed, sunt tempore.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="media">
                                    <a href="#"><img class="mr-3" src="https://picsum.photos/80" alt="Generic placeholder image"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="#">Media heading</a></h5>
                                        <div class="media-content">
                                            <a href="#">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi consequatur deleniti dignissimos eligendi, enim excepturi fuga id maiores mollitia nam neque nesciunt nihil nobis officiis quisquam, sed, sunt tempore.</p>
                                            </a>
                                        </div>
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