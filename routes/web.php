<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TokoreportController;
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


Route::get('/claimvoucher/{toko}',[CustomerController::class, 'show'])->name('customer');
Route::post('/claimcustomer',[CustomerController::class, 'store'])->name('claimcustomer');

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/tokoqrcode/{param}',[TokoController::class, 'show'])->name('tokoshow');
    Route::get('/toko',[TokoController::class, 'index'])->name('toko');
    Route::get('/customerlist',[CustomerController::class, 'index'])->name('customerlist');
    Route::get('/reporttoko',[TokoreportController::class, 'index'])->name('reporttoko');
    Route::get('/report/date/',[TokoreportController::class, 'show'])->name('reportbydate');
  
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });
});
