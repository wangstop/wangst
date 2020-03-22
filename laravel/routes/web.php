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

Route::get('/', 'FrontController@index');

// Route::get('/', 'FrontController@news');

Route::get('/news','FrontController@news');
Route::get('/front/news_inner/{id}','FrontController@news_inner');




Route::get('/proucts_Types', 'FrontController@proucts_Types');
Route::get('/products/{products_id}','FrontController@proucts');


// 購物首頁

Route::get('/product_detail/{product_id}','FrontController@product_detail');


// 加入購物車
Route::post('/add_cart/{product_id}','FrontController@add_cart');

// 總覽
Route::get('/cart','FrontController@cart_total');

// 更新購物車數量
Route::post('/update_cart/{product_id}','FrontController@update_cart');
// 刪除商品
Route::post('/delete_cart/{product_id}','FrontController@delete_cart');
// 結帳頁
Route::get('/cart_checkout','FrontController@cart_checkout');

Route::post('/cart_checkout_end','FrontController@cart_checkout_end');

Route::get('/order','FrontController@order');


// 綠界金流
Route::get('/text_checkout','FrontController@text_checkout');


// 聯絡我們
Route::get('/contactUs','FrontController@contactUs');
Route::post('/contactUs/store','FrontController@contactUs_store');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/news', 'NewController@index');


// 儲存
Route::post('/home/news/store', 'NewController@store');
// 新增
Route::get('/admin/news/create', 'NewController@create');
// 修改
Route::get('/admin/news/edit/{id}', 'NewController@edit');
// 更新
Route::post('/admin/news/update/{id}', 'NewController@update');
// 刪除
Route::post('/admin/news/delete/{id}', 'NewController@delete');
// 點擊刪除多張圖片
Route::post('/admin/news/ajax', 'NewController@ajax');


Route::post('/home/ajax_post_sort', 'NewController@ajax_post_sort');



// 產品類型管理

Route::get('/home/product_types', 'ProductTypeController@index');

// 新增
Route::get('/admin/product_type/create', 'ProductTypeController@create');

// 儲存
Route::post('/home/product_type/store', 'ProductTypeController@store');

// 修改
Route::get('/admin/product_type/edit/{id}', 'ProductTypeController@edit');
// 更新
Route::post('/admin/product_type/update/{id}', 'ProductTypeController@update');
// 刪除
Route::post('/admin/product_type/delete/{id}', 'ProductTypeController@delete');


// 產品管理

Route::get('/home/products', 'ProductsController@index');

// 儲存
Route::post('/home/products/store', 'ProductsController@store');
// 新增
Route::get('/admin/products/create', 'ProductsController@create');
// 修改
Route::get('/admin/products/edit/{id}', 'ProductsController@edit');
// 更新
Route::post('/admin/products/update/{id}', 'ProductsController@update');
// 刪除
Route::post('/admin/products/delete/{id}', 'ProductsController@delete');


});






