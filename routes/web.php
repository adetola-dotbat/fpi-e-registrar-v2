<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StaffActingAppointmentController;
use App\Http\Controllers\Admin\StaffBankDetailController;
use App\Http\Controllers\Admin\StaffCommendationController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StaffDocumentController;
use App\Http\Controllers\Admin\StaffGratitudePaymentController;
use App\Http\Controllers\Admin\StaffInstitutionAttendedController;
use App\Http\Controllers\Admin\StaffLeaveController;
use App\Http\Controllers\Admin\StaffNextOfKinController;
use App\Http\Controllers\Admin\StaffPreviousEmploymentController;
use App\Http\Controllers\Admin\StaffProfessionalDetailsController;
use App\Http\Controllers\Admin\StaffPromotionController;
use App\Http\Controllers\Admin\StaffPublicServiceController;
use App\Http\Controllers\Admin\StaffTermination\StaffTerminationController;
use App\Http\Controllers\Admin\StaffTermination\TerminationByDeathController;
use App\Http\Controllers\Admin\StaffTermination\TerminationByResignationController;
use App\Http\Controllers\Admin\StaffTermination\TerminationByTransferController;
use App\Http\Controllers\Admin\StaffTransferController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->prefix('admin/')->name('admin.')->group(function () {
    Route::prefix('staffs/')->name('staff.')->group(function () {
        Route::get('all', [StaffController::class, 'index'])->name('index');
        Route::get('register', [StaffController::class, 'registerForm'])->name('register.form');
        Route::post('register', [StaffController::class, 'registerStaff'])->name('register');
        Route::get('reports/', [StaffController::class, 'report'])->name('report');
        Route::get('{staff}', [StaffController::class, 'view'])->name('view');
        Route::get('destroy/{staff}', [StaffController::class, 'destroy'])->name('destroy');
        Route::get('reset-password/{id}', [StaffController::class, 'resetPassword'])->name('reset_password');

        Route::prefix('review/')->name('review.')->group(function () {
            Route::get('all', [ReviewController::class, 'index'])->name('index');
            Route::get('{staff}', [ReviewController::class, 'view'])->name('view');
            Route::post('', [ReviewController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [ReviewController::class, 'destroy'])->name('destroy');
            Route::post('update', [ReviewController::class, 'update'])->name('update');
        });


        Route::prefix('transfer/')->name('transfer.')->group(function () {
            Route::get('all', [StaffTransferController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffTransferController::class, 'view'])->name('view');
            Route::post('', [StaffTransferController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffTransferController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffTransferController::class, 'update'])->name('update');
        });

        Route::prefix('promotions/')->name('promotion.')->group(function () {
            Route::get('all', [StaffPromotionController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffPromotionController::class, 'view'])->name('view');
            Route::post('', [StaffPromotionController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffPromotionController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffPromotionController::class, 'update'])->name('update');
        });

        Route::prefix('acting-appointment/')->name('acting.appointment.')->group(function () {
            Route::get('all', [StaffActingAppointmentController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffActingAppointmentController::class, 'view'])->name('view');
            Route::post('', [StaffActingAppointmentController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffActingAppointmentController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffActingAppointmentController::class, 'update'])->name('update');
        });

        Route::prefix('gratuity/')->name('gratuity.')->group(function () {
            Route::get('all', [StaffGratitudePaymentController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffGratitudePaymentController::class, 'view'])->name('view');
            Route::post('', [StaffGratitudePaymentController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffGratitudePaymentController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffGratitudePaymentController::class, 'update'])->name('update');
        });


        Route::prefix('public-service/')->name('public.service.')->group(function () {
            // Route::get('', [StaffPublicServiceController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffPublicServiceController::class, 'view'])->name('view');
            Route::post('', [StaffPublicServiceController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffPublicServiceController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffPublicServiceController::class, 'update'])->name('update');
        });

        Route::prefix('commendation/')->name('commendation.')->group(function () {
            Route::get('all', [StaffCommendationController::class, 'index'])->name('index');
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
            Route::get('all', [StaffTerminationController::class, 'index'])->name('termination.index');
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
            Route::get('{id}/approve', [StaffInstitutionAttendedController::class, 'approve'])->name('approve');
            Route::get('{id}/decline', [StaffInstitutionAttendedController::class, 'decline'])->name('decline');
        });

        Route::prefix('professional-details/')->name('professional.details.')->group(function () {
            // Route::get('', [StaffProfessionalDetailsController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffProfessionalDetailsController::class, 'view'])->name('view');
            Route::post('', [StaffProfessionalDetailsController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffProfessionalDetailsController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffProfessionalDetailsController::class, 'update'])->name('update');
            Route::get('{id}/approve', [StaffProfessionalDetailsController::class, 'approve'])->name('approve');
            Route::get('{id}/decline', [StaffProfessionalDetailsController::class, 'decline'])->name('decline');
        });

        Route::prefix('leaves/')->name('leave.')->group(function () {
            Route::get('all', [StaffLeaveController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffLeaveController::class, 'view'])->name('view');
            Route::post('', [StaffLeaveController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffLeaveController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffLeaveController::class, 'update'])->name('update');
            Route::get('{id}/approve', [StaffLeaveController::class, 'approve'])->name('approve');
            Route::get('{id}/decline', [StaffLeaveController::class, 'decline'])->name('decline');
        });

        Route::prefix('previous-employment/')->name('previous.employment.')->group(function () {
            // Route::get('', [StaffProfessionalDetailsController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffPreviousEmploymentController::class, 'view'])->name('view');
            Route::post('', [StaffPreviousEmploymentController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffPreviousEmploymentController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffPreviousEmploymentController::class, 'update'])->name('update');
        });

        Route::prefix('next-of-kin/')->name('next_of_kin.')->group(function () {
            // Route::get('', [StaffProfessionalDetailsController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffNextOfKinController::class, 'view'])->name('view');
            Route::post('', [StaffNextOfKinController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffNextOfKinController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffNextOfKinController::class, 'update'])->name('update');
        });

        Route::prefix('document/')->name('document.')->group(function () {
            Route::get('', [StaffDocumentController::class, 'index'])->name('index');
            Route::get('{staff}', [StaffDocumentController::class, 'view'])->name('view');
            Route::post('', [StaffDocumentController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [StaffDocumentController::class, 'destroy'])->name('destroy');
            Route::post('update', [StaffDocumentController::class, 'update'])->name('update');
        });
    });
    Route::prefix('user/')->name('user.')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('{staff}', [UserController::class, 'view'])->name('view');
        Route::get('edit/{staff}', [UserController::class, 'edit'])->name('edit');
        Route::post('', [UserController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
        Route::post('update', [UserController::class, 'update'])->name('update');
    });
});

Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');
Route::get('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/upload-csv', [UploadController::class, 'showUploadForm'])->name('show.upload.form');
Route::post('/upload-csv', [UploadController::class, 'uplodadDOcu'])->name('upload.csv');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('home');
    // })->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/staff.php';

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
