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

Route::view('admin/admin','admin.admin');



Auth::routes();

Route::get('Eshopper','FrontendController@index');

Route::resource('users','UserController');

Route::resource('banners','BannerController');

Route::resource('configurations','ConfigurationController');

Route::resource('categories','CategoryController');

Route::resource('products','ProductController');

Route::resource('attributes','ProductAttribute');

Route::resource('coupons','CouponController');

Route::get('/abc','Frontend\HomeController@DisplayImage');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getattributevalue/{id}',array('uses'=>'ProductController@myformAjax'));

