<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Controllers should be inside BackEndCon folder to use this route file
|
*/

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('start', 'StarterController@index');
});
