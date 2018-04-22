@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Thanh Toán Thành Cônng")

@section('content')

    <section class="section cart-template payment-template">
        <div class="container">
            <div class="row">
                <div class="col-8 col-offset-2 ">
                    <div class="area ">
                        <h5 class="title">{!! trans('payment.payment_success') !!}</h5>
                        <p>{!! trans('payment.text_success') !!}</p>
                    </div>
                </div>

            </div>

        </div>

    </section>


@stop
