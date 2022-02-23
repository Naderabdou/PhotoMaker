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
    return view('welcome');
});

Route::resource('home','HomeController');
//Route::get('lang/{locale}', 'HomeController@lang')->name('lang');

Route::resource('aboutUs','AboutController');
Route::resource('services','ServicesController');
Route::resource('contactus','ContactController');
Route::resource('gallery','GalleryController');


require __DIR__.'/auth.php';
