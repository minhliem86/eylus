<div class="sidebar-wrapper">
    <div class="box-sidebar">
        <h4 class="title-box">{!! trans('menu.category') !!}</h4>
        <div class="content-box">
            @if(!$categories->isEmpty())
            <ul class="list-template">
                @foreach($categories as $item_cate)
                <li class="{!! LP_lib::setActive('3',$item_cate->slug) !!}"><a href="{!! route('client.category', $item_cate->slug) !!}">{!! ($name = trans('variable.name')) ? $item_cate->$name : null !!}</a>
                    @if(!$item_cate->brands->isEmpty())
                    <ul class="sub-list">
                        @foreach($item_cate->brands as $item_brand)
                        <li><a href="{!! route('client.brand',$item_brand->slug) !!}">{!! ($name = trans('variable.name')) ? $item_brand->$name : null !!}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

    <div class="box-sidebar">
        <h4 class="title-box">Video</h4>
        @if(!$videos->isEmpty())
        <div class="content-box">
            <div class="video-wrapper">
                @foreach($videos as $item_video)
                <div class="each-video">
                    <div class="player-sidebar" data-plyr-provider="youtube" data-plyr-embed-id="{!! $item_video->video_url !!}"></div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>