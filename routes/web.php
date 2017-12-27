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
    Route::get('/', 'DashboardController@index');

    /** Orders */
    Route::get('orders', 'DashboardController@showAllOrders')->name('orders');
    Route::post('accept/{id}', 'DashboardController@acceptOrder')->name('accept');
    Route::post('reject/{id}', 'DashboardController@rejectOrder')->name('accept');

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

    Route::get('products', 'DashboardController@showAllProducts')->name('products');

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
