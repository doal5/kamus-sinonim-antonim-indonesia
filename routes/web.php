<?php

use App\Http\Controllers\fiturController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\tentangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [homeController::class, 'index'])->name('home.index');
Route::post('/', [homeController::class, 'cari'])->name('home.cari');
Route::get('kata/{kata}', [homeController::class, 'arti'])->name('home.kata');
Route::get('fitur', [fiturController::class, 'index'])->name('fitur.index');
Route::get('tentang', [tentangController::class, 'index'])->name('tentang.index');
