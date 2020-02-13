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

Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin','middleware'=>['auth','admin']], function(){

	Route::get('/dashboard', 'AdminController@index')->name('dashboard');

	Route::resource('user', 'UserController');

    Route::resource('article', 'ArticleController');

    Route::resource('blogPost', 'BlogPostController');

    Route::resource('category', 'CategoryController');

    Route::resource('coupon', 'CouponController');

    Route::resource('fileUpload', 'FileUploadController');

    Route::resource('matalot', 'MatalotController');

    Route::resource('nosim', 'NosimController');

    Route::resource('nosimGroup', 'NosimGroupController');

    Route::resource('question', 'QuestionController');

    Route::resource('subcategory', 'SubcategoryController');

    Route::resource('subscriber', 'SubscriberController');

});
