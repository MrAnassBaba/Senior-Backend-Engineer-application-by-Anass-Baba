<?php

use App\Http\Controllers\ContributorsController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class,'welcome'])->name('home');
Route::get('/callback', [MainController::class,'callback']);
Route::get('listUsers', [MainController::class,'listUsers'])->name('listUsers');
Route::get('list', [ContributorsController::class,'index'])->name('listRepository');
Route::get('createRepository', [ContributorsController::class,'createRepository'])->name('formToCreateRepository');
Route::post('createRepository', [ContributorsController::class,'actionPostToCreateRepository'])->name('createRepository');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
