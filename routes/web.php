<?php

use App\Http\Controllers\NQT_QUAN_TRIController;
use App\Http\Controllers\nqtAdminDashboardController;
use App\Http\Controllers\nqtSessionAdminController;
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

Route::get('/admin', [NQT_QUAN_TRIController::class, 'nqtlogin'])->name('admin.nqtLogin');
Route::post('/admin', [NQT_QUAN_TRIController::class, 'nqtloginSubmit'])->name('admin.nqtLoginSubmit');

Route::get('/dashboard', [nqtSessionAdminController::class,'getSessionData'])->name( 'admin.getSession'); //admin page
Route::get('/dashboard/z', [nqtSessionAdminController::class,'deleteSessionData'])->name( 'admin.deleSession'); //đăng xuất


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [nqtAdminDashboardController::class, 'index'])->name('admin.dashboard');
});
