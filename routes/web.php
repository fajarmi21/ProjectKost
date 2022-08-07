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

Route::get('/', 'App\Http\Controllers\HomeController@indexhome');
Route::get('/home/detail/{id}', 'App\Http\Controllers\HomeController@show');
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/daftarkost', 'App\Http\Controllers\KostController@indexkost')->name('kost');
Route::get('/fas', 'App\Http\Controllers\FasilitasController@indexfas');

// Route untuk cek role
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'cek_login:1'], function () {
        Route::resource('penyewa', 'App\Http\Controllers\PenyewaController');
        Route::post('/penyewa/konfirmasi/{id}', 'App\Http\Controllers\PenyewaController@konfirmasi')->name('penyewa.konfirmasi');
        //manajemen data pengunjung
        Route::get('/indexpengunjung', 'App\Http\Controllers\PenyewaController@indexpengunjung');
        Route::resource('fasilitas','App\Http\Controllers\FasilitasController');
    });
    Route::group(['middleware' => 'cek_login:4'], function () {
        Route::get('/pengunjung', 'App\Http\Controllers\PenyewaController@pengunjung');
        Route::post('/pengunjung/store','App\Http\Controllers\PenyewaController@store');
    });
    Route::group(['middleware' => 'cek_login:5'], function () {
        Route::resource('user','App\Http\Controllers\UserController');
    });
    Route::group(['middleware' => 'cek_login:6'], function () {
        Route::get('/booking/pesan/{id}','App\Http\Controllers\BookingController@create');
        Route::post('/booking/store/{id}', 'App\Http\Controllers\BookingController@store');
    });
    Route::resource('booking','App\Http\Controllers\BookingController');
    Route::resource('dashboard', 'App\Http\Controllers\DashboardController');
    Route::resource('pembayaran', 'App\Http\Controllers\PembayaranController');
    Route::get('/pembayaran/create/{id}', 'App\Http\Controllers\PembayaranController@create')->name('pembayaran.create');
    Route::post('/pembayaran/konfirmasi/{id}', 'App\Http\Controllers\PembayaranController@konfirmasi');
    Route::post('/pembayaran/konfirmasi/admin/{id}', 'App\Http\Controllers\PembayaranController@konfirmasiadmin')->name('admin.konfirmasi');
    Route::get('/pembayaran/{id}/{bln}', 'App\Http\Controllers\PembayaranController@show')->name('pembayaran.showBln');
    Route::resource('komplain','App\Http\Controllers\KomplainController');
    Route::post('/komplain/konfirmasi/{id}', 'App\Http\Controllers\KomplainController@konfirmasi')->name('komplain.konfirmasi');
    Route::resource('kost','App\Http\Controllers\KostController');
    Route::get('/notabooking/{id}','App\Http\Controllers\BookingController@NotaBooking');
    Route::get('/notapembayaran/{id}','App\Http\Controllers\PembayaranController@NotaPembayaran');
    Route::get('/profil/{id}','App\Http\Controllers\BerandaController@profil');
    Route::get('/ganti-password/{id}','App\Http\Controllers\BerandaController@password');
    Route::put('/ganti-password/{id}','App\Http\Controllers\BerandaController@gantipassword')->name('profil.update');
});
// require __DIR__ . '/auth.php';

// php artisan db:seed

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
