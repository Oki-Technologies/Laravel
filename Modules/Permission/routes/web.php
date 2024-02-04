<?php

use Illuminate\Support\Facades\Route;
use Modules\Permission\app\Http\Controllers\PermissionController;

/*
 *--------------------------------------------------------------------------
 * Web Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register web routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * contains the "web" middleware group. Now create something great!
 *
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('permission', PermissionController::class)->except(['index'])->names('permission');
    Route::get('permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('permission/{permission}/restore', [PermissionController::class, 'restore'])->name('permission.restore');
    Route::delete('permission/{permission}/permanent', [PermissionController::class, 'permanent'])->name('permission.destroy.permanent');
    Route::get('permission', fn () => redirect()->route('permission.index'))->name('permission.index.redirect');
});
