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
                                <tr>
                                    <td>Du Học Hè 2018</td>
                                    <td><img src="{!! asset('public/assets/client') !!}/images/lego.png" class="img-fluid" style="width:80px;" alt=""></td>
                                    <td ><input type="text" name="quantiy" class="form-control"></td>
                                    <td class="text-right">700,00 VND</td>
                                    <td class="text-right"><button type="button" class="btn-remove btn-sm" title="Xóa"><i class="fa fa-trash"></i></button></td>
                                </tr>
                            <tr>
                                <td colspan="4" class="text-right">
                                    Tổng Cộng
                                </td>
                                <td class="text-right">700,000 VND</td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <button class="btn-cart btn-remove " type="button"><i class="fa fa-remove"></i> Xóa giỏ hàng</button>
                                        <button class="btn-cart btn-udpate " type="button" ><i class="fa fa-refresh"></i> Cập nhật giỏ hàng</button>
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

@stop