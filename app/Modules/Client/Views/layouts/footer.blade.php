<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-container">
                    <ul class="list-footer">
                        <li class="header">{!! trans('menu.about') !!}</li>
                        <li class="item-footer"><a href="{!! route('client.home') !!}">{!! trans('menu.home') !!}</a></li>
                        <li class="item-footer"><a href="{!! url('gioi-thieu') !!}">{!! trans('menu.about') !!}</a></li>
                        <li class="item-footer"><a href="{!! route('client.promotion_news') !!}">{!! trans('menu.promotion') !!}</a></li>
                        <li class="item-footer"><a href="{!! route('client.contact') !!}">{!! trans('menu.contact') !!}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-container">
                    <ul class="list-footer">
                        <li class="header">{!! trans('menu.guild') !!}</li>
                        @if(!$other_page->isEmpty())
                            @foreach($other_page as $item_page)
                            <li class="item-footer"><a href="{!! route('client.single_page',$item_page->slug) !!}">{!! ($name = trans('variable.name') ) ? $item_page->$name : null !!}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-container">
                    <ul class="list-footer">
                        <li class="header">{!! trans('menu.product') !!}</li>
                        @if(!$category->isEmpty())
                            @foreach($category as $item_cate)
                                <li class="item-footer"><a href="{!! route('client.category', $item_cate->slug) !!}">{!! ($name = trans('variable.name')) ? $item_cate->$name : null !!}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-container">
                    <div class="title-wrapper  mb-1">
                        <h3 class="title-footer">{!! trans('menu.subscribe') !!}</h3>
                        <sup>{!! trans('menu.sub_subscribe') !!}</sup>
                    </div>
                    <div class="form-wrapper mb-4">
                        {!! Form::open(['route' => 'client.subcribe.post', 'class' => 'form']) !!}
                        <div class="input-group">
                            <input type="text" name="email_subcribe" class="form-control" placeholder="Your Email ..." ria-describedby="inputAppend" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn-submit input-group-text"><i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="icon-footer d-flex justify-content-start">
                        <a href="https://www.facebook.com/myhuongeyluxlashes/"  class="ic-wrapper ic-fb"><i class="fa fa-facebook-square"></i></a>
                        <a href="#" class="ic-wrapper ic-yt"><i class="fa fa-youtube-square"></i></a>
                        <a href="#" class="ic-wrapper ic-tw"><i class="fa fa-twitter-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>