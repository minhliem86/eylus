@extends('Client::layouts.main')

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
                                    <button type="button" class="btn btn-director">Tìm Đường</button>
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d692.8755259909512!2d106.70259235136976!3d10.773282449928304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zMTYgSHXhu7NuaCBUSMO6YyBLaMOhbmcsIFAuIELhur9uIE5naMOpLCBRLiAxLCBUcC4gSENN!5e0!3m2!1svi!2s!4v1524391186248" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrapper thankyou text-center">
                        <p class="success-inform">Cảm ơn bạn đã gửi thông tin cho chúng tôi.</p>
                        <p class="success-inform">Chúng tôi sẽ xử lý và phản hồi sớm đến bạn!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section("script")

@stop