<?php

use App\Http\Controllers\HomeController;
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

Auth::routes(['verify' => true, 'register' => false]);

Route::group(
    ["middleware" => ["auth", 'verified']],
    function () {
        Route::get('logout', [HomeController::class, 'logout'])->name('logout');
        Route::get('{any?}', [HomeController::class, 'index'])->where('any', '.*')->name('dashboard');
    }
);
