<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\MedalController;
use App\Http\Controllers\RankingController;
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

Route::post('/victim', [VictimController::class, 'addVictim']);

Route::get('/gyms', [GymController::class, 'index']);
Route::get('/gym', [GymController::class, 'showGym']);

Route::get('/tournaments', [TournamentController::class, 'index']);

Route::get('/competitions', [CompetitionController::class, 'index']);

Route::post('/avatar', [AvatarController::class, 'addAvatar']);

Route::get('/mymedals', [MedalController::class, 'myMedals']);

Route::get('/globalranking', [RankingController::class, 'topGlobalRanking']);