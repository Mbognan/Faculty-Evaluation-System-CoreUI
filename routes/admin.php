<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminAuthController::class, 'login']);

Route::group([
    'middleware' => ['auth', 'user.type:admin'],
    'prefix' => 'admin',
    'as' => 'admin.'],
        function(){
            Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard.index');
            /**Profile route */
           Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
           Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
           Route::put('/profile-password_reset', [ProfileController::class, 'password_reset'])->name('profile.password_reset');
});
