<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
Back Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('admin')->middleware('isLogin')->group(function (){
Route::get('/login', [\App\Http\Controllers\Back\auth::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\Back\auth::class, 'loginPost'])->name('loginPost');
});
Route::prefix('admin')->middleware('isAdmin')->group(function (){
Route::get('/logout', [\App\Http\Controllers\Back\auth::class, 'logout'])->name('logout');
Route::get('/panel', [\App\Http\Controllers\Back\Dashboard::class, 'index'])->name('index');
Route::get('makaleler/silinenler',[\App\Http\Controllers\Back\ArticleController::class, 'trashed'])->name('trashed.article');
Route::resource('makaleler',\App\Http\Controllers\Back\ArticleController::class);
Route::get('/switch','Back\ArticleController@switch')->name('switch');
Route::get('/deletearticle/{id}','Back\ArticleController@delete')->name('delete.article');
Route::get('/harddeletearticle/{id}','Back\ArticleController@hardDelete')->name('hard.delete.article');
Route::get('/recoverarticle/{id}','Back\ArticleController@recover')->name('recover.article');

});


/*
|--------------------------------------------------------------------------
 Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\Front\homepage::class, 'index'])->name('homepage');
Route::get('/kategori/{category}',[\App\Http\Controllers\Front\homepage::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [\App\Http\Controllers\Front\homepage::class, 'single'])->name('single');
Route::get('/iletisim', [\App\Http\Controllers\Front\homepage::class, 'contact'])->name('contact');
Route::post('/iletisim', [\App\Http\Controllers\Front\homepage::class, 'contactpost'])->name('contact.post');
Route::get('/{slug}', [\App\Http\Controllers\Front\homepage::class, 'page'])->name('page');

