<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Partner\PasswordResetController;

use App\Http\Controllers\Partner\ManageBookingController;
use App\Http\Controllers\Partner\DashboardController;
use App\Http\Controllers\Partner\ContactEnquiryController;
use App\Http\Controllers\Partner\ProfileController;
use App\Http\Controllers\Partner\SearchBookingController;
use App\Http\Controllers\Partner\GenerateStatementController;



Route::group(['prefix' => 'partner', 'as' => 'partner.'], function(){

    Route::get('login', [PartnerController::class, 'index'])->name('login.index');
    Route::post('login', [PartnerController::class, 'login'])->name('login');

    // Forgot/Reset password
    Route::get('forgot-password', [PasswordResetController::class, 'create'])->name('forgot-password');
    Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [PasswordResetController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [PasswordResetController::class, 'handleResetPassword'])->name('reset-password.send');
});


Route::group(['prefix' => 'partner', 'as' => 'partner.', 'middleware'=> ['partner']], function(){

    Route::post('logout', [PartnerController::class, 'logout'])->name('logout');

    // Admin Profile routes
    Route::put('profile-password-update/{id}', [ProfileController::class, 'passwordUpdate'])->name('profile-password.update');
    Route::resource('profile', ProfileController::class);

    // This route is for the admin Dashboard page Controller
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // This route is for the BlogController
    Route::resource('manage-booking', ManageBookingController::class);

    // This route is for the PostEnquireController
    Route::resource('contact-enquiry', ContactEnquiryController::class);

    // Thess routes are for the TenantRecordController
    Route::get('generate-statement', [GenerateStatementController::class, 'index'])->name('generate-statement.index');
    Route::get('generate-statement/create', [GenerateStatementController::class, 'create'])->name('generate-statement.create');
    Route::get('generate-statement/generate-pdf', [GenerateStatementController::class, 'generatePDF'])->name('generate-statement.generate-pdf');

    // This route is for the search functionality in the Bookings admin page
    Route::get('search-booking', [SearchBookingController::class, 'search'])->name('booking.search');

});
