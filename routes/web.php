<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Models\AccountSettings;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontUser\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\FrontUser\Kheti\KhetiController;
use App\Http\Controllers\FrontUser\Kheti\RecieptKhetiController;
use App\Http\Controllers\FrontUser\AccountSetting\AccountSettingController;

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




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    Route::get('/user-profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('/user-profile-update/{id}', [UserController::class, 'UpdateUser'])->name('user.profile.update');
    Route::post('/password/update/{id}', [UserController::class, 'updatePassword'])->name('user.password.update');

    Route::get('/account-setting', [AccountSettingController::class, 'index'])->name('user.account.setting');
    Route::post('/store-account-settings', [AccountSettingController::class, 'store'])->name('user.account.setting.store');

    Route::post('/yearSet',[HomeController::class,'setYear'])->name('admin.setyear');

    // All Kheti Routes
    Route::controller(KhetiController::class)->group(function () {
        Route::get('/kheti', 'index')->name('kheti.list');
        Route::post('/kheti/listdata', 'AjaxDataTable')->name('kheti.listdata');
        Route::post('/kheti-store-account', 'StoreAccount')->name('kheti.store');
        Route::post('/kheti/change-status/{id}', 'statusChange')->name('kheti.status.change');
        Route::delete('/kheti/destroy/{id}',  'DeleteKheti')->name('kheti.delete');
        Route::get('/kheti/edit/{id}',  'EditKheti')->name('kheti.edit');
        Route::post('/kheti/update/{id}', 'UpdateAccount')->name('kheti.update');
    });

    // All kheti receipt routes
    Route::controller(RecieptKhetiController::class)->group(function () {
        Route::get('/receipt/{id}', 'index')->name('kheti.receipt.index');
        Route::post('/receipt/store/{id}', 'UpdateReceipt')->name('kheti.receipt.update');
        Route::post('/new-receipt/store', 'AddNewReceipt')->name('kheti.newreceipt.store');
    });


});


Route::prefix('superAdmin')->middleware(['auth', 'superAdmin'])->group(function () {
    // Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('superAdmin.dashboard');

    Route::post('/add-year', [DashboardController::class, 'addYear'])->name('user.addyear');

    // Admin Profile Manage
    Route::get('/profile', [AdminController::class, 'index'])->name('admin.profile');
    Route::post('/profile-update/{id}', [AdminController::class, 'UpdateProfile'])->name('admin.profile.update');
    Route::get('/change-password', [AdminController::class, 'ChangePassword'])->name('admin.profile.changepassword');
   

    // all user routes
    Route::get('/user-manage', [UserManageController::class, 'index'])->name('users.list');
    Route::post('/user/listdata', [UserManageController::class, 'AjaxDataTable'])->name('users.listdata');
    Route::get('/add-user', [UserManageController::class, 'CreateUser'])->name('users.create');
    Route::post('/store-user', [UserManageController::class, 'StoreUser'])->name('users.store');
    Route::post('/user/change-status/{id}', [UserManageController::class, 'statusChange'])->name('users.status.change');
    Route::get('/edit-user/{id}', [UserManageController::class, 'EditUser'])->name('users.edit');
    Route::post('/update-user/{id}', [UserManageController::class, 'UpdateUser'])->name('users.update');
    Route::delete('/user/destroy/{id}', [UserManageController::class, 'DeleteUser'])->name('users.delete');

    // All file upload routes
    Route::get('/file-import', [ImportController::class, 'index'])->name('file.import');
    Route::post('/file-store', [ImportController::class, 'ImportData'])->name('file.import.store');
});
