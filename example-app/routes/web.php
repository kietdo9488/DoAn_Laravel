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
Route::get('/home',[ProductController::class,'getAllProductAndPagination'])->name('home');
Route::get('/main',[CategoryController::class,'getAllCategory2']);
Route::get('/search',[ProductController::class,'searchByKeywords'])->name('search');


//Product crud
Route::get('/manageproduct', [ProductController::class ,'getAllProduct'])->name('manage-product');
//Goi trang addproduct
Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
//Them product
Route::post('/add-product', [ProductController::class, 'customProduct'])->name('product-add');
//Hien thong tin san pham tai edit product
Route::get('/editproduct', [ProductController::class, 'getProductById'])->name('edit-product');
Route::post('/editproduct', [ProductController::class, 'getUpdateProductById'])->name('update');
//Xoa san pham
Route::DELETE('/manageproduct', [ProductController::class, 'delete'])->name('delete-product');


Route::get('/detail', [ProductController::class, 'getDetail'])->name('detail-product');