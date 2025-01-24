<?php

use App\Http\Controllers\Staff\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('staff/')->name('staff.')->group(function () {
    Route::prefix('profile/')->name('profile.')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('index');
        Route::get('/{staff}', [ProfileController::class, 'view'])->name('view');
    });
});
