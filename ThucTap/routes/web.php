<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\PermissionController;
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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'category', 'as' => 'category.',], function (){
    Route::get('', [CategoryController::class, 'index',])->middleware('can:category-list')->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->middleware('can:category-create')->name('create');
    Route::post('', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->middleware('can:category-edit')->name('edit');
    Route::put('{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'delete'])->middleware('can:category-delete')->name('delete');
});

Route::group(['prefix' => 'menu', 'as' => 'menu.'], function (){
    Route::get('', [MenuController::class, 'index'])->middleware('can:menu-list')->name('index');
    Route::get('/create', [MenuController::class, 'create'])->middleware('can:menu-create')->name('create');
    Route::post('', [MenuController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [MenuController::class, 'edit'])->middleware('can:menu-edit')->name('edit');
    Route::put('{id}', [MenuController::class, 'update'])->name('update');
    Route::delete('/{id}', [MenuController::class, 'delete'])->middleware('can:menu-delete')->name('delete');
});
Route::group(['prefix' => 'product', 'as' => 'product.'], function (){
    Route::get('', [ProductController::class, 'index'])->middleware('can:product-list')->name('index');
    Route::get('/create', [ProductController::class, 'create'])->middleware('can:product-create')->name('create');
    Route::post('', [ProductController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->middleware('can:product-edit')->name('edit');
    Route::put('{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'delete'])->middleware('can:product-delete')->name('delete');
});
Route::group(['prefix' => 'slider', 'as' => 'slider.'], function (){
    Route::get('', [SliderController::class, 'index'])->middleware('can:slider-list')->name('index');
    Route::get('/create', [SliderController::class, 'create'])->middleware('can:slider-create')->name('create');
    Route::post('', [SliderController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [SliderController::class, 'edit'])->middleware('can:slider-edit')->name('edit');
    Route::put('{id}', [SliderController::class, 'update'])->name('update');
    Route::delete('/{id}', [SliderController::class, 'delete'])->middleware('can:slider-delete')->name('delete');
});
Route::group(['prefix' => 'settings', 'as' => 'settings.'], function (){
    Route::get('', [SettingController::class, 'index'])->middleware('can:setting-list')->name('index');
    Route::get('/create', [SettingController::class, 'create'])->middleware('can:setting-create')->name('create');
    Route::post('', [SettingController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [SettingController::class, 'edit'])->middleware('can:setting-edit')->name('edit');
    Route::put('{id}', [SettingController::class, 'update'])->name('update');
    Route::delete('/{id}', [SettingController::class, 'delete'])->middleware('can:setting-delete')->name('delete');
});
Route::group(['prefix' => 'users', 'as' => 'users.'], function (){
    Route::get('', [UserController::class, 'index'])->middleware('can:user-list')->name('index');
    Route::get('/create', [UserController::class, 'create'])->middleware('can:user-create')->name('create');
    Route::post('', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->middleware('can:user-edit')->name('edit');
    Route::put('{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'delete'])->middleware('can:user-delete')->name('delete');
});
Route::group(['prefix' => 'roles', 'as' => 'roles.'], function (){
    Route::get('', [RoleController::class, 'index'])->middleware('can:role-list')->name('index');
    Route::get('/create', [RoleController::class, 'create'])->middleware('can:role-create')->name('create');
    Route::post('', [RoleController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [RoleController::class, 'edit'])->middleware('can:role-edit')->name('edit');
    Route::put('{id}', [RoleController::class, 'update'])->name('update');
    Route::delete('/{id}', [RoleController::class, 'delete'])->middleware('can:role-delete')->name('delete');
});
Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function (){
    Route::get('', [PermissionController::class, 'createPermissions'])->middleware('can:permission-create')->name('index');
    Route::post('', [PermissionController::class, 'store'])->name('store');
});
Route::get('customers', [\App\Http\Controllers\backend\CartController::class, 'index'])->name('carts.index');
Route::get('customers/view/{customer}', [\App\Http\Controllers\backend\CartController::class, 'show'])->name('carts.show');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}/{id}', [\App\Http\Controllers\CategoryController::class,'index'])->name('category.product');
Route::get('product-details/{id}', [App\Http\Controllers\ProductController::class, 'index'])->name('product-details.index');
Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index'])->name('add-cart');
Route::get('carts', [App\Http\Controllers\CartController::class, 'show'])->name('carts');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update'])->name('update-cart');
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart'])->name('checkout');
