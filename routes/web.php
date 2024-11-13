<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BiometriaController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ViveiroController;


Route::get('/', [SiteController::class, 'index'])->middleware(['auth', 'verified'])->name('index');
Route::get('/dashboard', [SiteController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');
Route::get('/produtos/cadastrar', [ProductController::class, 'create'])->name('products.create');
Route::post('/produtos', [ProductController::class, 'store'])->name('products.store');
Route::get('/produtos/{product}/editar', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/produtos/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/produtos/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/biometrias', [BiometriaController::class, 'index'])->name('biometrias.index');
Route::get('/biometrias/cadastrar', [BiometriaController::class, 'create'])->name('biometrias.create');
Route::post('/biometrias', [BiometriaController::class, 'store'])->name('biometrias.store');
Route::get('/biometrias/{biometria}/editar', [BiometriaController::class, 'edit'])->name('biometrias.edit');
Route::get('/biometrias/{biometria}/detalhes', [BiometriaController::class, 'show'])->name('biometrias.show');
Route::put('/biometrias/{biometria}', [BiometriaController::class, 'update'])->name('biometrias.update');
Route::delete('/biometrias/{biometria}', [BiometriaController::class, 'destroy'])->name('biometrias.destroy');


Route::post('/viveiro', [ViveiroController::class, 'store'])->name('viveiros.store');

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
 
 


 // Group routes that need admin role and authentication
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});

require __DIR__.'/auth.php';

