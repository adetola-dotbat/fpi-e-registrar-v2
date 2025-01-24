<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StaffActingAppointmentController;
use App\Http\Controllers\Admin\StaffBankDetailController;
use App\Http\Controllers\Admin\StaffCommendationController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StaffGratitudePaymentController;
use App\Http\Controllers\Admin\StaffInstitutionAttendedController;
use App\Http\Controllers\Admin\StaffProfessionalDetailsController;
use App\Http\Controllers\Admin\StaffPromotionController;
use App\Http\Controllers\Admin\StaffPublicServiceController;
use App\Http\Controllers\Admin\StaffTermination\StaffTerminationController;
use App\Http\Controllers\Admin\StaffTermination\TerminationByDeathController;
use App\Http\Controllers\Admin\StaffTermination\TerminationByResignationController;
use App\Http\Controllers\Admin\StaffTermination\TerminationByTransferController;
use App\Http\Controllers\Admin\StaffTransferController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/')->name('admin.')->group(function () {
    Route::prefix('staffs/')->name('staff.')->group(function () {
        Route::get('', [StaffController::class, 'index'])->name('index');
        Route::get('/{staff}', [StaffController::class, 'view'])->name('view');

        Route::prefix('transfer/')->group(function () {
            // Route::get('', [StaffTransferController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffTransferController::class, 'view'])->name('transfer');
            Route::post('', [StaffTransferController::class, 'store'])->name('transfer.store');
            Route::get('{id}', [StaffTransferController::class, 'destroy'])->name('transfer.destroy');
            Route::post('update', [StaffTransferController::class, 'update'])->name('transfer.update');
        });

        Route::prefix('promotion/')->group(function () {
            Route::get('', [StaffPromotionController::class, 'index'])->name('promotion.index');
            Route::get('{staff}', [StaffPromotionController::class, 'view'])->name('promotion');
            Route::post('', [StaffPromotionController::class, 'store'])->name('promotion.store');
            Route::get('{id}', [StaffPromotionController::class, 'destroy'])->name('promotion.destroy');
            Route::post('update', [StaffPromotionController::class, 'update'])->name('promotion.update');
        });

        Route::prefix('acting-appointment/')->group(function () {
            // Route::get('', [StaffActingAppointmentController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffActingAppointmentController::class, 'view'])->name('acting.appointment');
            Route::post('', [StaffActingAppointmentController::class, 'store'])->name('acting.appointment.store');
            Route::get('{id}', [StaffActingAppointmentController::class, 'destroy'])->name('acting.appointment.destroy');
            Route::post('update', [StaffActingAppointmentController::class, 'update'])->name('acting.appointment.update');
        });

        Route::prefix('gratitude-payment/')->group(function () {
            // Route::get('', [StaffGratitudePaymentController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffGratitudePaymentController::class, 'view'])->name('gratitude.payment');
            Route::post('', [StaffGratitudePaymentController::class, 'store'])->name('gratitude.payment.store');
            Route::get('destroy/{id}', [StaffGratitudePaymentController::class, 'destroy'])->name('gratitude.payment.destroy');
            Route::post('update', [StaffGratitudePaymentController::class, 'update'])->name('gratitude.payment.update');
        });

        Route::prefix('public-service/')->name('public.service.')->group(function () {
            // Route::get('', [StaffPublicServiceController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffPublicServiceController::class, 'view'])->name('view');
            Route::post('', [StaffPublicServiceController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffPublicServiceController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffPublicServiceController::class, 'update'])->name('update');
        });

        Route::prefix('commendation/')->name('commendation.')->group(function () {
            // Route::get('', [StaffCommendationController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffCommendationController::class, 'view'])->name('view');
            Route::post('', [StaffCommendationController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffCommendationController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffCommendationController::class, 'update'])->name('update');
        });

        Route::prefix('bank-details/')->name('bank.details.')->group(function () {
            // Route::get('', [StaffBankDetailController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffBankDetailController::class, 'view'])->name('view');
            Route::post('', [StaffBankDetailController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffBankDetailController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffBankDetailController::class, 'update'])->name('update');
        });

        Route::prefix('termination/')->group(function () {
            // Route::get('', [StaffTerminationController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffTerminationController::class, 'view'])->name('termination');
            Route::post('by-resignation', [TerminationByResignationController::class, 'store'])->name('termination.resignation.store');
            Route::post('by-death', [TerminationByDeathController::class, 'store'])->name('termination.death.store');
            Route::post('by-transfer', [TerminationByTransferController::class, 'store'])->name('termination.transfer.store');
            Route::get('destroy/by-resignation/{id}', [TerminationByResignationController::class, 'destroy'])->name('termination.resignation.destroy');
            Route::get('destroy/by-death/{id}', [TerminationByDeathController::class, 'destroy'])->name('termination.death.destroy');
            Route::get('destroy/by-transfer/{id}', [TerminationByTransferController::class, 'destroy'])->name('termination.transfer.destroy');
        });

        Route::prefix('institution-attended/')->name('institution.attended.')->group(function () {
            // Route::get('', [StaffBankDetailController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffInstitutionAttendedController::class, 'view'])->name('view');
            Route::post('', [StaffInstitutionAttendedController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffInstitutionAttendedController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffInstitutionAttendedController::class, 'update'])->name('update');
        });

        Route::prefix('professional-details/')->name('professional.details.')->group(function () {
            // Route::get('', [StaffProfessionalDetailsController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffProfessionalDetailsController::class, 'view'])->name('view');
            Route::post('', [StaffProfessionalDetailsController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffProfessionalDetailsController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffProfessionalDetailsController::class, 'update'])->name('update');
        });
    });
});

Route::get('/upload-csv', [UploadController::class, 'showUploadForm'])->name('show.upload.form');
Route::post('/upload-csv', [UploadController::class, 'uploadProfessionalDetails'])->name('upload.csv');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/staff.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
