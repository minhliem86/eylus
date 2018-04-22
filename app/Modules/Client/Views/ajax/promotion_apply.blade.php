<div class="promotion-wrapper">
    <div class="input-group">
        <input type="text" name="promotion" class="form-control" id="promotion_code" placeholder="{!! trans('payment.promotion_code') !!}" value="{!! !Cart::getConditionsByType('discount')->isEmpty() ?  Cart::getConditionsByType('discount')->first()->getName() : null !!}">
        <div class="input-group-append">
            <button class="btn-promotion" type="button" onclick="applyPromotion()">{!! trans('payment.promotion_apply') !!}</button>
        </div>
    </div>
    @if(!Cart::getConditionsByType('discount')->isEmpty())
    <div class="wrap-code d-flex justify-content-between mt-4">
        <p>{!! trans('payment.promotion_value') !!}:</p>
        <span class="badge badge-primary">{!! is_numeric(Cart::getConditionsByType('discount')->first()->getValue()) ? number_format(Cart::getConditionsByType('discount')->first()->getValue()).' VND' : Cart::getConditionsByType('discount')->first()->getValue() !!}</span>
    </div>
    @endif
</div>