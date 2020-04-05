<?php

use Illuminate\Support\Facades\Route;
use Soguitech\Stadmin\Http\Controllers\ArticleController;
use Soguitech\Stadmin\Http\Controllers\PermissionController;
use Soguitech\Stadmin\Http\Controllers\RoleController;
use Soguitech\Stadmin\Http\Controllers\UserController;
use Soguitech\Stadmin\Http\Controllers\AuthController;

Route::group(['middleware' => ['web'], 'prefix' => config('stadmin.route.prefix')], function () {
    // =================================== AUTH ===============================//
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('stadmin.showLoginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('stadmin.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('stadmin.logout');

    // =================================== USERS ===============================//
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('stadmin.dash');
    Route::get('/users', [UserController::class, 'index'])->name('stadmin.users');

    // =================================== CLIENTS ===============================//


    // =================================== PROJECTS ===============================//




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
    Route::get('/all-roles', [RoleController::class, 'allRoles'])->name('stadmin.all.roles');


    Route::get('/roles', [RoleController::class, 'index'])->name('stadmin.roles');
    Route::post('/roles', [RoleController::class, 'store'])->name('stadmin.roles.add');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::post('/roles/givePermissionTo/{role}', [RoleController::class, 'givePermissionTo'])->name('roles.givePermissionTo');

    //=================== AJAX ROELS ============================= //
    Route::delete('/roles/delete/{id}', [RoleController::class, 'delete'])->name('stadmin.roles.delete');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('stadmin.roles.edit');
    Route::patch('/roles/{id}', [RoleController::class, 'update'])->name('stadmin.roles.update');
});