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


Auth::routes();

Route::get('/register-seller', 'SellerController@showSellerRegister')->name('register-seller');
Route::post('/register-seller', 'SellerController@addSellerData');

Route::get('/', 'HomeController@index')->name('home');
Route::get('view-product/{product}', 'HomeController@viewProduct')->name('view-product');
Route::post('rating', 'HomeController@addRating')->name('add-rating');
Route::match(['PUT', 'PATCH'], '/rating/{rating}', 'HomeController@updateRating')->name('update-rating');
Route::get('catalog', 'HomeController@catalog')->name('catalog');
Route::get('view-category/{id}', 'HomeController@viewCategory')->name('view-category');
Route::get('view-cart', 'ProductController@viewCart')->name('view-cart');
Route::get('view-payment', 'ProductController@viewPayment')->name('view-payment');
Route::post('search-product', 'HomeController@searchProduct');


Route::post('cart', 'ProductController@createCart');
Route::get('update-cart/{cart}', 'ProductController@editCart')->name('edit-cart');
Route::match(['PUT', 'PATCH'], '/update-cart/{cart}','ProductController@updateCart');
Route::delete('delete-cart/{cart}', 'ProductController@deleteCart');
Route::post('checkout', 'ProductController@checkOut');
Route::get('history', 'ProductController@transactionHistory')->name('history');
Route::get('return-rent/{id}', 'ProductController@returnRentConfirmation')->name('return-rent');
Route::get('return/{id}', 'ProductController@returnRent')->name('return');

Route::get('/add-product', 'SellerController@createProduct')->name('add-product');
Route::post('/add-product', 'SellerController@addProduct');
Route::get('/edit-product/{product}', 'SellerController@editProduct')->name('edit-product');
Route::match(['PUT', 'PATCH'], '/edit-product/{id}', 'SellerController@updateProduct');
Route::delete('/delete-product/{id}', 'SellerController@deleteProduct');

Route::get('/add-category', 'SellerController@createType')->name('add-type');
Route::post('/add-category', 'SellerController@addType');
Route::get('/edit-category/{id}', 'SellerController@editType')->name('edit-type');
Route::match(['PUT', 'PATCH'], '/edit-category/{id}', 'SellerController@updateType');
Route::delete('/delete-category/{id}', 'SellerController@deleteType');
Route::get('/edit_product/{id}', 'SellerController@editProduct');
Route::get('/delete_product/{id}', 'SellerController@deleteProduct');