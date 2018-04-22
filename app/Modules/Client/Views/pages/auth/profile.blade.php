@extends("Client::layouts.main")

@section("content")
    @include("Client::layouts.banner")
    <section class="page-section profile-page user-template">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h3 class="title-login-page">Thông Tin Khách Hàng</h3>
                            <div class="profile-info">
                                {!! Form::open(['route' => 'client.auth.profile.post', 'class'=>'form-profile form']) !!}
                                <div class="form-group">
                                    <label for="lastname">{!! trans('payment.name') !!}</label>
                                    {!! Form::text('name', Auth::guard('customer')->user()->name, ['class' => $errors->error_profile->has('name') ? 'is-invalid  form-control' : 'form-control']) !!}
                                    @if($errors->error_profile->has('name'))
                                        <div class="invalid-feedback">
                                            {!! $errors->error_profile->first('name') !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">{!! trans('payment.phone') !!}</label>
                                    {!! Form::text('phone', Auth::guard('customer')->user()->phone, ['class' => $errors->error_profile->has('phone') ? 'is-invalid  form-control' : 'form-control']) !!}
                                    @if($errors->error_profile->has('phone'))
                                        <div class="invalid-feedback">
                                            {!! $errors->error_profile->first('phone') !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="address">{!! trans('payment.address') !!}</label>
                                    {!! Form::text('address', '', ['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="city_id">{!! trans('payment.city') !!}</label>
                                        {!! Form::select('city_id',[''=> trans('payment.option_city')] + $city,'',['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col">
                                        <label for="district_id">{!! trans('payment.district') !!}</label>
                                        <div id="wrap-district">
                                            {!! Form::select('district_id',[],'',['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="wards">{!! trans('payment.ward') !!}</label>
                                        <div id="wrap-ward">
                                            {!! Form::select('wards',[],'',['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-profile">Lưu Thông Tin</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h3 class="title-login-page">Đổi Mật Khẩu</h3>
                            <div class="changePassword-wrapper">
                                {!! Form::open(['route'=>'client.auth.changePassword.post', 'class'=> 'form form-changePassword']) !!}
                                <div class="form-group">
                                    <label for="oldPassword">Mật khẩu cũ</label>
                                    <input type="password" name="oldPassword" class="form-control" placeholder="Mật Khẩu Cũ">
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">Mật khẩu mới</label>
                                    <input type="password" name="newPassword" class="form-control" placeholder="Mật Khẩu Mới">
                                </div>
                                <div class="form-group">
                                    <label for="newPassword_confirmation">Xác nhận mật khẩu</label>
                                    <input type="password" name="newPassword_confirmation" class="form-control" placeholder="Xác Nhận Mật Khẩu Mới">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-changePassword">Đổi Mật Khẩu</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section("script")
    <!--  DATE PICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $('select[name=city_id]').on('change', function(){
                var city_id = $(this).val();
                $.ajax({
                    url: "{!! route('client.post.getDistrict') !!}",
                    type: 'POST',
                    data: {city_id: city_id},
                    success: function(data){
                        $('#wrap-district').html(data.data);
                    }
                })
            })

            $(document).on('change', 'select[name=district_id]', function () {
                var district_id = $(this).val();
                $.ajax({
                    url: "{!! route('client.post.getWard') !!}",
                    type: 'POST',
                    data: {district_id: district_id},
                    success: function(data){
                        $('#wrap-ward').html(data.data);
                    }
                })
            })
        })
    </script>
@stop