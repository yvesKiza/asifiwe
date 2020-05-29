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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('login');
});
Route::get('products/{id}/price','ProductController@getPrice')->name('price.get');
Route::Post('products/{id}/price','ProductController@setPrice')->name('price.set');;
Route::resource('products', 'ProductController');


Route::resource('suppliers', 'SupplierController');
Route::resource('manufacturers', 'ManufacturerController');
Route::resource('productTypes', 'ProductTypeController');

Route::post('users', 'UserController@addUser')->name('user.store');
Route::get('user/create', 'UserController@getUser')->name('user.create');
Route::get('users', 'UserController@users')->name('user.index');
Route::get('user/{id}', 'UserController@show')->name('user.show');
Route::Post('user/{id}/delete','UserController@deleteUser')->name('user.delete');
Route::get('user/{id}/purchases', 'UserController@purchases')->name('user.purchase');
Route::get('user/{id}/sales', 'UserController@sales')->name('user.sales');


Route::post('purchase/create', 'TransactionController@purchase')->name('purchase.create');
Route::get('purchase/create', 'TransactionController@create');
Route::post('carts','TransactionController@cart')->name('ajax');
Route::post('carts/delete', 'TransactionController@deleteCart')->name('deleteCart');
Route::get('carts','TransactionController@createCart')->name('create.cart');
Route::get('checkout/create', 'TransactionController@bringCheckout')->name('bring.checkout');
Route::Post('checkout','TransactionController@checkout');
Route::get('users/create', 'UserController@getUser');
Route::get('stock/', 'TransactionController@getStock')->name('stock.index');
Route::get('purchases/', 'TransactionController@getPurchases')->name('purchase.index');
Route::get('sales/', 'TransactionController@getSales')->name('sales.index');
Route::get('bill/{id}','TransactionController@getBill')->name('bill.show');
Route::get('bill/{id}/pdf','TransactionController@downloadPdf')->name('bill.pdf');
Route::get('purchases/pdf','TransactionController@purchasePDF')->name('purchase.pdf');
Route::get('bills/','TransactionController@bills')->name('bill.index');
Route::get('stock/pdf/','TransactionController@stockPDF')->name('stock.pdf');
Route::get('sales/pdf/','TransactionController@salesPDF')->name('sales.pdf');
Route::post('purchases/filter/','TransactionController@purchaseFilter')->name('purchaseFilter');
Route::post('sales/filter/','TransactionController@salesFilter')->name('salesFilter');



