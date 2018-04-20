@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Giỏ Hàng")

@section('content')
    <section class="section cart-template">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cart-wrapper">
                        <table class="table table-cyan">
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th width="200">Số Lượng</th>
                                    <th class="text-right">Đơn Giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @include("Client::ajax.cart")
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <a class="btn-cart btn-remove " href="{!! route('client.cart.clear') !!}"><i class="fa fa-remove"></i> Xóa giỏ hàng</a>
                                        <a class="btn-cart btn-udpate " href="{!! route('client.cart.updateQuantity') !!}"><i class="fa fa-refresh"></i> Cập nhật giỏ hàng</a>
                                    </td>
                                    <td colspan="2" class="text-right">
                                        <a href="#" class="btn-cart btn-payment"><i class="fa fa fa-credit-card"></i> Thanh Toán</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
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
                var data = [];
                $('table .quantity').each(function(){
                    data.push($(this).data('id'));
                })
            })
        })
    </script>
@stop