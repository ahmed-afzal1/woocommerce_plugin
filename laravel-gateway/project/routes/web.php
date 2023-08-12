<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('user')->group(function() {
    Route::get('/login', [LoginController::class,'showLoginForm'])->name('user.login');
    Route::post('/login', [LoginController::class,'login'])->name('user.login.submit');

    Route::get('/dashboard', [UserController::class,'index'])->name('user.dashboard');
    Route::get('/billing/{id}', [UserController::class,'billingDetails'])->name('user.billing.details');
    Route::get('/logout', [LoginController::class,'logout'])->name('user.logout');

});
