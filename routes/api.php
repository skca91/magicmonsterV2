<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\VictimController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('signup', [AuthController::class, 'signUp'])->name('signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout',[AuthController::class, 'logout'])->name('logout');
        Route::get('user', [AuthController::class, 'user'])->name('user');
    });
});

Route::post('/victima', [VictimController::class, 'addVictim']);

Route::get('/gym', [GymController::class, 'index']);

Route::post('/avatar', [AvatarController::class, 'addAvatar']);
