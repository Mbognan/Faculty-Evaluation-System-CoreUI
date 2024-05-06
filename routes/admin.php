<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EvaluationScheduleController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\FacultyView;
use App\Http\Controllers\Admin\FacultyViewController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\RegistrationPendingController;
use App\Http\Controllers\Admin\RejectedAccountController;
use App\Http\Controllers\Admin\VerifiedAccountController;
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
           Route::get('question-edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
           Route::put('question-update/{id}', [QuestionController::class, 'update'])->name('question.update');
           Route::delete('/question-delete/{id}', [QuestionController::class,'destroy'])->name('question.delete');
           Route::get('generate-pdf',[QuestionController::class, 'generatePdf'])->name('generatePdf');
           Route::post('view-pdf',[QuestionController::class, 'viewPdf'])->name('viewPdf');

            /**Faculty route */
            Route::resource('/faculty', FacultyController::class);
            Route::get('/faculty-view', [FacultyViewController::class,'index'])->name('faculty-view');
            Route::get('faculty/view-result/{user_id}', [FacultyViewController::class,'view'])->name('faculty.result');
            Route::post('user/export-excel/{id}', [FacultyViewController::class, 'export_excel'])->name('export-excel');
            /**EvaluationSchedule route */
            Route::get('evaluation_schedule', [EvaluationScheduleController::class, 'index'])->name('evaluation_schedule.index');
            Route::post('evaluation_schedule-store', [EvaluationScheduleController::class,'store'])->name('evaluation_schedule.store');
            /**Hero Route */
            Route::resource('/hero', HeroController::class);

            /**registration prending route */
            Route::get('/registration-pending', [RegistrationPendingController::class, 'pendingRegistration'])->name('registration.pending');
            Route::post('/registration-import', [RegistrationPendingController::class, 'importPendingRegistration'])->name('registration.import-pending');
            Route::put('accepted-account/{id}', [RegistrationPendingController::class, 'store'])->name('accepted.store');
            Route::put('rejected-account/{id}', [RegistrationPendingController::class, 'rejected'])->name('rejected.store');
            /**Verified account route */
            Route::get('account/verified', [VerifiedAccountController::class, 'index'])->name('account.verified');
            /**Rejected account route */
            Route::get('rejected/account', [RejectedAccountController::class, 'index'])->name('rejected.index');

});
