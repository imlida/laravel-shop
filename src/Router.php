<?php

namespace Goodwong\Shop;

use Illuminate\Support\Facades\Route;

class Router
{
    /**
     * product routes
     * 
     * @return void
     */
    public static function product()
    {
        Route::namespace('Goodwong\Shop\Http\Controllers')->group(function () {
        	Route::resource('products', 'ProductController');
        	Route::post('product-images', 'ProductImageController@store');
        	Route::delete('product-images', 'ProductImageController@destroy');
        });
    }

    /**
     * order routes
     * 
     * @return void
     */
    public static function order()
    {
        Route::namespace('Goodwong\Shop\Http\Controllers')->group(function () {
            Route::put('orders/batch-update-status', 'OrderController@batchUpdateStatus');
            Route::resource('orders', 'OrderController');
        });
    }

    /**
     * order routes
     * 
     * @return void
     */
    public static function orderItem()
    {
        Route::namespace('Goodwong\Shop\Http\Controllers')->group(function () {
        	Route::resource('order-items', 'OrderItemController');
        });
    }

    /**
     * order payment routes
     * 
     * @return void
     */
    public static function payment()
    {
        Route::namespace('Goodwong\Shop\Http\Controllers')->group(function () {
        	Route::resource('order-payments', 'OrderPaymentController');
        });
    }

    /**
     * order payment callback route
     * 
     * @return void
     */
    public static function paymentCallback()
    {
        Route::namespace('Goodwong\Shop\Http\Controllers')->group(function () {
        	Route::any('order-payments/{payment_id}/callback', 'OrderPaymentController@callback')
        	->name('order-payments.callback');
        });
    }
}
