@extends("Client::layouts.main")

@section("content")
    <section class="section profile-template">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Ngày Thanh Toán</th>
                            <th>Hóa Đơn Điện Tử</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!$order->isEmpty())
                            @foreach($order as $item_order)
                                <tr>
                                    <td>{!! $item_order->id !!}</td>
                                    <td>{!! $item_order->order_name !!}</td>
                                    <td>{!! Carbon\Carbon::parse($item_order->created_at)->format('d/m/Y H:i') !!}</td>
                                    <td><a href="{!! route('client.order_detail', $item_order->id) !!}" class="btn btn-outline-secondary btn-order-detail">Chi Tiết</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">Hiện chưa có đơn hàng</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop