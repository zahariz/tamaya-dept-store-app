<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}



Route::middleware(['auth'])->group(function(){
    // Category Produk
Route::get('/admin/category-produk', [App\Http\Controllers\CategoryProdukController::class, 'index'])->name('category.produk.admin.index');
Route::get('/admin/category-produk/create', [App\Http\Controllers\CategoryProdukController::class, 'create'])->name('category.produk.admin.create');
Route::post('/admin/category-produk/create', [App\Http\Controllers\CategoryProdukController::class, 'store'])->name('category.produk.admin.store');
Route::get('/admin/category-produk/edit/{id}', [App\Http\Controllers\CategoryProdukController::class, 'edit'])->name('category.produk.admin.edit');
Route::post('/admin/category-produk/update/{id}', [App\Http\Controllers\CategoryProdukController::class, 'update'])->name('category.produk.admin.update');
Route::delete('/admin/category-produk/delete/{id}', [App\Http\Controllers\CategoryProdukController::class, 'destroy'])->name('category.produk.admin.destroy');


// Produk
Route::get('/admin/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk.admin.index');
Route::get('/admin/produk/create', [App\Http\Controllers\ProdukController::class, 'create'])->name('produk.admin.create');
Route::post('/admin/produk/create', [App\Http\Controllers\ProdukController::class, 'store'])->name('produk.admin.store');
Route::get('/admin/produk/edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produk.admin.edit');
Route::post('/admin/produk/update/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('produk.admin.update');
Route::delete('/admin/produk/delete/{id}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('produk.admin.destroy');

// Storage Bin
Route::get('/admin/sbin', [App\Http\Controllers\StorageBinController::class, 'index'])->name('sbin.admin.index');
Route::get('/admin/sbin/create', [App\Http\Controllers\StorageBinController::class, 'create'])->name('sbin.admin.create');
Route::post('/admin/sbin/create', [App\Http\Controllers\StorageBinController::class, 'store'])->name('sbin.admin.store');
Route::get('/admin/sbin/edit/{id}', [App\Http\Controllers\StorageBinController::class, 'edit'])->name('sbin.admin.edit');
Route::post('/admin/sbin/update/{id}', [App\Http\Controllers\StorageBinController::class, 'update'])->name('sbin.admin.update');
Route::delete('/admin/sbin/delete/{id}', [App\Http\Controllers\StorageBinController::class, 'destroy'])->name('sbin.admin.destroy');

// Storage Bin
Route::get('/admin/wm', [App\Http\Controllers\WarehouseManagementController::class, 'index'])->name('wm.admin.index');
Route::get('/admin/wm/create', [App\Http\Controllers\WarehouseManagementController::class, 'create'])->name('wm.admin.create');
Route::post('/admin/wm/create', [App\Http\Controllers\WarehouseManagementController::class, 'store'])->name('wm.admin.store');
Route::get('/admin/wm/edit/{id}', [App\Http\Controllers\WarehouseManagementController::class, 'edit'])->name('wm.admin.edit');
Route::post('/admin/wm/update/{id}', [App\Http\Controllers\WarehouseManagementController::class, 'update'])->name('wm.admin.update');
Route::delete('/admin/wm/delete/{id}', [App\Http\Controllers\WarehouseManagementController::class, 'destroy'])->name('wm.admin.destroy');

});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
