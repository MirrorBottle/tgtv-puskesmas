<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';


Route::get('/notifications', App\Http\Livewire\Notifications::class);

// WEB
Route::group([
    'namespace' => 'App\Http\Controllers\Web',
], function() {
    Route::get('/', 'WebController@index');
    Route::get('/tentang', 'WebController@about');
    Route::get('/pemeriksaan-lansia', 'WebController@elderly');
    Route::get('/galeri', 'WebController@gallery');
    Route::get('/lampiran', 'WebController@attachment');
    
    Route::get('/halaman/{slug}', ['as' => 'web.page', 'uses' => 'WebController@page']);
    Route::get('/halaman', ['as' => 'web.pages', 'uses' => 'WebController@pages']);


});
// ADMIN
Route::redirect('admin', 'admin/dashboard');
Route::group([
    'middleware' => 'auth',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'admin'
], function() {
    Route::get('dashboard', 'AppController@index')->name('dashboard');
    Route::get('profile', ['as' => 'users.profile', 'uses' => 'UserController@profile']);

    Route::patch('users/change_password/{user}', ['as' => 'users.change_password', 'uses' => 'UserController@change_password']);
    Route::get('users/index_data', ['as' => 'users.index_data', 'uses' => 'UserController@index_data']);
    Route::resource('users', 'UserController');
    
    Route::get('galleries/index_data/{type}', ['as' => 'galleries.index_data', 'uses' => 'GalleryController@index_data']);
    Route::get('galleries/create/{type}', ['as' => 'galleries.create', 'uses' => 'GalleryController@create']);
    Route::get('galleries/edit/{id}', ['as' => 'galleries.edit', 'uses' => 'GalleryController@edit']);
    Route::get('galleries/detail/{id}', ['as' => 'galleries.show', 'uses' => 'GalleryController@show']);
    Route::get('galleries/{type}', ['as' => 'galleries.index', 'uses' => 'GalleryController@index']);
    Route::post('galleries/{type}', ['as' => 'galleries.store', 'uses' => 'GalleryController@store']);
    Route::put('galleries/{id}', ['as' => 'galleries.update', 'uses' => 'GalleryController@update']);
    Route::delete('galleries/{id}', ['as' => 'galleries.destroy', 'uses' => 'GalleryController@destroy']);
    
    Route::get('pages/index_data', ['as' => 'pages.index_data', 'uses' => 'PageController@index_data']);
    Route::resource('pages', 'PageController');


    Route::get('elderlies/index_data', ['as' => 'elderlies.index_data', 'uses' => 'ElderlyController@index_data']);
    Route::get('elderlies/death/{id}', ['as' => 'elderlies.death', 'uses' => 'ElderlyController@death']);

    Route::resource('elderlies', 'ElderlyController');

    Route::get('elderly-records/export', ['as' => 'elderly-records.export_view', 'uses' => 'ElderlyRecordController@export_view']);
    Route::post('elderly-records/export', ['as' => 'elderly-records.export', 'uses' => 'ElderlyRecordController@export']);
    
    Route::get('elderly-records/index_data', ['as' => 'elderly-records.index_data', 'uses' => 'ElderlyRecordController@index_data']);
    Route::get('elderly-records/{id}', ['as' => 'elderly-records.create', 'uses' => 'ElderlyRecordController@create']);

    

    Route::resource('elderly-records', 'ElderlyRecordController')->except(['create']);

    Route::get('setting/{section}', ['as' => 'setting.section', 'uses' => 'SettingController@section']);
    Route::resource('setting', 'SettingController')->only(['index', 'store']);
});


