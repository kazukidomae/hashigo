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
Route::get('/detail', 'HotpepperController@detail')->name('detail');
Route::get('/top', 'ExampleController@example')->name('example');
Route::get('/mypage', 'MypageController@show')->name('mypage')->middleware('auth');
