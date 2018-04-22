<?php
Route::group([
    'prefix'=>LaravelLocalization::setLocale(),
    'middleware'=>['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web' ],
    'namespace' => 'App\Modules\Client\Controllers'], function(){

    Route::get('/', ['as' => 'client.home', 'uses' => 'HomeController@index']);

    /*CONTACT US*/
    Route::get('/lien-he', ['as' => 'client.contact', 'uses' => 'ContactController@getIndex']);
    Route::post('/lien-he', ['as' => 'client.contact.post', 'uses' => 'ContactController@postIndex']);
    Route::get('/lien-he-thanh-cong', ['as' => 'client.contact.thankyou', 'uses' => 'ContactController@getThankyou']);

    /*NEWS*/
    Route::get('/tin-tuc', ['as' => 'client.news', 'uses' => 'NewsController@getIndex']);
    Route::get('/tin-tuc/{slug}', ['as' => 'client.news.detail', 'uses' => 'NewsController@getDetail'])->where('slug', '[0-9a-zA-Z._\-]+');

    /*PROMOTION*/
    Route::get('/tin-khuyen-mai', ['as' => 'client.promotion_news', 'uses' => 'PromotionController@getIndex']);
    Route::get('/tin-khuyen-mai/{slug}', ['as' => 'client.promotion_news.detail', 'uses' => 'PromotionController@getDetail'])->where('slug', '[0-9a-zA-Z._\-]+');

    /*PRODUCT & CART*/
    Route::get('/danh-muc-san-pham/{slug}', ['as' => 'client.category', 'uses' => 'CategoryController@getCategory'])->where('slug','[0-9a-zA-Z._\-]+');
    Route::get('/thuong-hieu-san-pham/{slug}', ['as' => 'client.brand', 'uses' => 'BrandController@getBrand'])->where('slug','[0-9a-zA-Z._\-]+');

    Route::get('/san-pham', ['as' => 'client.product.index', 'uses' => 'ProductController@getIndex']);

    Route::get('/san-pham/{slug}', ['as' => 'client.product.detail', 'uses' => 'ProductController@getProduct'])->where('slug','[0-9a-zA-Z._\-]+');

    Route::post('/san-pham/addToCart', ['as' => 'client.product.addToCart', 'uses' => 'ProductController@addToCart']);

    Route::post('/san-pham/addtoCartAjax', ['as' => 'client.addtocart', 'uses' => 'ProductController@addToCartAjax']);

    Route::get('/gio-hang', ['as' => 'client.cart', 'uses' => 'ProductController@getCart']);

    Route::post('/cap-nhat-gio-hang', ['as' => 'client.cart.updateQuantity', 'uses' => 'ProductController@updateQuantity' ]);

    Route::post('/remove-item', ['as' => 'client.cart.removeItem', 'uses' => 'ProductController@removeItemCart']);

    Route::get('xoa-gio-hang', function(){
        Cart::clearCartConditions();
        Cart::clear();
        return redirect()->route('client.product.index')->with('success','Giỏ hàng của bạn đã được xóa.');
    });

    Route::get('/thanh-toan', ['as' => 'client.payment.index', 'uses' => 'ProductController@getPayment']);

    Route::post('/process-promotion-ajax', ['as' => 'client.promotion.ajax', 'uses' => 'ProductController@applyPromotion']);

    Route::post('/doPayment', ['as' => 'client.doPayment', 'uses' => 'ProductController@doPayment']);

    Route::get('/ngan-luong-pay', ['as' => 'client.payment.checkpay', 'uses'=> 'ProductController@getCheckPay']);

    Route::get('/thanh-toan-thanh-cong', ['as' => 'client.payment_success.thank','uses' => 'ProductController@getThankyou']);

    /*ORDER DETAIL*/
    Route::get('/don-hang/{id}', ['as' => 'client.order_detail', 'uses'=> 'ProfileController@getInvoke'])->where('id','[0-9a-zA-Z._\-]+');

    /*SUBCRIBE EMAIL*/
    Route::post('/subcribe',['as' => 'client.subcribe.post', 'uses' => 'ExtensionController@postSubscribe']);
    Route::post('/subcribe-header',['as' => 'client.subcribe-header.post', 'uses' => 'ExtensionController@postSubscribeHeader']);

    /*SEARCH*/
    Route::post('/search', ['as' => 'client.search.post', 'uses' => 'ExtensionController@postSearch']);


    /*CUSTOMER*/
    Route::get('/dang-nhap', ['as' => 'client.auth.login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('/dang-nhap', ['as' => 'client.auth.login.post', 'uses' => 'Auth\AuthController@postLogin']);
    Route::post('/dang-ky', ['as' => 'client.auth.register.post', 'uses' => 'Auth\AuthController@postRegister']);

    // Password Reset Routes...
    Route::get('password/reset/{token?}',['as'=> 'client.password.reset.getForm', 'uses' => 'Auth\PasswordController@showResetForm']);
    Route::post('password/email',['as' => 'client.password.email.post', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
    Route::post('password/reset', 'Auth\PasswordController@postReset');

    Route::get('/thong-tin-khach-hang', ['as'=> 'client.auth.profile', 'uses' => 'ProfileController@getProfile']);
    Route::post('/update-profile', ['as' => 'client.auth.profile.post', 'uses' => 'ProfileController@postProfile']);

    Route::post('/changePassword', ['as' => 'client.auth.changePassword.post', 'uses' => 'ProfileController@postChangePassword']);

    Route::get('/dang-xuat', ['as' => 'client.auth.logout', 'uses' => 'Auth\AuthController@logout']);

    Route::get('/{slug}', ['as'=>'client.single_page', 'uses'=>'SingleController@index'])->where('slug', '[0-9a-zA-Z._\-]+');

    Route::post('/payment/getDistrict', ['as' => 'client.post.getDistrict', 'uses' => 'ProductController@getDistrict']);
    Route::post('/payment/getWard', ['as' => 'client.post.getWard', 'uses' => 'ProductController@getWard']);

    /*SINGLE*/
    Route::get('/{slug}', ['as' => 'client.single_page','uses' => 'PageController@getPage'])->where('slug', '[0-9a-zA-Z._\-]+');

    /*SEARCH*/
    Route::post('/search', ['as' => 'client.search.post', 'uses' => 'HomeController@postSearch']);

});
