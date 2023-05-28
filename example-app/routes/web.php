<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
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

Route::get('/', function () {
    return view('detail');
});
Route::get('/home',[ProductController::class,'getAllProductAndPagination']);
Route::get('/main',[CategoryController::class,'getAllCategory2']);
Route::get('/search',[ProductController::class,'searchByKeywords'])->name('search');
