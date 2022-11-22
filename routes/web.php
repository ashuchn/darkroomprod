<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('loginPost', [AuthController::class, 'loginPost'])->name('admin.loginPost');

    Route::middleware(['checkAdminLogin','prevent-back-history'])->group(function(){
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('profile', [AuthController::class, 'profile'])->name('admin.profile');
        Route::post('changePfp', [AuthController::class, 'changePfp'])->name('admin.changePfp');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });


});
