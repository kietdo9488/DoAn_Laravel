<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|php artisan serve
*/

Route::get('/',[ProductController::class,'getAllProductAndPagination'])->name('home');

Route::get('/home',[ProductController::class,'getAllProductAndPagination'])->name('home');
Route::get('/category',[ProductController::class,'getProductByCategory'])->name('category');
Route::get('/user',[ProductController::class,'getProductByCategory'])->name('user');
Route::get('/main',[CategoryController::class,'getAllCategory2']);
Route::get('/search',[ProductController::class,'searchByKeywords'])->name('search');
// Route::get('/login',[UserController::class,'goToLogin'])->name('login');



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

//user 
Route::get('/userManager', [UserController::class ,'getAllUse'])->name('manage-user');
//Goi trang adduser
Route::get('/add-user', [UserController::class, 'adduser'])->name('add-user');
//Them user
Route::post('/add-user', [UserController::class, 'customUser'])->name('user-add');
//Hien thong tin nguoi dung de edit
Route::get('/edituser', [UserController::class, 'getUserById'])->name('edit-user');
Route::post('/edituser', [UserController::class, 'getUpdateUserById'])->name('update-user');
//Xoa nguoi dung
Route::DELETE('/manageruser', [CategoryController::class, 'delete'])->name('delete-user');

//Category crud
Route::get('/managecategory', [CategoryController::class ,'getAllCate'])->name('manage-category');
//Goi trang addproduct
Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
//Them product
Route::post('/add-category', [CategoryController::class, 'customCategory'])->name('category-add');
//Hien thong tin san pham tai edit product
Route::get('/editcategory', [CategoryController::class, 'getCategoryById'])->name('edit-category');
Route::post('/editcategory', [CategoryController::class, 'getUpdateCategoryById'])->name('update-category');
//Xoa san pham
Route::DELETE('/managecategory', [CategoryController::class, 'delete'])->name('delete-category');
//
Route::get('dasboard', [CustomAuthController::class, 'dashboard']);
//Dang nhap
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
//Dang ki
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
//Dang xuat
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


//

Route::get('/detail', [ProductController::class, 'getDetail'])->name('detail-product');