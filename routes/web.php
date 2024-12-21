<?php

use App\Http\Controllers\NQT_QUAN_TRIController;
use App\Http\Controllers\nqtAdminController;
use App\Http\Controllers\nqtAdminDashboardController;
use App\Http\Controllers\nqtLoaiSanPhamController;
use App\Http\Controllers\nqtSanPhamController;
use App\Http\Controllers\nqtSessionAdminController;
use App\Http\Controllers\nqtUserController;
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

// Route::get('/dashboard', [nqtSessionAdminController::class,'getSessionData'])->name( 'admin.getSession'); //admin page
// Route::get('/dashboard/z', [nqtSessionAdminController::class,'deleteSessionData'])->name( 'admin.deleSession'); //đăng xuất

Route::get('/nqt-admin', [nqtSessionAdminController::class,'getSessionData'])->name( 'nqtadmin.getSession1'); //admin page
Route::get('/nqt-admin/logout', [nqtSessionAdminController::class,'deleteSessionData'])->name( 'nqtadmin.deleSession1'); //đăng xuất


Route::get('/nqt-admin/nqt-loai-san-pham/search', [nqtLoaiSanPhamController::class, 'nqtSearch'])->name('nqtadmin.mqtsearchLoaisp');

Route::get('/nqt-admin/nqt-loai-san-pham', [nqtLoaiSanPhamController::class,'nqtList'])->name('nqtadmin.nqtloaisanpham');
Route::get('/nqt-admin/nqt-loai-san-pham/nqt-create', [nqtLoaiSanPhamController::class,'nqtCreate'])->name('nqtadmin.nqtCreateLoaiSP');
Route::post('/nqt-admin/nqt-loai-san-pham/nqt-create', [nqtLoaiSanPhamController::class,'nqtCreateSubmit'])->name('nqtadmin.nqtCreateLoaiSPsubmit');


//view
Route::get('/nqt-admin/nqt-chi-tiet-loai-san-pham/{nqtID}',[nqtLoaiSanPhamController::class, 'nqtchitietloaisp'])->name('nqtadmin.nqtchitietloaisp');
//edit
Route::get('/nqt-admin/nqt-chinh-sua-loai-san-pham/{nqtID}',[nqtLoaiSanPhamController::class, 'nqteditloaisp'])->name('nqtadmin.nqteditloaisp');
Route::post('/nqt-admin/nqt-chinh-sua-loai-san-pham/{nqtID}',[nqtLoaiSanPhamController::class, 'nqteditloaispSubmit'])->name('nqtadmin.nqteditloaispSubmit');
//delete
Route::delete('/nqt-admin/nqt-xoa-loai-san-pham/{nqtID}',[nqtLoaiSanPhamController::class, 'nqtdeleteloaisp'])->name('nqtadmin.nqtdeleteloaisp');

Route::get('/nqt-admin/nqt-san-pham/nqt-create', [nqtSanPhamController::class,'nqtCreate'])->name('nqtadmin.nqtCreateSP');
Route::post('/nqt-admin/nqt-san-pham/nqt-create', [nqtSanPhamController::class,'nqtCreateSubmit'])->name('nqtadmin.nqtCreateSPsubmit');

//sanpham
route::get('/nqt-admin/nqt-danh-sach-san-pham', [nqtSanPhamController::class,'nqtList'])->name('nqtadmin.nqtSanPhams');
//view
Route::get('/nqt-admin/nqt-chi-tiet-san-pham/{nqtID}',[nqtSanPhamController::class, 'nqtchitietsp'])->name('nqtadmin.nqtchitietloaisp');
//edit
Route::get('/nqt-admin/nqt-chinh-sua-san-pham/{nqtID}',[nqtSanPhamController::class, 'nqteditsp'])->name('nqtadmin.nqteditsp');
Route::post('/nqt-admin/nqt-chinh-sua-san-pham/{nqtID}',[nqtSanPhamController::class, 'nqteditspSubmit'])->name('nqtadmin.nqteditspSubmit');
//delete
Route::delete('/nqt-admin/nqt-xoa-san-pham/{nqtID}',[nqtSanPhamController::class, 'nqtdeletesp'])->name('nqtadmin.nqtdeletesp');



//user
//list
Route::get('/nqt-admin/nqt-danh-sach-user',[nqtUserController::class, 'nqtList'])->name('nqtadmin.nqtListUser');
//create
Route::get('/nqt-admin/nqt-nguoi-dung/nqt-create', [nqtUserController::class,'nqtCreateUser'])->name('nqtadmin.nqtCreateUser');
Route::post('/nqt-admin/nqt-nguoi-dung/nqt-create', [nqtUserController::class,'nqtCreateUserSubmit'])->name('nqtadmin.nqtCreateUserSubmit');

//view

//edit

//delete
// Route::middleware(['nqtcheckAdminSession'])->group(function () {
//     Route::get('/nqt-admin', [nqtSessionAdminController::class, 'getSessionData'])->name('nqtadmin.getSession1');
//     Route::get('/nqt-admin/nqt-danh-sach-user', [nqtUserController::class, 'nqtList'])->name('nqtadmin.nqtListUser');
// });

//admin
//list

Route::get('/nqt-admin/nqt-danh-sach-admin',[nqtAdminController::class, 'nqtList'])->name('nqtadmin.nqtListAdmin');
//add

Route::get('/nqt-admin/nqt-admin/nqt-create', [nqtAdminController::class,'nqtCreate'])->name('nqtadmin.nqtCreateAdmin');
Route::post('/nqt-admin/nqt-admin/nqt-create', [nqtAdminController::class,'nqtCreateSubmit'])->name('nqtadmin.nqtCreateAdminsubmit');
//view
Route::get('/nqt-admin/nqt-admin-view/{nqtID}',[nqtAdminController::class, 'nqtchitietadmin'])->name('nqtadmin.nqtchitietadmin');
//edit
Route::get('/nqt-admin/nqt-admin/{nqtID}',[nqtAdminController::class, 'nqteditadmin'])->name('nqtadmin.nqteditadmin');
Route::post('/nqt-admin/nqt-admin/{nqtID}',[nqtAdminController::class, 'nqteditadminSubmit'])->name('nqtadmin.nqteditadminSubmit');
//delete
Route::delete('/nqt-admin/nqt-xoa-loai-tai-khoan-quan-tri/{nqtID}',[nqtAdminController::class, 'nqtdeleteadmin'])->name('nqtadmin.nqtdeleteadmin');
