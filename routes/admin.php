<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EvaluationScheduleController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\FacultyView;
use App\Http\Controllers\Admin\FacultyViewController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuestionController;

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
           /**Category route */
           Route::resource('/category', CategoryController::class);
           /**Question route */
           Route::get('/question', [QuestionController::class,'index'])->name('question.index');
           Route::post('/post/post_order_change', [QuestionController::class, 'post_order_change'])->name('post.order_change');
           Route::post('/question-store', [QuestionController::class, 'store'])->name('question.store');
            /**Faculty route */
            Route::resource('/faculty', FacultyController::class);
            Route::get('/faculty-view', [FacultyViewController::class,'index'])->name('faculty-view');
            Route::get('faculty/view-result/{user_id}', [FacultyViewController::class,'view'])->name('faculty.result');
            /**EvaluationSchedule route */
            Route::get('evaluation_schedule', [EvaluationScheduleController::class, 'index'])->name('evaluation_schedule.index');
            Route::post('evaluation_schedule-store', [EvaluationScheduleController::class,'store'])->name('evaluation_schedule.store');

});
