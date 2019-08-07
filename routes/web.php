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

Route::get('/', 'mainController@index');
Route::get('/login', 'mainController@index')->name('login');
Route::get('/register', 'mainController@register')->name('register');
// Post
Route::post('/login/post', 'mainController@loginAction');
Route::post('/register/post', 'mainController@registerAction');

// Dashboard
Route::get('/dashboard', 'mainController@dashboard')->name('dashboard');
Route::get('/admin', 'adminController@index')->name('admin');
Route::get('/jadwal', 'adminController@jadwal')->name('jadwal');
Route::post('/admin/bis/post', 'adminController@bisSave');
Route::post('/admin/jadwal/post', 'adminController@jadwalSave');
Route::get('/cari/{cari}', 'mainController@cari');
Route::get('/jadwal/hapus/{id}', "adminController@hapus");
Route::get('/bis/hapus/{id}', "adminController@bisHapus");
Route::get('/logout', 'adminController@logout')->name('logout');
Route::get('/dashboard/{id}', 'mainController@pemesanan')->name('pemesanan');
Route::get('/dashboard/pemesanan/{jumlah}/{id}', 'mainController@pesan')->name('pesan');

Route::post('/dashboard/pemesanan/post', 'mainController@pesanSave')->name('pesan-save');
Route::get('/kota-tujuan', 'adminController@kotaTujuan')->name('kota-tujuan');
Route::get('/kota-berangkat', 'adminController@kotaBerangkat')->name('kota-berangkat');

Route::post('/admin/kota-berangkat/post', 'adminController@kotaBerangkatSave');
Route::post('/admin/kota-tujuan/post', 'adminController@kotaTujuanSave');

Route::get('kota-berangkat/hapus/{id}', 'adminController@kotaBerangkatHapus');
Route::get('kota-tujuan/hapus/{id}', 'adminController@kotaTujuanHapus');

Route::get('pembayaran', 'mainController@pembayaran')->name('pembayaran');

Route::get('riwayat-tiket', 'mainController@riwayat')->name('riwayat');
Route::get('cek-pembayaran/{id}', 'mainController@cekPembayaran')->name('cekpembayaran');
Route::get('konfirmasi-pembayaran', 'adminController@konfirmasiPembayaran')->name('konfirmasi-pembayaran');
Route::post('upload', 'mainController@uploadPembayaran')->name('upload');

Route::get('update-pembayaran/{id}/{idBukti}', 'adminController@updatePembayaran')->name('update-pembayaran');

Route::get('tiket', 'mainController@tiket')->name('tiket');
Route::get('lihat-tiket/{id}', 'mainController@lihatTiket');

Route::get('user', 'adminController@user')->name('user');