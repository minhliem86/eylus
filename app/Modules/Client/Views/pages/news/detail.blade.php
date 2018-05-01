@extends("Client::layouts.main")

@section("meta")

@stop

@section("title")
    {!! ( $title = trans('variable.title') ) ? $news->$title : null !!}
@stop

@section('content')
    @include("Client::layouts.banner")

    <section class="sidebar-template section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-content">
                        <div class="row no-gutters">
                            <div class="title-content-wrapper">
                                <h2 class="title-content">{!! ($title = trans('variable.title') ) ? $news->$title : null !!}</h2>
                                <div class="news-info mb-4 d-flex justify-content-between">
                                    <div>
                                        <p>{!! trans('static.create_date') !!}: <i>{!! \Carbon\Carbon::parse($news->created_at)->format('d/m/Y') !!}</i></p>
                                    </div>
                                    <div class="socical">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="content-detail">
                                    {!! ($content = trans('variable.content') ) ? $news->$content : null !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-wrapper">
                        <div class="box-sidebar">
                            <h4 class="title-box">{!! trans('static.other_news') !!}</h4>
                            @if(!$relate_news->isEmpty())
                            <div class="content-box">
                                @foreach($relate_news as $item_relate)
                                <div class="media">
                                    <a href="{!! route('client.news.detail', $item_relate->slug) !!}"><img class="mr-3" src="{!! asset('public/uploads').'/'.$item_relate->img_url !!}" alt="{!! ($title = trans('variable.title') ) ? $item_relate->$title : null !!}"></a>
                                    <div class="media-body">
                                        <h5 class="mb-3"><a href="{!! route('client.news.detail', $item_relate->slug) !!}">{!! ($title = trans('variable.title') ) ? $item_relate->$title : null !!}</a></h5>
                                        <div class="media-content">
                                            <a href="{!! route('client.news.detail', $item_relate->slug) !!}">
                                                {!! ($content = trans('variable.content') ) ? Str::words($item_relate->$content, 20) : null !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>

                        <div class="box-sidebar">
                            <h4 class="title-box">{!! trans('static.promotion') !!}</h4>
                            @if(!$promotions->isEmpty())
                                <div class="content-box">
                                    @foreach($promotions as $item_promotion)
                                        <div class="media">
                                            <a href=""><img class="mr-3" src="{!! asset('public/uploads').'/'.$item_promotion->img_url !!}" alt="{!! ($title = trans('variable.title') ) ? $item_promotion->$title : null !!}"></a>
                                            <div class="media-body">
                                                <h5 class="mb-3"><a href="{!! route('client.promotion_news.detail', $item_promotion->slug) !!}">{!! ($title = trans('variable.title') ) ? $item_promotion->$title : null !!}</a></h5>
                                                <div class="media-content">
                                                    <a href="{!! route('client.promotion_news.detail', $item_promotion->slug) !!}">
                                                        <p>{!! ($content = trans('variable.content') ) ? Str::words($item_promotion->$content, 30) : null !!}</p>
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