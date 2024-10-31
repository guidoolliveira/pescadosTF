<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');


    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');  

    Route::get('/forms', function () {
        return view('admin.forms');
    })->name('admin.forms'); 
    Route::get('/tables', function () {
        return view('admin.tables');
    })->name('admin.tables'); 
    Route::get('/ui-elements', function () {
        return view('admin.ui-elements');
    })->name('admin.ui-elements');
 
 

 Route::group(['middleware' => ['permission:publish articles']], function () {

 });

 // Group routes that need admin role and authentication
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});

require __DIR__.'/auth.php';

