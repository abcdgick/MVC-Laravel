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

Route::get('/', 'App\Http\Controllers\ModelController@welcome');

Route::get('/buku', 'App\Http\Controllers\ModelController@buku');
Route::get('/createbuku/{locale?}', 'App\Http\Controllers\ModelController@createbuku');
Route::post('/savebuku', 'App\Http\Controllers\ModelController@savebuku');
Route::get('/editbuku/{id}', 'App\Http\Controllers\ModelController@editbuku') -> name('ubahbuku');
Route::post('/updatebuku/{id}', 'App\Http\Controllers\ModelController@updatebuku') -> name('modifbuku');
Route::post('/delbuku/{id}', 'App\Http\Controllers\ModelController@delbuku') -> name('hapusbuku');

Route::get('/anggota', 'App\Http\Controllers\ModelController@anggota');
Route::get('/createanggota/{locale?}', 'App\Http\Controllers\ModelController@createanggota');
Route::post('/saveanggota', 'App\Http\Controllers\ModelController@saveanggota');
Route::get('/editanggota/{id}', 'App\Http\Controllers\ModelController@editanggota') -> name('ubahanggota');
Route::post('/updateanggota/{id}', 'App\Http\Controllers\ModelController@updateanggota') -> name('modifanggota');
Route::post('/delanggota/{id}', 'App\Http\Controllers\ModelController@delanggota') -> name('hapusanggota');

Route::get('/pustakawan', 'App\Http\Controllers\ModelController@pustakawan');
Route::get('/createpustakawan/{locale?}', 'App\Http\Controllers\ModelController@createpustakawan');
Route::post('/savepustakawan', 'App\Http\Controllers\ModelController@savepustakawan');
Route::get('/editpustakawan/{id}', 'App\Http\Controllers\ModelController@editpustakawan') -> name('ubahpustakawan');
Route::post('/updatepustakawan/{id}', 'App\Http\Controllers\ModelController@updatepustakawan') -> name('modifpustakawan');
Route::post('/delpustakawan/{id}', 'App\Http\Controllers\ModelController@delpustakawan') -> name('hapuspustakawan');