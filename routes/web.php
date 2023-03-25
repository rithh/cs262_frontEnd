<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'home']);
Route::get('/home_fastest', [PageController::class, 'home_fastest']);
Route::get('/home_cheapest', [PageController::class, 'home_cheapest']);

// Route::get('/login', [LoginController::class,'process_login']);

// Route::get('/register', [PageController::class,'register']);

// Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
Route::post('/login', [LoginController::class, 'process_login'])->name('login');
Route::get('/register', [LoginController::class, 'show_signup_form'])->name('register');
Route::post('/register', [LoginController::class, 'process_signup']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(["middleware" => "auth"], function () {
    Route::get('/ticket_detail/confirm_booking/{id}', [PageController::class, 'confirm_booking']);
    Route::get('/ticket_detail/{id}', [PageController::class, 'ticket_detail']);
    Route::post('/add_cart/{id}', [PageController::class, 'add_cart']);
    Route::get('/newPage', [PageController::class, 'newPage']);
});