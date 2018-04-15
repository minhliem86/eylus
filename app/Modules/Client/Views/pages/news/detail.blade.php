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
                                <h2 class="title-content">Tin Tức Chi Tiết</h2>
                                <div class="news-info mb-4 d-flex justify-content-between">
                                    <div>
                                        <p>Ngày đăng: <i>12/10/2015</i></p>
                                    </div>
                                    <div class="socical">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="content-detail">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid, amet
                                        assumenda, at commodi cum cumque, itaque magnam nemo odio possimus reprehenderit
                                        saepe sunt tempore voluptatem? Dicta est expedita possimus?</p>
                                    <p>Architecto assumenda aut, autem blanditiis commodi culpa distinctio eaque fugiat
                                        in ipsa laudantium maiores mollitia officiis quasi quisquam sequi sint suscipit
                                        tenetur voluptate voluptatum. Ea incidunt natus nisi nulla praesentium.</p>
                                    <p>Autem consectetur eveniet ex in laborum, natus nisi pariatur quas qui,
                                        reprehenderit sequi, sint suscipit? Accusamus aperiam, asperiores atque fugit,
                                        illo molestiae nesciunt odio odit praesentium soluta tempora veritatis
                                        voluptatibus?</p>
                                    <img src="https://picsum.photos/600/300"  alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-wrapper">
                        <div class="box-sidebar">
                            <h4 class="title-box">Tin Tức Khác</h4>
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