<?php

use App\Http\Controllers\Staff\EducationController;
use App\Http\Controllers\Staff\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('staff/')->name('staff.')->group(function () {
    Route::get('profile/{staff}', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('education/{staff}', [EducationController::class, 'view'])->name('education.view');
});
