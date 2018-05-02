@extends('Client::layouts.main')

@section("meta")

@stop

@section("title","Liên Hệ")

@section("content")
    <section class="section contact">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <div class="map-wrapper">
                        <div id="input-director" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="from_gmap" class="form-control" placeholder="Nhập địa chỉ của bạn..">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-director">{!! trans('contact.direction') !!}</button>
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <div id="map-canvas"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrapper thankyou text-center">
                        <p class="success-inform">{!! trans('contact.success01') !!}</p>
                        <p class="success-inform">{!! trans('contact.success02') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section("script")
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnRfCExRjCqQ9wa2fmB4lUw6Mtr6KvA8c"></script>
    <script src="{!! asset('public/assets/client') !!}/js/map.js"></script>
    <script>
        $(document).ready(function(){
            initMap();
            $('.btn-director').click(function(){
                var address = $('input[name=from_gmap]').val();
                $('#map-canvas').empty();
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();
                        MapRoute(latitude,longitude);
                    }
                });
            })

        })
    </script>
@stop