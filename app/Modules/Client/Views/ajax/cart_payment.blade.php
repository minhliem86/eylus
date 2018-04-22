<table class="table table-product">
    <thead>
    <tr>
        <th>{!! trans('payment.product_payment') !!}</th>
        <th class="text-center">{!! trans('payment.quantity_payment') !!}</th>
        <th class="text-right">{!! trans('payment.price_payment') !!}</th>
    </tr>
    </thead>
    <tbody>
    @foreach(Cart::getContent() as $item_cart)
        <tr>
            <td>
                {!! $item_cart->name !!}
            </td>
            <td class="text-center">
                {!! $item_cart->quantity !!}
            </td>
            <td class="text-right">
                {!! number_format($item_cart->price) !!} vnd
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="2">{!! trans('payment.subtotal') !!}:</td>
        <td class="text-right">{!! number_format(Cart::getSubTotal()) !!} VND</td>
    </tr>
    </tfoot>
</table>
<hr>
<div class="wrap-total my-4 d-flex justify-content-between">
    <p>
        {!! trans('payment.total') !!}
    </p>
    <p class="price">
        {!! number_format(Cart::getTotal()) !!} VND
    </p>
</div>