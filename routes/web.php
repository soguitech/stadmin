<?php

use Illuminate\Support\Facades\Route;
use Soguitech\Stadmin\Http\Controllers\ArticleController;
use Soguitech\Stadmin\Http\Controllers\PermissionController;
use Soguitech\Stadmin\Http\Controllers\RoleController;

Route::group(['middleware' => ['web']], function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    // ======================= PERMISSIONS ======================== //
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::get('/permissions/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');

    // ======================= ROLES ======================== //
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::post('/roles/givePermissionTo/{role}', [RoleController::class, 'givePermissionTo'])->name('roles.givePermissionTo');
});
