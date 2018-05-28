<section class="banner section">
    <div class="container-fluid">
        <div class="row">
            <div class="bannercontainer rev_slider_wrapper" style="padding:0; width:100%; position:relative">
                <div id="banner-slider" class="rev_slider" data-version="5.4.5" style="display:none" >
                    <ul>
                        <!-- THE BOXSLIDE EFFECT EXAMPLES  WITH LINK ON THE MAIN SLIDE EXAMPLE -->

                        <li data-transition="slidingoverlayhorizontal"  data-link="{!! route('client.home') !!}">
                            <img src="{!! asset('public/assets/client') !!}/images/banner.jpg" class="img-fluid">
                            <div class="tp-caption"
                                 data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-type="image"  data-x="left"  data-y="center"
                                 data-hoffset="['10', '30', '30', '-5']"
                                 data-width="['390', '200', '150', '120']"
                                 data-height="['auto', 'auto', 'auto', 'auto']"
                            >
                                <img src="{!! asset('public/assets/client') !!}/images/text-banner.png" class="img-fluid caption-first" alt="">
                            </div>
                        </li>
                        ...
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->