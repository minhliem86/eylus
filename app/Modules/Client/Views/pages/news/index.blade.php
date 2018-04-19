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
                                <h2 class="title-content">{!! trans('static.news') !!}</h2>
                            </div>
                        </div>
                        @if(!$news->isEmpty())
                            @foreach($news->chunk(2) as $chunk)
                            <div class="row">
                                @foreach($chunk as $item_news)
                                <div class="col-md-6">
                                    <div class="each-template">
                                        <a href="{!! route('client.news.detail', $item_news->slug) !!}"><img src="{!! asset('public/uploads/'.$item_news->img_url) !!}" class="img-fluid mb-4" alt="{!! ($title = trans('variable.title')) ? $item_news->$title : null !!}"></a>
                                        <div class="media-body">
                                            <h5 class="mb-3"><a href="{!! route('client.news.detail', $item_news->slug) !!}">{!! ($title = trans('variable.title')) ? $item_news->$title : null !!}</a></h5>
                                            <div class="media-content">
                                                <a href="{!! route('client.news.detail', $item_news->slug) !!}">
                                                    {!! ($content = trans('variable.content')) ? Str::words($item_news->$content, 30) : null !!}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-wrapper">
                        <div class="box-sidebar">
                            <h4 class="title-box">{!! trans('static.promotion') !!}</h4>
                            @if(!$promotions->isEmpty())
                            <div class="content-box">
                                @foreach($promotions as $item_promotion)
                                <div class="media">
                                    <a href="{!! route('client.promotion_news.detail', $item_promotion->slug) !!}"><img class="mr-3" src="{!! asset('public/uploads/').$item_promotion->img_url !!}" alt="{!! ($title = trans('variable.title') ) ? $item_promotion->$title : null !!}"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="{!! route('client.promotion_news.detail', $item_promotion->slug) !!}">{!! ($title = trans('variable.title') ) ? $item_promotion->$title : null !!}</a></h5>
                                        <div class="media-content">
                                            <a href="{!! route('client.promotion_news.detail', $item_promotion->slug) !!}">
                                                {!! ($content = trans('variable.content') ) ? Str::words($item_promotion->$content, 30) : null !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


@stop

@section("script")

@stop