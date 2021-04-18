<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backent Routes
|--------------------------------------------------------------------------

*/

Route::get('/admin/panel',[App\Http\Controllers\Dashboard::class,'index'])->name('admin.dashboard');
Route::get('/admin/giris',[App\Http\Controllers\AuthController::class,'login'])->name('admin.login');
Route::post('/admin/giris',[App\Http\Controllers\AuthController::class,'loginPost'])->name('admin.login.post');
Route::get('/admin/cikis',[App\Http\Controllers\AuthController::class,'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------

*/

Route::get('/',[App\Http\Controllers\HomePageController::class,'index'])->name('homepage');
Route::get('/iletisim',[App\Http\Controllers\HomePageController::class,'contact'])->name('contact');
Route::post('/iletisim',[App\Http\Controllers\HomePageController::class,'contactpost'])->name('contact.post');

Route::get('/kategory/{category}',[App\Http\Controllers\HomePageController::class,'category'])->name('category');
Route::get('/{category}/{slug}',[App\Http\Controllers\HomePageController::class,'single'])->name('single');
Route::get('/{sayfa}',[App\Http\Controllers\HomePageController::class,'page'])->name('page');






