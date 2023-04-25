<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Masters\CompanyController;
use App\Http\Controllers\Admins\PermissionController;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Masters\BranchController;





// new route
Route::middleware([
    'auth:sanctum',
    'verified'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
   
    
    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function() {
        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/', [RoleController::class, 'store'])->name('store');
            Route::get('{role}/edit', [RoleController::class, 'edit'])->name('edit');
            Route::put('{role}', [RoleController::class, 'update'])->name('update');
            Route::delete('{role}/delete', [RoleController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('permissions')->name('permissions.')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index');
            Route::get('/create', [PermissionController::class, 'create'])->name('create');
            Route::post('/', [PermissionController::class, 'store'])->name('store');
            Route::get('{permission}/edit', [PermissionController::class, 'edit'])->name('edit');
            Route::put('{permission}', [PermissionController::class, 'update'])->name('update');
            Route::delete('{permission}/delete', [PermissionController::class, 'destroy'])->name('destroy');
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

    Route::prefix('companys')->name('companys.')->group(function() {
        Route::get('/',[CompanyController::class, 'index'])->name('index');
        Route::get('/create',[CompanyController::class, 'create'])->name('create');
        Route::post('/',[CompanyController::class, 'store'])->name('store');
        Route::get('{company}/edit',[CompanyController::class, 'edit'])->name('edit');
        Route::put('{company}/',[CompanyController::class, 'update'])->name('update');
        Route::put('{company}/delete',[CompanyController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('branchs')->name('branchs.')->group(function() {
        Route::get('/',[branchController::class, 'index'])->name('index');
        Route::get('/create',[branchController::class, 'create'])->name('create');
        Route::post('/',[branchController::class, 'store'])->name('store');
        Route::get('{branch}/edit',[branchController::class, 'edit'])->name('edit');
        Route::put('{branch}/',[branchController::class, 'update'])->name('update');
        Route::put('{branch}/delete',[branchController::class, 'destroy'])->name('destroy');
    });    
    
    
});
