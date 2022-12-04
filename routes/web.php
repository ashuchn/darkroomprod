<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\SmsController;

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

Route::prefix('sms')->group(function () {
    Route::get('/', [SmsController::class, 'index'])->name('sms.index');
    Route::post('/send', [SmsController::class, 'sendSms'])->name('sms.send');
});


Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('loginPost', [AuthController::class, 'loginPost'])->name('admin.loginPost');

    Route::middleware(['checkAdminLogin','prevent-back-history'])->group(function(){
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('profile', [AuthController::class, 'profile'])->name('admin.profile');
        Route::post('changePfp', [AuthController::class, 'changePfp'])->name('admin.changePfp');
        Route::post('changePassword', [AuthController::class, 'changePassword'])->name('admin.changePassword');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::prefix('photos')->group(function () {
            Route::get('allPhotos',[PhotosController::class, 'allPhotos'])->name('admin.photos.allPhotos');
            Route::get('singleUpload',[PhotosController::class, 'singleUpload'])->name('admin.photos.singleUpload');
            Route::post('singleUploadPost',[PhotosController::class, 'singleUploadPost'])->name('admin.photos.singleUploadPost');
        });

    });


});
