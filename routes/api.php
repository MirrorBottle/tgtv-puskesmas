<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('App\Http\Controllers\Api')->group(function () {
  Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::get('maintenance', 'AuthController@maintenance');
  });
  Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'auth'], function () {
      Route::post('change-password/{id}', 'AuthController@changePassword');
      Route::get('info/{id}', 'AuthController@info');
    });

    Route::group(['prefix' => 'inventory-validation'], function() {
      Route::get('/', 'InventoryValidationController@index');
      Route::get('/{id}', 'InventoryValidationController@show');
      Route::post('/verified/{id}/{status}', 'InventoryValidationController@verified');
      Route::post('/verified-all{id}', 'InventoryValidationController@bulk');
    });

    Route::group(['prefix' => 'inventory-dashboard'], function() {
      Route::get('/', 'InventoryDashboardController@index');
    });

    Route::group(['prefix' => 'inventory-log'], function() {
      Route::post('/', 'InventoryLogController@store');
      Route::get('/detail/{id}', 'InventoryLogController@detail');
      Route::get('/history', 'InventoryLogController@history');
    });

    Route::group(['prefix' => 'inventory-item'], function() {
      Route::get('/', 'InventoryItemController@index');
      Route::get('/{id}', 'InventoryItemController@show');
    });
  });
});
