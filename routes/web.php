<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Frontend\AuthLoginController;
use App\Http\Controllers\Frontend\ClassListController;
use App\Http\Controllers\Frontend\EvaluationController;
use App\Http\Controllers\Frontend\EvaluationFormController;

use App\Http\Controllers\Frontend\FacultyController as FrontendFacultyController;
use App\Http\Controllers\Frontend\HistoryEvaluationController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SentimentAnalysisController;
use App\Http\Controllers\Frontned\EvaluationHistoryController;
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
    Route::get('dashboard/profile/evaluate/{id}/{subject}/{schedule}', [EvaluationFormController::class, 'evaluateFaculty'])->name('profile-evaluate');
    Route::post('dashboard/evaluation-submit', [EvaluationFormController::class, 'store'])->name('evaluation-submit');
    Route::get('dashboard/evaluation-success', [EvaluationFormController::class, 'success'])->name('evaluation-success');
    Route::get('dashboard/evalutaion-subject/{id}', [EvaluationController::class, 'subject_choose'])->name('evaluation-subject');
    Route::get('evaluation-history', [HistoryEvaluationController::class, 'index'])->name('index.evaluation-history');
});


Route::group([
    'middleware' => ['auth', 'user.type:faculty'],
    'prefix' => 'faculty',
    'as' => 'faculty.'],
        function(){
            Route::get('/dashboard', [FrontendFacultyController::class, 'index'])->name('dashboard');
            Route::get('/dashboard/profile', [FrontendFacultyController::class,'profile'])->name('profile.index');
            Route::put('dashboard/profile-update', [FrontendFacultyController::class, 'updateFaculty'])->name('profile-update');
            Route::get('/sentiment-snalysis', [SentimentAnalysisController::class, 'sentimentAnalysis'])->name('sentimentAnalysis.index');
            Route::get('class-list', [ClassListController::class, 'index'])->name('class-list.index');
            Route::get('class-list-import', [ClassListController::class, 'import'])->name('class-list.import');
            Route::post('class-list-import', [ClassListController::class, 'uploadData'])->name('class-list.upload');
            Route::get('class-list-add', [ClassListController::class, 'addStudent'])->name('addStudent.index');
            Route::post('class-list-add-student', [ClassListController::class, 'store'])->name('store.index');

        });


require __DIR__.'/auth.php';
