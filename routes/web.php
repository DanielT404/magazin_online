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

Route::get('/', 'HomeController@index');

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('orders', 'DashboardController@showAllOrders')->name('orders');
    Route::post('accept/{id}', 'DashboardController@acceptOrder')->name('accept');
    Route::post('reject/{id}', 'DashboardController@rejectOrder')->name('accept');


    Route::get('categories', 'DashboardController@categories')->name('categories');
    Route::get('add_category', 'DashboardController@add_category')->name('add_category');
    Route::post('add_category', 'DashboardController@add_category')->name('add_category');
    Route::get('edit_category', 'DashboardController@edit_category')->name('edit_category');
    Route::get('delete_category', 'DashboardController@delete_category')->name('delete_category');


    Route::get('add_product', 'DashboardController@add_product')->name('add_product');
    Route::get('products', 'DashboardController@showAllProducts')->name('products');

});

//Route::get('/dashboard', 'DashboardController@index');
//Route::get('orders', 'DashboardController@orders')->name('orders');

$this->get('admin', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
