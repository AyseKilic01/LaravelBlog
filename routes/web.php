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

Route::get('/', [\App\Http\Controllers\Front\homepage::class, 'index'])->name('homepage');
Route::get('/kategori/{category}',[\App\Http\Controllers\Front\homepage::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [\App\Http\Controllers\Front\homepage::class, 'single'])->name('single');

