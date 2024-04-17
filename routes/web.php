<?php

use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CircuitController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\QualifyingSessionController;
use App\Http\Controllers\Admin\RaceDetailsController;
use App\Http\Controllers\Admin\ResultsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\PublicController;

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


/**
 * public Routes
 */
Route::get('/', [PublicController::class, 'index'])->name('main');
Route::get('last_results', [PublicController::class, 'last_results'])->name('last_results');
Route::get('team', [PublicController::class, 'teams'])->name('teams');
Route::get('list_of_circuits', [PublicController::class, 'list_of_circuits'])->name('list_of_circuits');
Route::get('upcoming_events', [PublicController::class, 'upcoming_events'])->name('upcoming_events');
Route::get('standings', [PublicController::class, 'standings'])->name('standings');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', [DashboardController::class, 'index'])
        ->name('home');

    Route::resource('events', EventController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('circuit', CircuitController::class);
    Route::resource('race', RaceDetailsController::class);
    Route::resource('qualifng', RaceDetailsController::class);
    Route::resource('race', RaceDetailsController::class);
    Route::resource('race-results', ResultsController::class);
    Route::resource('qualifying-sessions', QualifyingSessionController::class);
});
