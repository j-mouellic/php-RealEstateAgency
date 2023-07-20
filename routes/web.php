<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/biens', [SearchController::class, 'index'])->name('property.index');
Route::get('/biens/{property}', [SearchController::class, 'show'])->name('property.show');
Route::post('/biens/{property}/contact', [SearchController::class, 'contact'])->name('property.contact');

Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [Authcontroller::class, 'login']);
Route::delete('/logout', [Authcontroller::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix("admin")->name("admin.")->middleware('auth')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
