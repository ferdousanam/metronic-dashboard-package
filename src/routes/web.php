<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Anam\Dashboard\app\Http\Controllers\Admin',
    'middleware' => ['web'],
    'prefix' => config('dashboard.route_prefix', '/')], function () {

    Route::group(['middleware' => ['auth:admin']], function () {
        // Super User Routes
        Route::group(['middleware' => ['CheckSuperUser']], function () {
            Route::resource('menu', 'MenuController');
            Route::resource('user', 'UsersController');
            Route::resource('user-type', 'UserTypesController');
            Route::resource('user-priority-level', 'UserPriorityLevelController');
        });

        // User Routes with different permission
        Route::group(['middleware' => ['checkPermission'], 'as' => 'admin.'], function () {
            Route::resource('dashboard', 'DashboardController');
        });

        // User Routes only auth permission
        Route::group(['middleware' => ['auth']], function () {
            // Avatar Changing Routes
            Route::get('profile/change-avatar', 'ProfileController@editAvatar')->name('edit-avatar');
            Route::post('profile/change-avatar', 'ProfileController@updateAvatar')->name('update-avatar');
            // Change Password Routes
            Route::get('profile/change-password', 'ProfileController@editPassword')->name('edit-password');
            Route::post('profile/change-password', 'ProfileController@updatePassword')->name('update-password');
            // Profile Routes
            Route::resource('profile', 'ProfileController');
        });
    });

    Route::group(['as' => 'admin.'], function () {
        // Admin Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    });
});
