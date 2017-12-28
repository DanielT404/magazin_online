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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    /** Orders */
    Route::get('orders', 'DashboardController@showAllOrders')->name('orders');
    Route::post('accept/{id}', 'DashboardController@acceptOrder')->name('order.accept');
    Route::post('reject/{id}', 'DashboardController@rejectOrder')->name('order.reject');

    /** Categories */
    Route::get('categories', 'DashboardController@showAllCategories')->name('categories');

    Route::get('category/add', 'DashboardController@add_category')->name('category.add.show');
    Route::post('category/add', 'DashboardController@add_category')->name('category.add.submit');

    Route::get('category/edit/{id}', 'DashboardController@edit_category')->name('category.edit.show');
    Route::post('category/edit/{id}', 'DashboardController@edit_category')->name('category.edit.submit');

    Route::get('category/delete/{id}', 'DashboardController@delete_category')->name('category.delete.show');
    Route::post('category/delete/{id}', 'DashboardController@delete_category')->name('category.delete.submit');

    Route::get('category/{id}/add', 'DashboardController@add_subcategory')->name('category.add.subcategory.show');
    Route::post('category/{id}/add', 'DashboardController@add_subcategory')->name('category.add.subcategory.submit');

    /** Products */
    Route::get('product/add', 'DashboardController@add_product')->name('product.add.show');
    Route::post('product/add', 'DashboardController@add_product')->name('product.add.submit');


    Route::get('product/edit/{id}', 'DashboardController@edit_product')->name('product.edit.show');
    Route::post('product/edit/{id}', 'DashboardController@edit_product')->name('product.edit.submit');

    Route::get('products', 'DashboardController@showAllProducts')->name('products');

    /** Colors */
    Route::get('color/add', 'DashboardController@add_color')->name('color.add.show');
    Route::post('color/add', 'DashboardController@add_color')->name('color.add.submit');

    Route::get('color/delete/{id}', 'DashboardController@delete_color')->name('color.delete.show');
    Route::post('color/delete/{id}', 'DashboardController@delete_color')->name('color.delete.submit');

    Route::get('colors', 'DashboardController@showAllColors')->name('colors');

    /** Lengths */
    Route::get('length/add', 'DashboardController@add_length')->name('length.add.show');
    Route::post('length/add', 'DashboardController@add_length')->name('length.add.submit');

    Route::get('length/delete/{id}', 'DashboardController@delete_length')->name('length.delete.show');
    Route::post('length/delete/{id}', 'DashboardController@delete_length')->name('length.delete.submit');

    Route::get('lengths', 'DashboardController@showAllLengths')->name('lengths');

    /** Slider images (index) */
    Route::get('slider/images', 'DashboardController@showAllSliderImages')->name('slider_images');

    Route::get('slider/add', 'DashboardController@add_slider_image')->name('slider_image.add.show');
    Route::post('slider/add', 'DashboardController@add_slider_image')->name('slider_image.add.submit');

    Route::get('slider/edit/{id}/{status}', 'DashboardController@edit_slider_image')->name('slider_image.edit.show');
    Route::post('slider/edit/{id}/{status}', 'DashboardController@edit_slider_image')->name('slider_image.edit.submit');

    /** Side slider images (index) */
    Route::get('slider/side/images', 'DashboardController@showAllSideSliderImages')->name('side_slider_images');

    Route::get('slider/side/add', 'DashboardController@add_side_slider_image')->name('side_slider_image.add.show');
    Route::post('slider/side/add', 'DashboardController@add_side_slider_image')->name('side_slider_image.add.submit');

    Route::get('slider/side/edit/{id}/{status}', 'DashboardController@edit_side_slider_image')->name('side_slider_image.edit.show');
    Route::post('slider/side/edit/{id}/{status}', 'DashboardController@edit_side_slider_image')->name('side_slider_image.edit.submit');



});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('userLogout', 'Auth\LoginController@userLogout')->name('userLogout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('adminLogin');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('adminLogout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('adminRegister');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
