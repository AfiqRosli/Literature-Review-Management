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

Route::get('/', function () {
    return view('index');
});

Route::get('/literature-review', 'LiteratureReviewController@index');
Route::post('/literature-review', 'LiteratureReviewController@store');
Route::get('/quote', 'QuoteController@index');
Route::post('/quote', 'QuoteController@store');
Route::get('/backup', 'BackupController@backup')->name('backup');
Route::get('/restore', 'BackupController@restore')->name('restore');
