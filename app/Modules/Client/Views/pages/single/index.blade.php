@extends('Client::layouts.main')

@section('meta')

@stop


@section('title')
    {!! ( $title = trans('variable.title') ) ? $page->$title : null !!}
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
                                <h2 class="title-content">{!! ($name = trans('variable.name') ) ? $page->$name : null !!}</h2>
                                <div class="news-info mb-4 d-flex justify-content-between">
                                    <div class="socical">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="content-detail">
                                    {!! ($content = trans('variable.content') ) ? $page->$content : null !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-wrapper">
                        <div class="box-sidebar">
                            <h4 class="title-box">Các Trang Khác</h4>
                            @if(!$page_relate->isEmpty())
                                <div class="content-box">
                                    @foreach($page_relate as $item_relate)
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mb-3"><a href="{!! route('client.single_page',$item_relate->slug) !!}">{!! ($name = trans('variable.name') ) ? $item_relate->$name : null !!}</a></h5>
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