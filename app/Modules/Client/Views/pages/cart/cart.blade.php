@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Giỏ Hàng")

@section('content')
    <section class="section cart-template">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cart-wrapper" data-aos="fade-up">
                        {!! Form::open(['route'=> 'client.cart.updateQuantity', 'id' => 'form-update']) !!}
                        <table class="table table-cyan">
                            <thead>
                                <tr>
                                    <th>{!! trans('menu.product') !!}</th>
                                    <th>{!! trans('cart.img') !!}</th>
                                    <th width="200">{!! trans('cart.quantity') !!}</th>
                                    <th class="text-right">{!! trans('cart.subtotal') !!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @include("Client::ajax.cart")
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <a class="btn-cart btn-remove" href="{!! url('xoa-gio-hang') !!}"><i class="fa fa-remove"></i> {!! trans('cart.clear_cart') !!}</a>
                                        <button class="btn-cart btn-udpate " type="button" href="{!! route('client.cart.updateQuantity') !!}"><i class="fa fa-refresh"></i> {!! trans('cart.update_cart') !!}</button>
                                    </td>
                                    <td colspan="2" class="text-right">
                                        <a href="{!! route('client.payment.index') !!}" class="btn-cart btn-payment"><i class="fa fa fa-credit-card"></i> {!! trans('cart.payment') !!}</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop

@section("script")
    <script>
        $(document).ready(function(){
            $('.btn-remove').click(function(){
                var cart_id = $(this).data('id');
                $.ajax({
                    url: '{!! route('client.cart.removeItem') !!}',
                    type: 'POST',
                    data: {cart_id: cart_id},
                    success: function(data){
                        $('table tbody').html(data.data);
                        $('#cart-wrapper').html(data.cart_header);
                    }
                })
            })

            $(document).on('click', '.btn-udpate', function (){
               $('form#form-update').submit()
            })
        })
    </script>
@stop