<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/homepage','PageController@home')->name('homepage');

// Route::get('/about','PageController@about')->name('aboutpage');

// Route::get('/post','PageController@post')->name('postpage');

// Route::get('/contact','PageController@contact')->name('contactpage');


// CRUD

Route::middleware('auth','role:admin')->group(function(){

    Route::resource('brand','BrandController');

    Route::resource('category','CategoryController');

    Route::resource('subcategory','SubcategoryController');

    Route::resource('item','ItemController');

    
});
Route::resource('order','OrderController');


//Authentication

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 


//Home Page

Route::get('/', 'HomepageController@index')->name('index');

Route::get('/detail/{id}', 'HomepageController@detail')->name('detail');

Route::get('/cart', 'HomepageController@cart')->name('cart');

// Route::get('/quickview', 'HomepageController@quickview')->name('quickview');

Route::get('/checkout', 'HomepageController@checkout')->name('checkout');

Route::get('/about_us', 'HomepageController@about_us')->name('about_us');

Route::get('/contact', 'HomepageController@contact')->name('contact');

Route::get('/shop/{id}', 'HomepageController@shop')->name('shop');

Route::get('/shops', 'HomepageController@shops')->name('shops');

Route::get('/brand_shop/{id}', 'HomepageController@brand_shop')->name('brand_shop');

Route::get('/ordersuccess', 'HomepageController@ordersuccess')->name('ordersuccess');

Route::post('/search','SearchController@search')->name('search');


