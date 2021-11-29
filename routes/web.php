<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {       //apa yg ada di url kita ambil
    return view('welcome'); 
}); 
    // segala sesuatu yg akan diakses di web project harus perhatiin ini, akan mengembalikan ke 'welcome'
    // view untuk return (mengembalikan/mengarahkan) ke halaman welcome


Route::get('/about', function () {
    return view('about');
});
Route::get('/wau', function () {
    return view('wau');
});

Route::get('/address', function () {
    return view('address');
});
Route::get('/university', function () {
    return view('university');
});

Route::get('/mahasiswa', function () {
    return view('mahasiswa');
});

Route::get('/buku', function () {
    return view('buku');
});

//bedanya get sama resource apa?

Route::resource('/mahasiswa', 'MahasiswaController');
//manggil MahasiswaController

Route::get('/buku', 'BukuController@index');


Route::get('/buku/create', 'BukuController@create')->name('buku.create'); //buka form

Route::post('/buku', 'BukuController@store')->name('buku.store'); //nyimpan data

Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy'); //hapus data

Route::post('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');

Route::post('/buku/update/{id}', 'BukuController@update')->name('buku.update');

//pertemuan 8
Route::get('/buku/search', 'BukuController@search') -> name('buku.search');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create')->name('user.create'); //buka form

Route::post('/user', 'UserController@store')->name('user.store'); //nyimpan data

Route::post('/user/delete/{id}', 'UserController@destroy')->name('user.destroy'); //hapus data

Route::get('/user/search', 'UserController@search') -> name('user.search');

Route::post('/user/edit/{id}', 'UserController@edit')->name('user.edit');

Route::post('/user/update/{id}', 'UserController@update')->name('user.update');


Route::get('/galeri', 'GaleriController@index');
Route::get('/galeri/create', 'GaleriController@create')->name('galeri.create'); //buka form

Route::post('/galeri', 'GaleriController@store')->name('galeri.store'); //nyimpan data

Route::post('/galeri/delete/{id}', 'GaleriController@destroy')->name('galeri.destroy'); //hapus data

Route::get('/galeri/edit/{id}', 'GaleriController@edit')->name('galeri.edit');

Route::post('/galeri/update/{id}', 'GaleriController@update')->name('galeri.update');


Route::group(['middleware' => ['auth','admin:Admin']], function(){
    Route::get('/user', 'UserController@index')->name('user');
});

Route::group(['middleware' => ['auth','admin:Admin,User']], function(){
    Route::get('/buku','BukuController@index');
});


Route::get('/list_buku', 'BukuController@list_buku')->name('list_buku');
Route::get('/detail_buku/{title}', 'BukuController@galbuku')->name('galeri.buku');

Route::get('/list_buku/{id}', 'BukuController@likefoto')->name('likefoto');