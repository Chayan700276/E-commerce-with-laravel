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

//routes for admin panel
route::get('admin','adminController@index')->middleware('adminMiddleware');
route::get('dashboard','adminController@dashboard')->middleware('superAdminMiddleware');
route::get('dashboard','adminController@dashboard')->middleware('superAdminMiddleware');
route::post('login-check','adminController@loginCheck');


//routes for superadminController

route::get('logout','superAdminController@logout');
// route for Category model in admin panel
route::get('categoryPage','CategoryController@category');
route::get('unpublish-category/{id}','CategoryController@UnpublishCategory');
route::get('publish-category/{id}','CategoryController@publishCategory');
route::resource('category','CategoryController');
route::get('productPage','ProductController@product');
route::resource('product','ProductController');

//route for website 

route::get('/','viewpageController@index');
route::get('catProduct/{id}','viewpageController@categoryProduct');
route::get('offers/','viewpageController@offers');
route::get('contact/','viewpageController@contact');
route::get('login/','viewpageController@login');
route::get('register/','viewpageController@register');

route::resource('customer','CustomerController');


// routes for user controller....





//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
