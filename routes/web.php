<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\BlogDetailController;
use App\Http\Controllers\Web\TestimonialController;
use App\Http\Controllers\Web\OurHotelListController;
use App\Http\Controllers\Web\WebLoginController;
use App\Http\Controllers\Web\WebRegisterController;



// These routes is for the main menu
Route::get('/', [HomepageController::class, '__invoke'])->name('web.home');
Route::get('about', [AboutController::class, 'index'])->name('web.about');
Route::get('contact', [ContactController::class, 'index'])->name('web.contact');
Route::get('blog', [BlogController::class, 'index'])->name('web.blog');
Route::get('blog/{id}', [BlogDetailController::class, 'show'])->name('web.blog-details');
Route::get('testimonial', [TestimonialController::class, 'index'])->name('web.testimonials');
Route::get('our-hotel-lists', [OurHotelListController::class, 'index'])->name('web.our-hotel-lists');
Route::get('login', [WebLoginController::class, 'index'])->name('web.login');
Route::get('register', [WebRegisterController::class, 'index'])->name('web.register');


Route::fallback(function () {
    return view('web.frontend.404.index');
});

