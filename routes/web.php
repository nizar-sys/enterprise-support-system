<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ApprovalTatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelengkapanTAController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SKTAController;
use App\Http\Controllers\TATController;
use App\Http\Controllers\TopikTugasAkhirController;
use App\Http\Controllers\TugasakhirController;

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

# ------ Unauthenticated routes ------ #
Route::get('/', [AuthenticatedSessionController::class, 'create']);
require __DIR__ . '/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'myProfile'])->name('profile');
        Route::put('/change-ava', [ProfileController::class, 'changeFotoProfile'])->name('change-ava');
        Route::put('/change-profile', [ProfileController::class, 'changeProfile'])->name('change-profile');
    }); # profile group
    Route::resource('users', UserController::class)->middleware('roles:admin');
    Route::resource('home-pages', HomePageController::class)->middleware('roles:admin');
    Route::resource('schedules', JadwalController::class);
    Route::resource('lecturers', LecturerController::class);
    Route::resource('topics', TopikTugasAkhirController::class);
    Route::resource('guidances', BimbinganController::class);
    Route::resource('alumni', AlumniController::class);

    Route::prefix('{guidance}')->group(function () {
        Route::resource('logbooks', LogbookController::class);
    }); # logbook group

    Route::resource('completeness', KelengkapanTAController::class);
    Route::resource('skta', SKTAController::class);
    Route::resource('tat', TATController::class);

    Route::prefix('{tat}')->group(function () {
        Route::resource('approval-tat', ApprovalTatController::class);
    }); # logbook group

    // Route::resource('projects', TugasakhirController::class);
});
