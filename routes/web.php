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
/*use App\Loai;
Route::get('/danhsachloai', function() {
    // Eloquent Model de lay du lieu
    // $ds_loai = Loai::all(); // SELECT * FROM loai
    $ds_loai = DB::table('loai')->get();
    $json = json_encode($ds_loai);
    return $json;
});
*/
Route::get('/danhsachloai', 'LoaiController@index')->name('danhsachloai.index');
Route::get('/danhsachchude', 'ChudeController@index')->name('danhsachchude.index');