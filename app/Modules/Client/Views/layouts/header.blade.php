<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo-wrapper">
                    <a href="{!! route('client.home') !!}"><img src="{!! asset('public/assets/client') !!}/images/logo_bk.png" class="img-fluid" alt="EYLUXLASHES"></a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="navbar-wrapper height d-flex justify-content-end align-items-md-end">
                    <nav class="navbar navbar-light navbar-expand-lg my-navbar ">
                        <a href="{!! route('client.home') !!}" class="navbar-brand">EYLUXLASHES</a>
                        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="main-menu">
                            <ul class="navbar-nav nav-menu align-content-end">
                                <li class="nav-item">
                                    <a href="{!! route('client.home') !!}">{!! trans('menu.home') !!}</a>
                                </li>
                                @if(isset($static_page))
                                <li class="nav-item">
                                    <a href="{!! route('client.single_page', $static_page->slug) !!}">{!! trans('menu.about') !!}</a>
                                </li>
                                @endif
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle" href="#" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {!! trans('menu.collection') !!}
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
                                    <a href="{!! route('client.product.index') !!}">{!! trans('menu.product') !!}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('client.news') !!}">{!! trans('menu.news') !!}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('client.promotion_news') !!}">{!! trans('menu.promotion') !!}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('client.contact') !!}">{!! trans('menu.contact') !!}</a>
                                </li>
                                <li class="nav-item search-item">
                                    <span data-toggle="collapse" data-target="#search-box" aria-controls="search-box"><i class="fa fa-search"></i></span>
                                    <div id="search-box" class="collapse">
                                        {!! Form::open(['route'=>'client.search.post']) !!}
                                        <div class="input-group">
                                            <input type="text" name="search-key" class="form-control">
                                            <button class="input-group-append" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                        {!! Form::close() !!}

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