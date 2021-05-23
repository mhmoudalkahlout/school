<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'isAdmin' => Auth::user()->isAdmin(),
            'isTeacher' => Auth::user()->isTeacher(),
            'isStudent' => Auth::user()->isStudent(),
        ]);
    })->name('dashboard');

    Route::middleware('can:isAdmin')->group(function () {

    });

    Route::middleware('can:isTeacher')->group(function () {

    });

    Route::middleware('can:isStudent')->group(function () {

    });

});