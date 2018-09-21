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
// Frontend site..................................................................
Route::get('/','HomeController@index');
//show category wise product here.................................................
Route::get('/product_by_category/{category_id}','HomeController@show');
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@create');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');
//cart routes here................................................................
Route::post('/add-to-cart','CartController@store');
Route::get('/show-cart','CartController@show'); 
Route::get('/delete-to-cart/{rowId}','CartController@destroy');
Route::post('/update-cart','CartController@update');
//checkout routes here...........................................................
Route::get('/login-check','CheckoutController@index');
Route::post('/customer_registration','CheckoutController@store');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping','CheckoutController@save_shipping');
//login and logout here..........................................................
Route::post('/customer_login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');
//payment routes here...........................................................
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');






// Backend routes...........................................................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@create');

//Category related routes....................................................
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@create');
Route::post('/save-category','CategoryController@store');
Route::get('/edit-category/{category_id}','CategoryController@edit');
Route::post('/update-category/{category_id}','CategoryController@update');
Route::get('/delete-category/{category_id}','CategoryController@destroy');
Route::get('/deactive-category/{category_id}','CategoryController@deactive');
Route::get('/active-category/{category_id}','CategoryController@active');

//Manufacture related routes...................................................
Route::get('/add-manufacture','ManufactureController@index');
Route::post('/save-manufacture','ManufactureController@store');
Route::get('/all-manufacture','ManufactureController@create');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@destroy');
Route::get('/deactive-manufacture/{manufacture_id}','ManufactureController@deactive');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update');

//Manufacture related routes..........................................................
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@store');
Route::get('/all-product','ProductController@create');
Route::get('/delete-product/{product_id}','ProductController@destroy');
Route::get('/deactive-product/{product_id}','ProductController@deactive');
Route::get('/active-product/{product_id}','ProductController@active');

//Slider related routes...............................................................
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@store');
Route::get('/all-slider','SliderController@create');
Route::get('/delete-slider/{slider_id}','SliderController@destroy');
Route::get('/deactive-slider/{slider_id}','SliderController@deactive');
Route::get('/active-slider/{slider_id}','SliderController@active');

//Manage Order routes..................................................................
Route::get('/manage-order','ManageOrderController@index');
Route::get('/view-order/{order_id}','ManageOrderController@create');