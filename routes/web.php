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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('biodatas', 'BiodataController');

Route::resource('biodatas', 'BiodataController');

Route::resource('ternaks', 'TernakController');


Route::get('/home', 'HomeController@index');

Route::resource('agamas', 'AgamaController');

Route::resource('articles', 'ArticleController');

Route::resource('dataUsahas', 'DataUsahaController');

Route::resource('investors', 'InvestorController');

Route::resource('investorHasTransaksiInvestasis', 'InvestorHasTransaksiInvestasiController');

Route::resource('jenisPembayarans', 'JenisPembayaranController');

Route::resource('permissions', 'PermissionController');

Route::resource('paketInvestasis', 'PaketInvestasiController');

Route::resource('peternaks', 'PeternakController');

Route::resource('progres', 'ProgresController');

Route::resource('roles', 'RoleController');

Route::resource('statusPenjualans', 'StatusPenjualanController');

Route::resource('statusTransaksiInvestasis', 'StatusTransaksiInvestasiController');

Route::resource('transaksiInvestasis', 'TransaksiInvestasiController');

Route::resource('transaksiPenjualans', 'TransaksiPenjualanController');

Route::resource('tranPenHasStatusPen', 'TransaksiPenjualanHasStatusPenjualanController');

Route::resource('users', 'UserController');

Route::resource('biodatas', 'BiodataController');

Route::resource('ternakNonInvestasis', 'TernakNonInvestasiController');

Route::resource('ternaks', 'TernakController');

Route::resource('ternakNonInvestasis', 'TernakNonInvestasiController');

Route::resource('jenisTernaks', 'JenisTernakController');