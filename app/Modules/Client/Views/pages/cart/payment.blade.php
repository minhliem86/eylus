@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Thanh Toán")

@section('content')

    <section class="section cart-template payment-template">
        <div class="container">
            {!! Form::open(['route' => 'client.promotion', 'class' => 'form-payment']) !!}
            <div class="row">
                <div class="col-md-7">
                    <div class="customer-information area">
                        <h5 class="title">Thông tin giao hàng</h5>
                        <div class="form-group">
                            <label for="fullname">Họ và Tên</label>
                            {!! Form::text('fullname', old('fullname'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <small class="form-text text-muted">
(Nhân viên giao hàng sẽ liên lạc theo số điện thoại này)
                            </small>
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email', old('email'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ khách hàng</label>
                            <small class="form-text text-muted">
                                (Nhân viên giao hàng sẽ liên lạc theo địa chỉ này)
                            </small>
                            {!! Form::text('address', old('address'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 mb-sm-3">
                                <label for="city_id">Thành Phố</label>
                                {!! Form::select('city_id', [], old('city_id'), ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4 mb-sm-3">
                                <label for="district_id">Quận/Huyện</label>
                                {!! Form::select('district_id', [], old('district_id'), ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4">
                                <label for="ward_id">Phường/Xã</label>
                                {!! Form::select('ward_id', [], old('ward_id'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="shipmethod-wrapper area">
                        <h5 class="title">Phương thức giao hàng</h5>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="ship_cost" class="custom-control-input" id="standard" required>
                                <label class="custom-control-label" for="standard">Giao Hàng Tiêu Chuẩn</label>
                                <small class="form-text text-muted">
                                    40.000 VND
                                </small>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="ship_cost" class="custom-control-input" id="shipfast" required>
                                <label class="custom-control-label" for="shipfast">Giao Hàng Nhanh</label>
                                <small class="form-text text-muted">
                                    50.000 VND
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="paymentmethod-wrapper area">
                        <h5 class="title">Phương thức thanh toán</h5>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="payment_method" class="custom-control-input" id="cod" required>
                                <label class="custom-control-label" for="cod">COD (thanh toán khi giao hàng)</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="payment_method" class="custom-control-input" id="nganluong" required>
                                <label class="custom-control-label" for="nganluong">Ngân Lượng</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="cart-information area">
                        <h5 class="title">Đơn hàng của bạn</h5>
                        <table class="table table-product">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-right">Đơn giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        OSC Du Học
                                    </td>
                                    <td class="text-center">
                                        1
                                    </td>
                                    <td class="text-right">
                                        500,000 vnd
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2">Tạm tính:</td>
                                <td class="text-right">500,000 VND</td>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="promotion-wrapper">
                            <div class="input-group">
                                <input type="text" class="form-control" id="promotion_code" placeholder="Mã khuyến mãi">
                                <div class="input-group-append">
                                    <button class="btn-promotion" type="button">Áp Dụng</button>
                                </div>
                            </div>
                            <div class="wrap-code mt-4">
                                <span class="badge badge-primary">DISCOUNT</span>
                            </div>
                        </div>

                        <div class="wrap-total my-3 d-flex justify-content-between">
                            <p>
                                Tổng cộng
                            </p>
                            <p class="price">
                                700,000 VND
                            </p>
                        </div>
                    </div>

                    <div class="wrap-payment text-right">
                        <button type="submit" class="btn-submit">Thanh Toán</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </section>


@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('select[name=vpc_SHIP_City]').on('change', function(){
                var city_id = $(this).val();
                $.ajax({
                    url: "{!! route('client.post.getDistrict') !!}",
                    type: 'POST',
                    data: {city_id: city_id},
                    success: function(data){
                        $('.ajax-province').html(data.data);
                    }
                })
            })

            $(document).on('change', 'select[name=vpc_SHIP_Provice]', function () {
                var district_id = $(this).val();
                $.ajax({
                    url: "{!! route('client.post.getWard') !!}",
                    type: 'POST',
                    data: {district_id: district_id},
                    success: function(data){
                        $('.ajax-ward').html(data.data);
                    }
                })
            })

        });
        function applyPromotion()
        {
            var promotion = $('input[name="promotion"]').val();
            $.ajax({
                url: '{!! route("client.promotion") !!}',
                type: 'POST',
                data: {pr_code: promotion},
                success: function(data){
                    if(data.error){
                        alertify.error(data.message);
                        $('input[name="promotion"]').val('');
                    }
                    if(!data.error){
                        $('input[name="promotion"]').prop('disabled', true);
                        $('#btn-payment').prop('disabled',true);
                        $('.display-promotion').removeClass('d-none');
                        $('.display-promotion').append(data.view);
                        $('.total').text(data.total);
                        alertify.success(data.message);
                    }
                }
            })
        }
    </script>
@stop