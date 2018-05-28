@if(!Cart::isEmpty())
    @foreach(Cart::getContent() as $item_cart)
        <tr>
            <td>{!! $item_cart->name !!}</td>
            <td><img src="{!! $item_cart->attributes->has('img_url') ? asset($item_cart->attributes->img_url) : null !!}" class="img-fluid" style="width:80px;" alt=""></td>
            <td ><input type="number" min="1" name="quantity[{!! $item_cart->id !!}]"  class="form-control quantity"  value="{!! $item_cart->quantity !!}" required></td>
            <td class="text-right">{!! Helper::_getPrice($item_cart->price,$tygia) !!} {!! trans('variable.currency') !!}</td>
            <td class="text-right"><button type="button" class="btn-remove btn-sm" title="{!! trans('cart.delete') !!}" data-id="{!! $item_cart->id !!}"><i class="fa fa-trash"></i></button></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="4" class="text-right">
            {!! trans('payment.total') !!}
        </td>
        <td class="text-right">{!! Helper::_getPrice(Cart::getSubTotal(),$tygia) !!} {!! trans('variable.currency') !!}</td>
    </tr>
@else
<tr>
    <td colspan="5" class="text-center">{!! trans('static.empty_cart') !!}</td>
</tr>
@endif