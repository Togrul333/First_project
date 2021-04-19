<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backent Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {

    Route::get('giris', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('giris', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('login.post');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('panel', [App\Http\Controllers\Dashboard::class, 'index'])->name('dashboard');
    Route::resource('makaleler', App\Http\Controllers\ArticleController::class);
    Route::get('cikis', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------

*/
Route::get('/', [App\Http\Controllers\HomePageController::class, 'index'])->name('homepage');
Route::get('/iletisim', [App\Http\Controllers\HomePageController::class, 'contact'])->name('contact');
Route::post('/iletisim', [App\Http\Controllers\HomePageController::class, 'contactpost'])->name('contact.post');

Route::get('/kategory/{category}', [App\Http\Controllers\HomePageController::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [App\Http\Controllers\HomePageController::class, 'single'])->name('single');
Route::get('/{sayfa}', [App\Http\Controllers\HomePageController::class, 'page'])->name('page');






