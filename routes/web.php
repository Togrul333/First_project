<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/giris', [App\Http\Controllers\Back\AuthController::class, 'login'])->name('admin.login')->middleware('isLogin');
Route::post('admin/giris', [App\Http\Controllers\Back\AuthController::class, 'loginPost'])->name('admin.login.post')->middleware('isLogin');

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('/panel', [App\Http\Controllers\Back\Dashboard::class, 'index'])->name('dashboard');

    //makaleler routu
    Route::get('makaleler/silinenler', [App\Http\Controllers\Back\ArticleController::class, 'trashed'])->name('trashed.article');

    Route::resource('makaleler', App\Http\Controllers\Back\ArticleController::class);
    Route::get('/deletearticle/{id}', [App\Http\Controllers\Back\ArticleController::class, 'delete'])->name('delete.article');
    Route::get('/harddeletearticle/{id}', [App\Http\Controllers\Back\ArticleController::class, 'hardDelete'])->name('hard.delete.article');

    Route::get('/recoverarticle/{id}', [App\Http\Controllers\Back\ArticleController::class, 'recover'])->name('recover.article');

    // kategoryi rout
    Route::get('/kategoriler', [App\Http\Controllers\Back\CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategoriler/create', [App\Http\Controllers\Back\CategoryController::class, 'create'])->name('category.create');


    //Page routlari
    Route::get('/sayfalar', [App\Http\Controllers\Back\PageController::class, 'index'])->name('pages.index');
    Route::get('/sayfalar/olustur', [App\Http\Controllers\Back\PageController::class, 'create'])->name('pages.create');
    Route::get('/sayfalar/guncelle/{id}', [App\Http\Controllers\Back\PageController::class, 'update'])->name('pages.edit');
    Route::post('/sayfalar/guncelle/{id}', [App\Http\Controllers\Back\PageController::class, 'updatePost'])->name('pages.edit.post');
    Route::get('/sayfa/sil/{id}', [App\Http\Controllers\Back\PageController::class, 'delete'])->name('pages.delete');
    Route::post('/sayfalar/olustur', [App\Http\Controllers\Back\PageController::class, 'post'])->name('pages.create.post');
    Route::get('/sayfa/siralama', [App\Http\Controllers\Back\PageController::class, 'orders'])->name('pages.orders');


    //configs routlari
    Route::get('/ayarlar', [App\Http\Controllers\Back\ConfigController::class, 'index'])->name('config.index');
    Route::post('/ayarlar/update', [App\Http\Controllers\Back\ConfigController::class, 'update'])->name('config.update');

    //
    Route::get('/cikis', [App\Http\Controllers\Back\AuthController::class, 'logout'])->name('logout');
});



/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\Front\HomepageController::class, 'index'])->name('homepage');
Route::get('/iletisim', [App\Http\Controllers\Front\HomepageController::class, 'contact'])->name('contact');
Route::post('/iletisim', [App\Http\Controllers\Front\HomepageController::class, 'contactpost'])->name('contact.post');


Route::get('/kategory/{category}', [App\Http\Controllers\Front\HomepageController::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [App\Http\Controllers\Front\HomepageController::class, 'single'])->name('single');
Route::get('/{sayfa}', [App\Http\Controllers\Front\HomepageController::class, 'page'])->name('page');


