<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('test', function () {

    $x = ((5 * 900000) - 600000) / 1000;
    dd($x);
    //return view('welcome');
});
*/
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

//Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/', [\App\Http\Controllers\PlayerController::class, 'login'])->name('player.login');
Route::post('/', [\App\Http\Controllers\PlayerController::class, 'doLogin']);

Route::get('/player/register', [\App\Http\Controllers\PlayerController::class, 'playerRegister'])->name('player.register');
Route::post('/player/register', [\App\Http\Controllers\PlayerController::class, 'playerDoRegister']);


Route::get('/player/leaderboard', [\App\Http\Controllers\PlayerController::class, 'playerLeaderboard'])->name('player.leaderboard');
Route::post('/player/leaderboard', [\App\Http\Controllers\PlayerController::class, 'playerLeaderboardAjax'])->name('player.leaderboard_ajax');


Route::get('quiz/{uuid}', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz.index');
Route::get('quiz/{uuid}/{id}', [\App\Http\Controllers\QuizController::class, 'step'])->name('quiz.step');
Route::post('quiz/{uuid}/{id}', [\App\Http\Controllers\QuizController::class, 'stepSave']);


Route::get('template', [\App\Http\Controllers\QuizController::class, 'templateLoader'])->name('template');
Route::get('template/{id}', [\App\Http\Controllers\QuizController::class, 'templateLoaderId'])->name('template.id');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/dashboard/test', [\App\Http\Controllers\TestController::class, 'test'])->name('dashboard.test');

    Route::get('/dashboard/leader', [DashboardController::class, 'leader'])->name('dashboard.leader');
    Route::post('/dashboard/leader_ajax', [DashboardController::class, 'leaderAjax'])->name('dashboard.leader_ajax');

    Route::get('/dashboard/players', [DashboardController::class, 'players'])->name('dashboard.players');
    Route::post('/dashboard/players_ajax', [DashboardController::class, 'playersAjax'])->name('dashboard.players_ajax');

    Route::get('/dashboard/players_xlsx', [\App\Http\Controllers\PlayerController::class, 'export'])->name('dashboard.players.export');

    Route::delete('/dashboard/administrator/delete_data', [\App\Http\Controllers\DashboardController::class, 'deleteAll'])->name('dashboard.administrator.delete_all');


    Route::get('/dashboard/players/register', [\App\Http\Controllers\PlayerController::class, 'register'])->name('dashboard.player.register');
    Route::post('/dashboard/players/register', [\App\Http\Controllers\PlayerController::class, 'doRegister']);

    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');



    Route::get('dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
