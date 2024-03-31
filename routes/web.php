<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Frontend\AuthLoginController;
use App\Http\Controllers\Frontend\EvaluationController;
use App\Http\Controllers\Frontend\FacultyController as FrontendFacultyController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'homeview'])->name('homeview');

Route::get('/login-user',[AuthLoginController::class,'login'])->name('login-user');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth','user.type:user', 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('/dashboard/profile', [HomeController::class,'index'])->name('profile.index');
    Route::get('/dashboard/Evaluate', [EvaluationController::class, 'index'])->name('evaluation.index');
});


Route::group([
    'middleware' => ['auth', 'user.type:faculty'],
    'prefix' => 'faculty',
    'as' => 'faculty.'],
        function(){
            Route::get('/dashboard', [FrontendFacultyController::class, 'index'])->name('dashboard');
            Route::get('/dashboard/profile', [FrontendFacultyController::class,'profile'])->name('profile.index');
});


require __DIR__.'/auth.php';
