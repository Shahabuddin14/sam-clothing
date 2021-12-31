<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

//Auth::routes([
//    'register' => false,
//
//]);

//Admin routes
Route::group(['prefix'=>'admin','middleware' =>['admin','auth','permission']], function(){
    //Dashboard section
    Route::get('/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

    //Permission section
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/subAdmin', SubAdminController::class);

    //Category section
    Route::get('/category-list', [AdminController::class, 'categoryList'])->name('category.list');
    Route::post('/category-store', [AdminController::class, 'categoryStore'])->name('category.store');
    Route::get('/category-delete/{id}',[AdminController::class,'categoryDelete'])->name('category.delete');
    Route::get('/category-edit/{id}',[AdminController::class,'categoryEdit'])->name('category.edit');
    Route::post('/category-update',[AdminController::class,'categoryUpdate'])->name('admin.category.update');

    Route::get('/category-inactive/{id}',[AdminController::class,'categoryInactive']);
    Route::get('/category-active/{id}',[AdminController::class,'categoryActive']);

    //Department section
    Route::get('/department-list', [AdminController::class, 'departmentList'])->name('department.list');
    Route::post('/department-store', [AdminController::class, 'departmentStore'])->name('department.store');
    Route::get('/department-delete/{id}',[AdminController::class,'departmentDelete'])->name('department.delete');
    Route::get('/department-edit/{id}',[AdminController::class,'departmentEdit'])->name('department.edit');
    Route::post('/department-update',[AdminController::class,'departmentUpdate'])->name('admin.department.update');

    //Brand section
    Route::get('/brand-list', [AdminController::class, 'brandList'])->name('brand.list');
    Route::post('/brand-store', [AdminController::class, 'brandStore'])->name('brand.store');
    Route::get('/brand-delete/{id}',[AdminController::class,'brandDelete'])->name('brand.delete');
    Route::get('/brand-edit/{id}',[AdminController::class,'brandEdit'])->name('brand.edit');
    Route::post('/brand-update',[AdminController::class,'brandUpdate'])->name('admin.brand.update');

    //Rate section
    Route::get('/rate',[AdminController::class, 'rate'])->name('admin.rate');
    Route::post('/rate-update', [AdminController::class, 'updateRate'])->name('admin.rate.update');

    //Product section
    Route::get('/product-list', [ProductController::class, 'productList'])->name('product.list');
    Route::get('/product-create', [ProductController::class, 'productCreate'])->name('product.create');
    Route::post('/product-store', [ProductController::class, 'productStore'])->name('product.store');
    Route::get('/product-delete/{id}',[ProductController::class,'productDelete'])->name('product.delete');
    Route::get('/product-edit/{id}',[ProductController::class,'productEdit'])->name('product.edit');
    Route::post('/product-update',[ProductController::class,'productUpdate'])->name('admin.product.update');

    //profile settings
    Route::get('/profile',[AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/update/data',[AdminController::class, 'updateData'])->name('admin.update.profile');
    Route::get('/password',[AdminController::class, 'passwordPage'])->name('admin.password');
    Route::post('/update/password',[AdminController::class, 'updatePassword'])->name('admin.update.password');

    //User section
    Route::get('/user-list', [AdminController::class, 'userList'])->name('admin.user-view');

});




//User routes
Route::group(['prefix'=>'user','middleware' =>['user','auth']], function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');

    //profile settings
    Route::get('/profile',[UserController::class, 'profile'])->name('user.profile');
    Route::post('/update/data',[UserController::class, 'updateData'])->name('user.update.profile');
    Route::get('/password',[UserController::class, 'passwordPage'])->name('user.password');
    Route::post('/update/password',[UserController::class, 'updatePassword'])->name('user.update.password');

    Route::get('/product-list', [UserController::class, 'productList'])->name('user.product.list');

    Route::get('/category-list', [UserController::class, 'categoryList'])->name('user.category.list');
    Route::post('/category-store', [UserController::class, 'categoryStore'])->name('user.category.store');

});
