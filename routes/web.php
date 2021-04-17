<?php

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

Route::get('/',[App\Http\Controllers\HomePageController::class,'index'])->name('homepage');
Route::get('/iletisim',[App\Http\Controllers\HomePageController::class,'contact'])->name('contact');
Route::post('/iletisim',[App\Http\Controllers\HomePageController::class,'contactpost'])->name('contact.post');

Route::get('/kategory/{category}',[App\Http\Controllers\HomePageController::class,'category'])->name('category');
Route::get('/{category}/{slug}',[App\Http\Controllers\HomePageController::class,'single'])->name('single');
Route::get('/{sayfa}',[App\Http\Controllers\HomePageController::class,'page'])->name('page');




