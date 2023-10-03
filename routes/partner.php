<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Partner\PasswordResetController;

use App\Http\Controllers\Partner\BlogController;
use App\Http\Controllers\Partner\DashboardController;
use App\Http\Controllers\Partner\ContactEnquiryController;
use App\Http\Controllers\Partner\ProfileController;
use App\Http\Controllers\Partner\SearchBlogController;
use App\Http\Controllers\Partner\TestimonialController;
use App\Http\Controllers\Partner\SearchTestimonialController;


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
    Route::resource('blog', BlogController::class);

    // This route is for the TestimonialController
    Route::resource('testimonial', TestimonialController::class);

    // This route is for the PostEnquireController
    Route::resource('contact-enquiry', PartnerContactEnquiryController::class);


    // This route is for the search functionality in the Blogs admin page
    Route::get('search-blog', [SearchBlogController::class, 'search'])->name('blog.search');
    // This route is for the search functionality in the Testimonials admin page
    Route::get('search-testimonial', [SearchTestimonialController::class, 'search'])->name('testimonial.search');

});
