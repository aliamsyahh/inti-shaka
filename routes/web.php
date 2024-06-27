<?php

use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WorkplaceController;
use App\Http\Controllers\AssetPicController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('company', CompanyController::class);
        Route::resource('user', UserController::class);
        Route::get('/export/company', [ExportController::class, 'company'])->name('export.company');
        Route::get('/export/user', [ExportController::class, 'user'])->name('export.user');
    });
    Route::middleware(['role:user'])->group(function () {
        Route::get('/export/asset', [ExportController::class, 'asset'])->name('export.asset');
        Route::get('/export/workplace', [ExportController::class, 'workplace'])->name('export.workplace');
        Route::get('/export/pic', [ExportController::class, 'pic'])->name('export.pic');
        Route::resource('asset', AssetController::class);
        Route::resource('workplace', WorkplaceController::class);
        Route::resource('pic', AssetPicController::class);
    });
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
