@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Tin Tức")

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
                                    <button type="button" class="btn btn-director">Tìm Đường</button>
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
                            <p><b>Địa chỉ:</b> {!! $companies->address !!}</p>
                            <p><b>Điện thoại:</b> {!! $companies->phone !!}</p>
                            <p><b>Email:</b> {!! $companies->email !!}</p>
                        @endif
                    </div>
                    <div class="form-contact-wrapper">
                        {!! Form::open(['route'=>'client.contact.post']) !!}
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            {!! Form::text('fullname', old('fullname'), ['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại</label>
                            {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="messages">Nội dung</label>
                            {!! Form::textarea('messages', old('label'), ['class'=>'form-control', 'rows'=>10]) !!}
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Gửi</button>
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

    <script>
        function MapRoute(lat, lng) {
            var pointA = new google.maps.LatLng(10.7736594,106.7004169),
                pointB = new google.maps.LatLng(lat, lng),
                myOptions = {
                    zoom: 7,
                    center: pointA
                },
                map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
                // Instantiate a directions service.
                directionsService = new google.maps.DirectionsService,
                directionsDisplay = new google.maps.DirectionsRenderer({
                    map: map
                });
            // get route from A to B
            calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
            directionsService.route({
                origin: pointA,
                destination: pointB,
                travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }


        function initMap() {
            var origin =  new google.maps.LatLng(10.7736594,106.7004169),
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: origin,
                zoom: 16
            });
            markerA = new google.maps.Marker({
                position: origin,
                title: "Eyluxlashes",
                label: "A",
                map: map
            });
        }

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