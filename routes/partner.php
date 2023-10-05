<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Partner\PasswordResetController;

use App\Http\Controllers\Partner\ManageBookingController;
use App\Http\Controllers\Partner\DashboardController;
use App\Http\Controllers\Partner\ContactEnquiryController;
use App\Http\Controllers\Partner\ProfileController;
use App\Http\Controllers\Partner\SearchBookingController;


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

    // This route is for the search functionality in the Bookings admin page
    Route::get('search-booking', [SearchBookingController::class, 'search'])->name('booking.search');

});
