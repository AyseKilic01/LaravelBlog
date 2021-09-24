<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
Back Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/admin/login', [\App\Http\Controllers\Back\auth::class, 'login'])->name('login');
Route::post('/admin/login', [\App\Http\Controllers\Back\auth::class, 'loginPost'])->name('loginPost');
Route::get('/admin/panel', [\App\Http\Controllers\Back\dashboard::class, 'index'])->name('index');
Route::get('/admin/logout', [\App\Http\Controllers\Back\auth::class, 'logOut'])->name('logOut');



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

