<?php

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



 Route::get('/home','App\Http\Controllers\ClientController@home');

  Route::get('/shop','App\Http\Controllers\ClientController@shop');

    Route::get('/login2','App\Http\Controllers\ClientController@login2');

  Route::get('/register2','App\Http\Controllers\ClientController@register2');
        Route::get('/cart','App\Http\Controllers\ClientController@cart');
        Route::get('/removeitem/{id}','App\Http\Controllers\ClientController@removeitem')->name('removeitem');






          Route::get('/checkout','App\Http\Controllers\ClientController@checkout');
          Route::post('updateqty','App\Http\Controllers\ClientController@updateqty')->name('updateqty');

          Route::get('/admin','App\Http\Controllers\AdminController@dashboard')->name('dashboard');


  Route::get('/categories','App\Http\Controllers\CategoryController@categories')->name('categories');
  Route::get('/addcategory','App\Http\Controllers\CategoryController@addcategory')->name('addcategory');
  Route::post('/savecategory','App\Http\Controllers\CategoryController@savecategory')->name('savecategory');
  Route::get('/edit_category/{id}','App\Http\Controllers\CategoryController@editcategory')->name('editcategory');
  Route::post('/updatecategory','App\Http\Controllers\CategoryController@updatecategory')->name('updatecategory');
  Route::get('/deletecategory/{id}','App\Http\Controllers\CategoryController@deletecategory')->name('deletecategory');
  Route::get('/view_by_cat/{name}','App\Http\Controllers\CategoryController@view_by_cat')->name('view_by_cat');


    Route::get('/products','App\Http\Controllers\ProductController@products')->name('products');
    Route::get('/addproduct','App\Http\Controllers\ProductController@addproduct')->name('addproduct');
    Route::post('/saveproduct','App\Http\Controllers\ProductController@saveproduct')->name('saveproduct');
    Route::get('/edit_product/{id}','App\Http\Controllers\ProductController@editproduct')->name('editproduct');
    Route::post('/updateproduct','App\Http\Controllers\ProductController@updateproduct')->name('updateproduct');
    Route::get('/deleteproduct/{id}','App\Http\Controllers\productController@deleteproduct')->name('deleteproduct');
    Route::get('/activate_product/{id}','App\Http\Controllers\productController@activateproduct')->name('activate_product');
    Route::get('/unactivate_product/{id}','App\Http\Controllers\productController@unactivateproduct')->name('unactivate_product');
    Route::get('/addToCart/{id}','App\Http\Controllers\productController@addToCart')->name('addTocart');




    Route::get('/sliders','App\Http\Controllers\SliderController@sliders')->name('sliders');
    Route::get('/addslider','App\Http\Controllers\SliderController@addslider')->name('addslider');
    Route::post('/saveslider','App\Http\Controllers\SliderController@saveslider')->name('saveslider');
    Route::get('/edit_slider/{id}','App\Http\Controllers\SliderController@editslider')->name('edit_slider');
    Route::post('/updateslider','App\Http\Controllers\SliderController@updateslider')->name('updateslider');
    Route::get('/deleteslider/{id}','App\Http\Controllers\sliderController@deleteslider')->name('deleteslider');
    Route::get('/activate_slider/{id}','App\Http\Controllers\sliderController@activateslider')->name('activate_slider');
    Route::get('/unactivate_slider/{id}','App\Http\Controllers\sliderController@unactivateslider')->name('unactivate_slider');



    Route::get('/orders','App\Http\Controllers\AdminController@orders')->name('orders');
