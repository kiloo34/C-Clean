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

Route::group(['middleware' => ['admin']], function () {
    Route::resource('admin', 'AdminController');
    Route::resource('order', 'OrderController');
    Route::get('/order/getProduk/{id}', 'OrderController@getProduk');
    Route::get('/order/getDetailProduk/{service}/{id}', 'OrderController@getDetailProduk');
    Route::resource('service', 'ServiceController');
    Route::get('service/listProduk/{id}', 'ServiceController@listProdukService')->name('service.listProdukService');
    Route::resource('produk', 'ProdukController');
    Route::resource('cabang', 'CabangController');
    Route::get('/cabang/kabupaten/{id}', 'CabangController@kabupaten');
    Route::get('/cabang/kecamatan/{id}', 'CabangController@kecamatan');
    Route::get('/cabang/desa/{id}', 'CabangController@desa');
    Route::resource('akses', 'RoleController');
    Route::get('/akses/DetailAkses/{id}', 'RoleController@getDetailAkses');
    Route::post('/akses/{role}/{id}', 'RoleController@tambahAkses')->name('akses.tambahAkses');
    Route::get('/akses/edit/{role}/{id}', 'RoleController@UpdateAkses')->name('akses.ubah');
    Route::resource('anggota', 'AnggotaController');
});
Auth::routes();

Route::post('/daftar', 'MemberController@daftar')->name('daftar');

Route::get('/', 'HomeController@index')->name('home');

Route::resource('order', 'OrderController')->except('edit', 'update', 'destroy');
Route::resource('member', 'MemberController');


