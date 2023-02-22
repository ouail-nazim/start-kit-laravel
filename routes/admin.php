<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth:admin',
    'as' => 'admin.',
], function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
});
