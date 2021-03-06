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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/
Route::group(['middleware'=>'auth'], function() {
    Route::get('dashboard','DashboardController@index')->name('admin');
    Route::resource('social','SocialController');
    Route::resource('slider','SliderController');
    Route::resource('about','AboutController');
    Route::resource('service','ServicesController');
    Route::resource('gallery/category','GalleryCategoryController');
    Route::resource('gallery/photo','PhotoGalleryController');
    Route::resource('services/contact','ContactServicesController');
    Route::resource('services/categoryContact','ServicesCategoryController');
    Route::resource('contact/data','ContactController');
    Route::post('status/{id}','ContactController@status')->name('status');

    Route::resource('contact/order','ContactOrderController');


});


require __DIR__.'/auth.php';
