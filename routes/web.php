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

Route::get('home', function () {
    return view('home');
});

/*DEPAN*/
Route::get('/makanan','makananController@index');


/*BELAKANG*/
Route::get('/makananIndex','makananIndexController@index');
Route::post('/makananIndex/tambah','makananIndexController@tambah');


Route::get('/levelIndex','levelIndexController@index');
Route::post('/levelIndex/tambah','levelIndexController@tambah');
Route::get('/levelIndex/ubah/{id_level}','levelIndexController@tampilDataLevel');
Route::post('/levelIndex/ubah/save','levelIndexController@ubah');
Route::get('/levelIndex/levelajax/{id_level}','levelIndexController@ambilajax');


