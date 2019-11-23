<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::patch('/users/{user}', 'UserController@update')->name('users.update');
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
Route::patch('/categories/{category}', 'CategoryController@update')->name('categories.update');
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

Route::get('/products/{product}', 'ProductController@show')->name('products.show');
Route::patch('/products/{product}', 'ProductController@update')->name('products.update');
Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');

Route::get('/reviews/{review}', 'ReviewController@show')->name('reviews.show');
Route::patch('/reviews/{review}', 'ReviewController@update')->name('reviews.update');
Route::delete('/reviews/{review}', 'ReviewController@destroy')->name('reviews.destroy');

Route::get('/promotions/{promotion}', 'PromotionController@show')->name('promotions.show');
Route::patch('/promotions/{promotion}', 'PromotionController@update')->name('promotions.update');
Route::delete('/promotions/{promotion}', 'PromotionController@destroy')->name('promotions.destroy');

Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
Route::patch('/orders/{order}', 'OrderController@update')->name('orders.update');
Route::delete('/orders/{order}', 'OrderController@destroy')->name('orders.destroy');

Route::get('/reservations/{reservation}', 'ReservationController@show')->name('reservations.show');
Route::patch('/reservations/{reservation}', 'ReservationController@update')->name('reservations.update');
Route::delete('/reservations/{reservation}', 'ReservationController@destroy')->name('reservations.destroy');

Route::get('/payments/{payment}', 'PaymentController@show')->name('payments.show');
Route::patch('/payments/{payment}', 'PaymentController@update')->name('payments.update');
Route::delete('/payments/{payment}', 'PaymentController@destroy')->name('payments.destroy');

Route::get('/ingredients/{ingredient}', 'IngredientController@show')->name('ingredients.show');
Route::patch('/ingredients/{ingredient}', 'IngredientController@update')->name('ingredients.update');
Route::delete('/ingredients/{ingredient}', 'IngredientController@destroy')->name('ingredients.destroy');
