<?php

use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexContronller;
use App\Http\Controllers\TruyenController;

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


Route::get('/', [IndexContronller::class, 'home']);

Route::get('/danh-muc/{slug}', [IndexContronller::class, 'danhmuc']);

Route::get('/doc-truyen/{id}', [IndexContronller::class, 'doctruyen']);


Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin');

Route::resource('admin/danhmuc', DanhmucController::class);
Route::resource('admin/truyen', TruyenController::class);
Route::resource('admin/chapter', ChapterController::class);