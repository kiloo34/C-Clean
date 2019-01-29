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
    return view('dashboard.home');
});

// Route::get('/', 'UserController@index')->name('dash');


// Route::group(['middleware' => ['master']], function () {
//     Route::get('/master', 'MasterController@index');
// });

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::resource('order', 'OrderController');
    Route::resource('service', 'ServiceController');
    Route::get('service/listProduk/{id}', 'ServiceController@listProdukService')->name('service.listProdukService');
    Route::resource('produk', 'ProdukController');
    Route::resource('cabang', 'CabangController');
    Route::get('/cabang/kabupaten/{id}', 'CabangController@kabupaten');
    Route::get('/cabang/kecamatan/{id}', 'CabangController@kecamatan');
    Route::get('/cabang/desa/{id}', 'CabangController@desa');
});
// Route::get('/', 'UserController@index')->name('dash');

Auth::routes();

Route::post('/daftar', 'MemberController@daftar')->name('daftar');

Route::get('/', 'HomeController@index')->name('home');

Route::resource('order', 'OrderController')->except('edit', 'update', 'destroy');
Route::resource('member', 'MemberController');


