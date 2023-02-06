<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\CompanyController;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\UserController;





// new route
Route::middleware([
    'auth:sanctum',
    'verified'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function() {
        Route::prefix('companys')->name('companys.')->group(function() {
            Route::get('/',[CompanyController::class, 'index'])->name('index');
            Route::get('/create',[CompanyController::class, 'create'])->name('create');
            Route::post('/',[CompanyController::class, 'store'])->name('store');
            Route::get('{company}/edit',[CompanyController::class, 'edit'])->name('edit');
            Route::put('{company}/',[CompanyController::class, 'update'])->name('update');
            Route::put('{company}/delete',[CompanyController::class, 'destroy'])->name('destroy');
        }); 
        
        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/', [RoleController::class, 'store'])->name('store');
            Route::get('{role}/edit', [RoleController::class, 'edit'])->name('edit');
            Route::put('{role}', [RoleController::class, 'update'])->name('update');
            Route::delete('{role}/delete', [RoleController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('{user}', [UserController::class, 'update'])->name('update');
            Route::delete('{user}/delete', [UserController::class, 'destroy'])->name('destroy');
        });
        
    });  
    
    Route::prefix('purchasing')->name('purchasing.')->middleware(['can:manage purchasing'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::prefix('selling')->name('selling.')->middleware(['can:manage selling'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::prefix('invoice')->name('invoice.')->middleware(['can:manage invoice'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::prefix('delivery')->name('delivery.')->middleware(['can:manage delivery'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::prefix('stock')->name('stock.')->middleware(['can:manage stock'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::prefix('accounting')->name('accounting.')->middleware(['can:manage accounting'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
});
