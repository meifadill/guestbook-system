<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_broadcast;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TamuInapController;
use App\Http\Controllers\LoginController;


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

//group ini dapat di akses tanpa login
Route::group(['middleware'=>['belumLogin']], function(){

    Route::get('/login', function () {
        return view('auth/login');
    });
    Route::post('/login', [LoginController::class, 'cekUser'])->name("login");

});

//group ini dapat di akses sesudah login
Route::group(['middleware'=>['sudahLogin']], function(){

    //beranda
    Route::get('/', [TamuController::class, 'indexAdmin']);
    Route::get('/beranda', [TamuController::class, 'indexAdmin']);

    Route::get('/data-tamu', [TamuController::class, 'index']);
    Route::post('/filter-tamu', [TamuController::class, 'filterTanggal'])->name("filter");
    Route::get('/export-tamu', [TamuController::class, 'exportTamu']);

    //data tamu reservasi
    Route::post('/simpan-tamu-inap', [TamuInapController::class, 'simpan'])->name("simpan.tamuInap");
    Route::post('/edit-tamu-inap', [TamuInapController::class, 'edit'])->name("edit.tamuInap");
    Route::get('/data-tamu-inap', [TamuInapController::class, 'index']);
    Route::post('/filter-tamuInap', [TamuInapController::class, 'filterTanggal'])->name("filter");
    Route::get('/export-tamu-inap', [TamuInapController::class, 'exportTamuInap']);
    Route::get('/delete-tamu-inap/{id}', [TamuInapController::class, 'deleteTamuInap']);

    //broadcast
    Route::get('/broadcast', [C_broadcast::class, 'index']);
    Route::post('/kirim-broadcast', [C_broadcast::class, 'kirimBroadcast'])->name("kirim.broadcast");
    Route::post('/edit-nomor', [C_broadcast::class, 'EditNomor'])->name("editNomor");
    Route::get('/delete-nomor/{id}', [C_broadcast::class, 'deleteNo']);
    Route::get('/delete-broadcast/{id}', [C_broadcast::class, 'deleteBroadcast']);


});

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/landing-page', function () {
    return view('tamu/app');
});
Route::post('/kirim-tamu', [TamuController::class, 'kirim'])->name("kirim.tamu");
Route::post('/landing-page', [TamuController::class, 'kirim_no'])->name("kirim.no");


