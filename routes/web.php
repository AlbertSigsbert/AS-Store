<?php

use App\Mail\OrderPlaced;
use App\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::view('/' , 'landing-page');
Route::get('/' , 'LandingPageController@index')->name('landing-page');
Route::get('/shop' , 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}' , 'ShopController@show')->name('shop.show');

Route::get('/cart' , 'CartController@index')->name('cart.index');
Route::post('/cart' , 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}' , 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}' , 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/saveForLater/{product}' , 'CartController@saveForLater')->name('cart.saveForLater');

Route::delete('/saveForLater/{product}' , 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/moveToCart/{product}' , 'SaveForLaterController@moveToCart')->name('saveForLater.moveToCart');

Route::get('/checkout' , 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout' , 'CheckoutController@store')->name('checkout.store');

Route::post('paypal-checkout' , 'CheckoutController@paypalCheckout')->name('checkout.paypal');

Route::get('/guestCheckout' , 'CheckoutController@index')->name('guestCheckout.index');

Route::post('/coupon' , 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon' , 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/thankyou' , 'ConfirmationController@index')->name('confirmation.index');


/*Route::get('/mailable' , function () {
    $order = Order::find(1);

    return new OrderPlaced($order);
});*/

Route::get('/search' , 'ShopController@search')->name('search');
Route::get('/search-algolia' , 'ShopController@searchAlgolia')->name('search-algolia');

Route::get('/blog' , 'BlogController@index')->name('blog.index');
Route::get('/blog/{slug}' , 'BlogController@show')->name('blog.show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile' , 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile' , 'UsersController@update')->name('users.update');

    Route::get('/my-orders' , 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}' , 'OrdersController@show')->name('orders.show');
});

