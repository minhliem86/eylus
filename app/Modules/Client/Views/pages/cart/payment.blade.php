@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Thanh Toán")

@section('content')

    <section class="section cart-template payment-template">
        <div class="container">
            {!! Form::open(['route' => 'client.doPayment', 'class' => 'form-payment']) !!}
            <div class="row">
                <div class="col-md-7" data-aos="slide-right">
                    <div class="customer-information area" >
                        <h5 class="title">{!! trans('payment.info_payment') !!}</h5>
                        <div class="form-group">
                            <label for="fullname">{!! trans('payment.name') !!}</label>
                            {!! Form::text('fullname', $user ? $user->name : null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="phone">{!! trans('payment.phone') !!}</label>
                            <small class="form-text text-muted">
                                {!! trans('payment.phone_sub') !!}
                            </small>
                            {!! Form::text('phone', $user ? $user->phone : null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email', $user ? $user->email : null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="address">{!! trans('payment.address') !!}</label>
                            <small class="form-text text-muted">
                                {!! trans('payment.address_sub') !!}
                            </small>
                            {!! Form::text('address', $user && $user->addresses ? $user->addresses->address : null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 mb-sm-3">
                                <label for="city_id">{!! trans('payment.city') !!}</label>
                                {!! Form::select('city_id', [''=> trans("payment.option_city")] + $city, $user && $user->addresses ? $user->addresses->city : null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4 mb-sm-3">
                                <label for="district_id">{!! trans('payment.district') !!}</label>
                                <div id="wrap-district">
                                    {!! Form::select('district_id', [], $user && $user->addresses ? $user->addresses->district : null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="ward_id">{!! trans('payment.ward') !!}</label>
                                <div id="wrap-ward">
                                    {!! Form::select('ward_id', [], $user && $user->addresses ? $user->addresses->ward : null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note">{!! trans('payment.note') !!}</label>
                            {!! Form::textarea('note',old('note'), ['class'=>'form-control','rows'=>6]) !!}
                        </div>
                    </div>

                    <div class="shipmethod-wrapper area">
                        <h5 class="title">{!! trans('payment.shipping_method') !!}</h5>
                        @if(count($shippingCost))
                            @foreach($shippingCost as $item_shipping)
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" value="{!! $item_shipping->id !!}" name="ship_cost" class="custom-control-input" id="{!! $item_shipping->slug !!}" required>
                                <label class="custom-control-label" for="{!! $item_shipping->slug !!}">{!! ($name = trans('variable.name')) ? $item_shipping->$name : null !!}</label>
                                <small class="form-text text-muted">
                                    {!! ($description = trans('variable.description')) ? $item_shipping->$description : null !!}
                                </small>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="paymentmethod-wrapper area">
                        <h5 class="title">{!! trans('payment.payment_method') !!}</h5>
                        @if(count($payment))
                            @foreach($payment as $item_payment)
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" value="{!! $item_payment->id !!}" name="payment_method" class="custom-control-input" id="{!! $item_payment->slug !!}" required>
                                <label class="custom-control-label" for="{!! $item_payment->slug !!}">{!! ($name = trans('variable.name')) ? $item_payment->$name : null !!} ({!! ($descriotion = trans('variable.description')) ? $item_payment->$descriotion : null !!})</label>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="cart-information area" data-aos="slide-left">
                        <h5 class="title">{!! trans('payment.order') !!}</h5>
                        <div id="wrap-cart">
                            @include('Client::ajax.cart_payment')
                        </div>
                        <div id="wrap-promotion">
                            @include("Client::ajax.promotion_apply")
                        </div>
                    </div>

                    <div class="wrap-payment text-right">
                        <button type="submit" class="btn-submit">{!! trans('payment.payment') !!}</button>
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
            @if(!Cart::getConditionsByType('discount')->isEmpty())
                $('input[name="promotion"]').prop('disabled', true);
                $('.btn-promotion').prop('disabled',true);
            @endif
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

        });
        function applyPromotion()
        {
            var promotion = $('input[name="promotion"]').val();
            $.ajax({
                url: '{!! route("client.promotion.ajax") !!}',
                type: 'POST',
                data: {pr_code: promotion},
                success: function(data){
                    if(data.error){
                        alertify.error(data.message);
                        $('input[name="promotion"]').val('');
                    }
                    if(!data.error){
                        $('#wrap-cart').html(data.view);
                        $('#wrap-promotion').html(data.view_promoition);
                        $('input[name="promotion"]').prop('disabled', true);
                        $('.btn-promotion').prop('disabled',true);
                        alertify.success(data.message);
                    }
                }
            })
        }
    </script>
@stop