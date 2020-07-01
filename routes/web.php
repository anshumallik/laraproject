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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


Route::resource('student', 'StudentController');

Route::prefix('admin')->group(function () {
    Route::resource('category', 'CategoryController');
});

Route::prefix('admin')->group(function () {
    Route::get('users', 'AdminController@users')->name('users.index');
    Route::delete('users/{user}', 'AdminController@destroy')->name('users.destroy');
    Route::resource('product', 'ProductController');
    Route::get('order', 'OrderController@index')->name('order.index');
    Route::delete('order/{order}', 'OrderController@destroy')->name('order.destroy');
});


Route::get('/', 'Frontend\FrontendController@index')->name('frontend.index');
Route::get('/shop', 'Frontend\FrontendController@category')->name('frontend.category');
Route::get('shop/{id}', 'Frontend\FrontendController@category')->name('frontend.category');
Route::get('product_detail/{product}', 'Frontend\FrontendController@product_detail')->name('frontend.product');


Route::get('/addToCart/{product}', 'CartController@add')->name('cart.add');
Route::get('/shopping-cart', 'CartController@showCart')->name('cart.show');
Route::delete('/shopping-cart/{product}', 'CartController@destroy')->name('cart.remove');
Route::put('/shopping-cart/{product}', 'CartController@update')->name('cart.update');

Route::post('order/add', 'Frontend\OrderController@store')->name('order.add');

Route::get('change-password', 'Frontend\MyaccountController@changePassword')->name('change-password');
Route::post('change-password', 'Frontend\MyaccountController@store')->name('change.password');

Route::get('/orders', 'Frontend\MyaccountController@myOrder')->name('myorder');
Route::resource('myaccount', 'Frontend\MyaccountController');

Route::resource('wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);

Route::get('import-export', 'TestController@importExport');
Route::post('import', 'TestController@import')->name('import');
Route::get('export', 'TestController@export')->name('export');

Route::get('index', 'TeacherController@index')->name('teacher.index');
Route::post('getdata', 'TeacherController@getdata')->name('getdata');
