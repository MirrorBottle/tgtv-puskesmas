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
    
    Route::get('galleries/index_data', ['as' => 'galleries.index_data', 'uses' => 'GalleryController@index_data']);
    Route::resource('galleries', 'GalleryController');

    Route::get('elderlies/index_data', ['as' => 'elderlies.index_data', 'uses' => 'ElderlyController@index_data']);
    Route::resource('elderlies', 'ElderlyController');

    Route::get('elderly-records/index_data', ['as' => 'elderly-records.index_data', 'uses' => 'ElderlyRecordController@index_data']);
    Route::resource('elderly-records', 'ElderlyRecordController');

    Route::resource('setting', 'SettingController')->only(['index', 'store']);
});


