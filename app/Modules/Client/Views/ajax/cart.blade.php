@if(!Cart::isEmpty())
    @foreach(Cart::getContent() as $item_cart)
        <tr>
            <td>{!! $item_cart->name !!}</td>
            <td><img src="{!! $item_cart->attributes->has('img_url') ? asset('public/uploads/').$item_cart->attributes->img_url : null !!}" class="img-fluid" style="width:80px;" alt=""></td>
            <td ><input type="text" name="quantiy" class="form-control" value="{!! $item_cart->quantity !!}"></td>
            <td class="text-right">{!! number_format($item_cart->price) !!} VND</td>
            <td class="text-right"><button type="button" class="btn-remove btn-sm" title="Xóa" data-id="{!! $item_cart->id !!}"><i class="fa fa-trash"></i></button></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4" class="text-right">
            Tổng Cộng
        </td>
        <td class="text-right">{!! number_format($item_cart->getPriceSum()) !!} VND</td>
    </tr>
@endif