<?php

use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\WorkplaceController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('company', CompanyController::class);
Route::resource('asset', AssetController::class);
Route::resource('workplace', WorkplaceController::class);
Route::get('/export/asset', [ExportController::class, 'asset'])->name('export.asset');
Route::get('/export/company', [ExportController::class, 'company'])->name('export.company');
Route::get('/export/workplace', [ExportController::class, 'workplace'])->name('export.workplace');
