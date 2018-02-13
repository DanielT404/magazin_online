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
Route::get('despre-noi', 'HomeController@aboutUs')->name('aboutUs');
Route::get('contact', 'HomeController@contact')->name('contact');


Route::get('produse', 'ProductController@index')->name('product.show.all');
Route::get('produse/{slug}', 'ProductController@findProduct')->name('product.find.show');

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    /** Orders */
    Route::get('comenzi', 'DashboardController@showAllOrders')->name('orders');
    Route::post('accepta/{id}', 'DashboardController@acceptOrder')->name('order.accept');
    Route::post('respinge/{id}', 'DashboardController@rejectOrder')->name('order.reject');

    /** Categories */
    Route::get('categorii', 'DashboardController@showAllCategories')->name('categories');

    Route::get('categorii/adauga', 'DashboardController@add_category')->name('category.add.show');
    Route::post('categorii/adauga', 'DashboardController@add_category')->name('category.add.submit');

    Route::get('categorii/modifica/{id}', 'DashboardController@edit_category')->name('category.edit.show');
    Route::post('categorii/modifica/{id}', 'DashboardController@edit_category')->name('category.edit.submit');

    Route::get('categorii/sterge/{id}', 'DashboardController@delete_category')->name('category.delete.show');
    Route::post('categorii/sterge/{id}', 'DashboardController@delete_category')->name('category.delete.submit');

    Route::get('categorii/{id}/adauga', 'DashboardController@add_subcategory')->name('category.add.subcategory.show');
    Route::post('categorii/{id}/adauga', 'DashboardController@add_subcategory')->name('category.add.subcategory.submit');

    /** Products */
    Route::get('produs/adauga', 'DashboardController@add_product')->name('product.add.show');
    Route::post('produs/adauga', 'DashboardController@add_product')->name('product.add.submit');


    Route::get('produs/modifica/{id}', 'DashboardController@edit_product')->name('product.edit.show');
    Route::post('produs/modifica/{id}', 'DashboardController@edit_product')->name('product.edit.submit');

    Route::get('produse', 'DashboardController@showAllProducts')->name('products');

    /** Colors */
    Route::get('culoare/adauga', 'DashboardController@add_color')->name('color.add.show');
    Route::post('culoare/adauga', 'DashboardController@add_color')->name('color.add.submit');

    Route::get('culoare/sterge/{id}', 'DashboardController@delete_color')->name('color.delete.show');
    Route::post('culoare/sterge/{id}', 'DashboardController@delete_color')->name('color.delete.submit');

    Route::get('culori', 'DashboardController@showAllColors')->name('colors');

    /** Lengths */
    Route::get('marime/adauga', 'DashboardController@add_length')->name('length.add.show');
    Route::post('marime/adauga', 'DashboardController@add_length')->name('length.add.submit');

    Route::get('marime/sterge/{id}', 'DashboardController@delete_length')->name('length.delete.show');
    Route::post('marime/sterge/{id}', 'DashboardController@delete_length')->name('length.delete.submit');

    Route::get('marimi', 'DashboardController@showAllLengths')->name('lengths');

    /** Slider images (index) */
    Route::get('slider/imagini', 'DashboardController@showAllSliderImages')->name('slider_images');

    Route::get('slider/adauga', 'DashboardController@add_slider_image')->name('slider_image.add.show');
    Route::post('slider/adauga', 'DashboardController@add_slider_image')->name('slider_image.add.submit');

    Route::get('slider/modifica/{id}/{status}', 'DashboardController@edit_slider_image')->name('slider_image.edit.show');
    Route::post('slider/modifica/{id}/{status}', 'DashboardController@edit_slider_image')->name('slider_image.edit.submit');

    /** Side slider images (index) */
    Route::get('slider/lateral/imagini', 'DashboardController@showAllSideSliderImages')->name('side_slider_images');

    Route::get('slider/lateral/adauga', 'DashboardController@add_side_slider_image')->name('side_slider_image.add.show');
    Route::post('slider/lateral/adauga', 'DashboardController@add_side_slider_image')->name('side_slider_image.add.submit');

    Route::get('slider/lateral/modifica/{id}/{status}', 'DashboardController@edit_side_slider_image')->name('side_slider_image.edit.show');
    Route::post('slider/lateral/modifica/{id}/{status}', 'DashboardController@edit_side_slider_image')->name('side_slider_image.edit.submit');

    /** Brand images */
    Route::get('brand/imagini', 'DashboardController@showAllBrandImages')->name('brand_images');

    Route::get('brand/adauga', 'DashboardController@add_brand_image')->name('brand_image.add.show');
    Route::post('brand/adauga', 'DashboardController@add_brand_image')->name('brand_image.add.submit');

    Route::get('brand/modifica/{id}/{status}', 'DashboardController@edit_brand_image')->name('brand_image.edit.show');
    Route::post('brand/modifica/{id}/{status}', 'DashboardController@edit_brand_image')->name('brand_image.edit.submit');



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


/** facebook login */
Route::get('facebook/login', 'FacebookAuthController@redirectToProvider')->name('facebook.login');
Route::get('facebook/callback', 'FacebookAuthController@handleProviderCallback')->name('facebook.callback');



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
