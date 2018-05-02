@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Liên Hệ")

@section('content')
    @include("Client::layouts.banner")

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
                    <div class="info">
                        <p><img src="{!! asset('public/assets/client') !!}/images/logo.png" class="img-fluid" alt="CÔNG TY TNHH THE OFFICE "></p>
                        @if(isset($companies))
                            <p><b>{!! trans('contact.address') !!}:</b> {!! $companies->address !!}</p>
                            <p><b>{!! trans('contact.phone') !!}:</b> {!! $companies->phone !!}</p>
                            <p><b>Email:</b> {!! $companies->email !!}</p>
                        @endif
                    </div>
                    <div class="form-contact-wrapper">
                        {!! Form::open(['route'=>'client.contact.post']) !!}
                        <div class="form-group">
                            <label for="fullname">{!! trans('payment.name') !!}</label>
                            {!! Form::text('fullname', old('fullname'), ['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="phone">{!! trans('payment.phone') !!}</label>
                            {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="messages">{!! trans('payment.note') !!}</label>
                            {!! Form::textarea('messages', old('label'), ['class'=>'form-control', 'rows'=>10]) !!}
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">{!! trans('contact.send') !!}</button>
                        </div>
                        {!! Form::close() !!}

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