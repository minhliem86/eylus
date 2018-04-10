<?php
Route::group(['prefix' => 'admin', 'namespace' => 'App\Modules\Admin\Controllers'], function(){
    // Authentication Routes...
    Route::group(['middleware'=>['web']], function(){
        Route::get('login',['as' => 'admin.login.get', 'uses' => 'Auth\AuthController@showLoginForm']);
        Route::post('login',['as' => 'admin.login.post', 'uses' => 'Auth\AuthController@login']);
        Route::get('logout', ['as' => 'admin.logout.post', 'uses' => 'Auth\AuthController@logout']);

        // Registration Routes...
        Route::get('register', ['as' => 'admin.register.get', 'uses' => 'Auth\AuthController@showRegistrationForm']);
        Route::post('register', ['as' => 'admin.register.post', 'uses' => 'Auth\AuthController@register']);

        // Password Reset Routes...
        Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
        Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Auth\PasswordController@reset');

        // Change Password
        Route::post('/changePass', ['as' => 'admin.changePass.postChangePass', 'uses'=>'ProfileController@postChangePass']);

        /*ROLE, PERMISSION*/
        Route::get('/create-role', ['as' => 'admin.createRole', 'uses' => 'Auth\RoleController@createRole']);
        Route::post('/create-role', ['as' => 'admin.postCreateRole', 'uses' => 'Auth\RoleController@postCreateRole']);
        Route::post('/ajax-role', ['as' => 'admin.ajaxCreateRole', 'uses' => 'Auth\RoleController@postAjaxRole']);
        Route::post('/ajax-permission', ['as' => 'admin.ajaxCreatePermission', 'uses' => 'Auth\RoleController@postAjaxPermission']);

        Route::group(["middleware" => "can_login"], function(){

            Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
            //   PORFILE
            Route::get('/profile', ['as' => 'admin.profile.index', 'uses' => 'ProfileController@index']);
            Route::post('/profile/changePass', ['as' => 'admin.profile.changePass', 'uses' => 'ProfileController@postChangePass']);

            /*USER MANAGEMENT*/
            Route::get('user/getData', ['as' => 'admin.user.getData', 'uses' => 'UserManagementController@getData']);
            Route::post('user/deleteAll', ['as' => 'admin.user.deleteAll', 'uses' => 'UserManagementController@deleteAll']);
            Route::post('user/updateStatus', ['as' => 'admin.user.updateStatus', 'uses' => 'UserManagementController@updateStatus']);
            Route::post('user/createUserByAdmin', ['as' => 'admin.user.createByAdmin', 'uses' => 'Auth\AuthController@registerByAdmin']);
            Route::resource('/user','UserManagementController');

            // MULTI PHOTOs
            Route::get('photo', ['as'=>'admin.photo.index', 'uses'=>'MultiPhotoController@getIndex']);
            Route::get('photo/create', ['as'=>'admin.photo.create', 'uses'=>'MultiPhotoController@getCreate']);
            Route::post('photo/create', ['as'=>'admin.photo.postCreate', 'uses'=>'MultiPhotoController@postCreate']);
            Route::get('photo/edit/{id}',['as' => 'admin.photo.edit', 'uses'=>'MultiPhotoController@getEdit']);
            Route::put('photo/edit/{id}',['as' => 'admin.photo.update', 'uses'=>'MultiPhotoController@postEdit']);
            Route::delete('photo/delete/{id}', ['as' => 'admin.photo.destroy', 'uses'=>'MultiPhotoController@destroy']);
            Route::post('photo/deleteAll', ['as' => 'admin.photo.deleteAll', 'uses'=>'MultiPhotoController@deleteAll']);

            /*CATEGORY*/
            Route::post('category/deleteAll', ['as' => 'admin.category.deleteAll', 'uses' => 'CategoryController@deleteAll']);
            Route::post('category/updateStatus', ['as' => 'admin.category.updateStatus', 'uses' => 'CategoryController@updateStatus']);
            Route::post('category/postAjaxUpdateOrder', ['as' => 'admin.category.postAjaxUpdateOrder', 'uses' => 'CategoryController@postAjaxUpdateOrder']);
            Route::resource('category', 'CategoryController');

            /*BRAND*/
            Route::post('brand/deleteAll', ['as' => 'admin.brand.deleteAll', 'uses' => 'BrandController@deleteAll']);
            Route::post('brand/updateStatus', ['as' => 'admin.brand.updateStatus', 'uses' => 'BrandController@updateStatus']);
            Route::post('brand/postAjaxUpdateOrder', ['as' => 'admin.brand.postAjaxUpdateOrder', 'uses' => 'BrandController@postAjaxUpdateOrder']);
            Route::resource('brand', 'BrandController');

            /* COMPANY */
            Route::any('company/{id?}', ['as' => 'admin.company.index', 'uses' => 'CompanyController@getInformation']);


            /*PRODUCT*/
            Route::post('product/deleteAll', ['as' => 'admin.product.deleteAll', 'uses' => 'ProductController@deleteAll']);
            Route::post('product/postAjaxUpdateOrder', ['as' => 'admin.product.postAjaxUpdateOrder', 'uses' => 'ProductController@postAjaxUpdateOrder']);
            Route::post('product/AjaxRemovePhoto', ['as' => 'admin.product.AjaxRemovePhoto', 'uses' => 'ProductController@AjaxRemovePhoto']);
            Route::post('product/AjaxUpdatePhoto', ['as' => 'admin.product.AjaxUpdatePhoto', 'uses' => 'ProductController@AjaxUpdatePhoto']);
            Route::post('product/updateStatus', ['as' => 'admin.product.updateStatus', 'uses' => 'ProductController@updateStatus']);
            Route::post('product/updateHotProduct', ['as' => 'admin.product.updateHotProduct', 'uses' => 'ProductController@updateHotProduct']);
            Route::resource('product', 'ProductController');


            /*NEWS*/
            Route::post('news/deleteAll', ['as' => 'admin.news.deleteAll', 'uses' => 'NewsController@deleteAll']);
            Route::post('news/updateStatus', ['as' => 'admin.news.updateStatus', 'uses' => 'NewsController@updateStatus']);
            Route::post('news/postAjaxUpdateOrder', ['as' => 'admin.news.postAjaxUpdateOrder', 'uses' => 'NewsController@postAjaxUpdateOrder']);
            Route::resource('news', 'NewsController');

            /*PROMOTION*/
            Route::post('promotion/deleteAll', ['as' => 'admin.promotion.deleteAll', 'uses' => 'PromotionController@deleteAll']);
            Route::post('promotion/updateStatus', ['as' => 'admin.promotion.updateStatus', 'uses' => 'PromotionController@updateStatus']);
            Route::post('promotion/postAjaxUpdateOrder', ['as' => 'admin.promotion.postAjaxUpdateOrder', 'uses' => 'PromotionController@postAjaxUpdateOrder']);
            Route::resource('promotion', 'PromotionController');

            /*PAGE*/
            Route::post('page/deleteAll', ['as' => 'admin.page.deleteAll', 'uses' => 'PageController@deleteAll']);
            Route::post('page/updateStatus', ['as' => 'admin.page.updateStatus', 'uses' => 'PageController@updateStatus']);
            Route::post('page/postAjaxUpdateOrder', ['as' => 'admin.page.postAjaxUpdateOrder', 'uses' => 'PageController@postAjaxUpdateOrder']);
            Route::resource('page', 'PageController');

            /*EMAIL SUBSCRIBE*/
            Route::get('/subscribe', ['as' => 'admin.subscribe', 'uses' => 'EmailSubscribeController@getIndex'] );
            Route::post('/subscribe/download', ['as' => 'admin.subscribe.download', 'uses' => 'EmailSubscribeController@download']);

            /*SHIP COST*/
            Route::post('ship-cost/deleteAll', ['as' => 'admin.ship-cost.deleteAll', 'uses' => 'ShipController@deleteAll']);
            Route::post('ship-cost/updateStatus', ['as' => 'admin.ship-cost.updateStatus', 'uses' => 'ShipController@updateStatus']);
            Route::post('ship-cost/postAjaxUpdateOrder', ['as' => 'admin.ship-cost.postAjaxUpdateOrder', 'uses' => 'ShipController@postAjaxUpdateOrder']);
            Route::resource('ship-cost', 'ShipController');

            /*PROMOTION CODE*/
            Route::post('promotioncode/deleteAll', ['as' => 'admin.promotioncode.deleteAll', 'uses' => 'PromotionCodeController@deleteAll']);
            Route::post('promotioncode/updateStatus', ['as' => 'admin.promotioncode.updateStatus', 'uses' => 'PromotionCodeController@updateStatus']);
            Route::post('promotioncode/postAjaxUpdateOrder', ['as' => 'admin.promotioncode.postAjaxUpdateOrder', 'uses' => 'PromotionCodeController@postAjaxUpdateOrder']);
            Route::resource('promotioncode', 'PromotionCodeController');

            /*ORDER*/
            Route::post('order/deleteAll', ['as' => 'admin.order.deleteAll', 'uses' => 'OrderController@deleteAll']);
            Route::post('order/updateStatus', ['as' => 'admin.order.updateStatus', 'uses' => 'OrderController@updateStatus']);
            Route::post('order/postAjaxUpdateOrder', ['as' => 'admin.order.postAjaxUpdateOrder', 'uses' => 'OrderController@postAjaxUpdateOrder']);
            Route::resource('order', 'OrderController');

            /*CUSTOMER*/
            Route::post('customer/deleteAll', ['as' => 'admin.customer.deleteAll', 'uses' => 'CustomerController@deleteAll']);
            Route::post('customer/updateStatus', ['as' => 'admin.customer.updateStatus', 'uses' => 'CustomerController@updateStatus']);
            Route::post('customer/postAjaxUpdateOrder', ['as' => 'admin.customer.postAjaxUpdateOrder', 'uses' => 'CustomerController@postAjaxUpdateOrder']);
            Route::resource('customer', 'CustomerController');


        });
    });
});
