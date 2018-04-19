<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo-wrapper">
                    <a href="{!! route('client.home') !!}"><img src="{!! asset('public/assets/client') !!}/images/logo_bk.png" class="img-fluid" alt="Eylux"></a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="navbar-wrapper height d-flex justify-content-end align-items-md-end">
                    <nav class="navbar navbar-light navbar-expand-lg my-navbar ">
                        <a href="{!! route('client.home') !!}" class="navbar-brand">EXLUX</a>
                        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="main-menu">
                            <ul class="navbar-nav nav-menu align-content-end">
                                <li class="nav-item">
                                    <a href="{!! route('client.home') !!}">Trang Chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('client.single_page', $static_page->slug) !!}">Giới Thiệu</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle" href="#" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Bộ Sưu Tập
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="submenu">
                                        @if(!$category->isEmpty())
                                            @foreach($category as $item_cate)
                                                <a class="dropdown-item" href="{!! route('client.category', $item_cate->slug) !!}">{!! ($name = trans('variable.name')) ? $item_cate->$name : null !!}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('client.product.index') !!}">Sản Phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('client.news') !!}">Tin Tức</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('client.promotion_news') !!}">Khuyến Mãi</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Liên Hệ</a>
                                </li>
                                <li class="nav-item search-item">
                                    <span data-toggle="collapse" data-target="#search-box" aria-controls="search-box"><i class="fa fa-search"></i></span>
                                    <div id="search-box" class="collapse">
                                        <div class="input-group">
                                            <input type="text" name="search-key" class="form-control">
                                            <button class="input-group-append" type="submit"><i class="fa fa-search"></i></button>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end -->