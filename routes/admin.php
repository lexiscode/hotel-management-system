<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PasswordResetController;

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactEnquiryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\SearchBlogController;
use App\Http\Controllers\Admin\SearchTestimonialController;
use App\Http\Controllers\Admin\SearchNewsletterController;



Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('login', [AdminController::class, 'index'])->name('login.index');
    Route::post('login', [AdminController::class, 'login'])->name('login');

    // Forgot/Reset password
    Route::get('forgot-password', [PasswordResetController::class, 'create'])->name('forgot-password');
    Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [PasswordResetController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [PasswordResetController::class, 'handleResetPassword'])->name('reset-password.send');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=> ['admin']], function(){

    Route::post('logout', [AdminController::class, 'logout'])->name('logout');

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
    Route::resource('contact-enquiry', ContactEnquiryController::class);

    // This route is for the NewsletterController
    Route::resource('newsletter', NewsletterController::class);

    // This route is for the search functionality in the Blogs admin page
    Route::get('search-blog', [SearchBlogController::class, 'search'])->name('blog.search');
    // This route is for the search functionality in the Testimonials admin page
    Route::get('search-testimonial', [SearchTestimonialController::class, 'search'])->name('testimonial.search');
    // This route is for the search functionality in the Newsletter admin page
    Route::get('search-newsletter', [SearchNewsletterController::class, 'search'])->name('newsletter.search');

});

