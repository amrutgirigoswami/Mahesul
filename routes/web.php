<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontUser\UserController;

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

Auth::routes();
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.user');
Route::post('/', [LoginController::class, 'login'])->name('login');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/user-profile', [UserController::class, 'index'])->name('user.profile');
});
