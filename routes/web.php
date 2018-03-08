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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',['as' => 'trang-chu', 'uses' => 'PageController@getIndex']);
Route::get('loai-san-pham/{id}',['as' => 'loaisanpham', 'uses' => 'PageController@getProductType']);
Route::get('chi-tiet-san-pham/{id}',['as' => 'chitietsanpham', 'uses' => 'PageController@getProductDetail']);
Route::get('lien-he',['as' => 'lienhe', 'uses' => 'PageController@getContacts']);
Route::get('gioi-thieu',['as' => 'gioithieu', 'uses' => 'PageController@getIntroduction']);

// Add items product
Route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=>'PageController@getAddToCart']);

//Delete items product by cart
Route::get('del-item-cart/{id}',['as'=>'xoagiohang','uses'=>'PageController@getDelItemCart']);

// Check out cart.
Route::get('dat-hang',['as'=>'dathang','uses'=>'PageController@getShoppingCart']);
Route::post('dat-hang',['as'=>'dathang','uses'=>'PageController@postShoppingCart']);

// Login users
Route::get('dang-nhap',['as'=>'dangnhap','uses'=>'PageController@getLogin']);
Route::post('dang-nhap',['as'=>'dangnhap','uses'=>'PageController@postLogin']);

// Register Users
Route::post('dang-ky',['as'=>'dangky','uses'=>'PageController@postSignup']);
Route::get('dang-ky',['as'=>'dangky','uses'=>'PageController@getSignup']);

// logout users
Route::get('dang-xuat',['as'=>'dangxuat','uses'=>'PageController@getDangXuat']);

// search product
Route::get('tim-kiem',['as'=>'search','uses'=>'PageController@getSearch']);