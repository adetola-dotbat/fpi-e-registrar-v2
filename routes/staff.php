<?php

use App\Http\Controllers\Staff\ResetPasswordController;
use App\Http\Controllers\Staff\AppraisalController;
use App\Http\Controllers\Staff\EducationController;
use App\Http\Controllers\Staff\ProfileController;
use App\Http\Controllers\Staff\ServiceController;
use App\Http\Controllers\Staff\LeaveController;
use App\Http\Controllers\Staff\{TransferController, PromotionController, ActingAppointmentController, GratuityPaymentController, CommendationController, TerminationController, ProfessionalDetailsController};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('staff/')->name('staff.')->group(function () {
    Route::get('profile/{staff}', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('education/{staff}', [EducationController::class, 'view'])->name('education.view');
    Route::get('profession/{staff}', [ProfessionalDetailsController::class, 'view'])->name('profession.view');
    Route::get('transfers', [TransferController::class, 'index'])->name('transfer.index');
    Route::get('promotions', [PromotionController::class, 'index'])->name('promotion.index');
    Route::get('acting-appointments', [ActingAppointmentController::class, 'index'])->name('acting.appointment.index');
    Route::get('gratuity', [GratuityPaymentController::class, 'index'])->name('gratuity.index');
    Route::get('commendation', [CommendationController::class, 'index'])->name('commendation.index');
    Route::get('termination', [TerminationController::class, 'index'])->name('termination.index');
    Route::get('service/{staff}', [ServiceController::class, 'view'])->name('service.view');
    Route::get('leave/{staff}', [LeaveController::class, 'view'])->name('leave.view');
    Route::get('appraisal', [AppraisalController::class, 'view'])->name('appraisal.view');

    Route::get('reset-password', [ResetPasswordController::class, 'index'])->name('reset.password');
    Route::post('password/update', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
});
