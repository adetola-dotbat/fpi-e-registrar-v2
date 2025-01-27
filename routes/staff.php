<?php

use App\Http\Controllers\Staff\ResetPasswordController;
use App\Http\Controllers\Staff\AppraisalController;
use App\Http\Controllers\Staff\EducationController;
use App\Http\Controllers\Staff\ProfileController;
use App\Http\Controllers\Staff\ServiceController;
use App\Http\Controllers\Staff\LeaveController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('staff/')->name('staff.')->group(function () {
    Route::get('profile/{staff}', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('education/{staff}', [EducationController::class, 'view'])->name('education.view');
    Route::get('service/{staff}', [ServiceController::class, 'view'])->name('service.view');
    Route::get('leave/{staff}', [LeaveController::class, 'view'])->name('leave.view');
    Route::get('appraisal', [AppraisalController::class, 'view'])->name('appraisal.view');
    Route::get('reset-password', [ResetPasswordController::class, 'index'])->name('reset.password');
    Route::post('password/update', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
});
