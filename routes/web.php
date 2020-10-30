<?php



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

Route::get('/checkout' , 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout' , 'CheckoutController@store')->name('checkout.store');

Route::post('/coupon' , 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon' , 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/thankyou' , 'ConfirmationController@index')->name('confirmation.index');
