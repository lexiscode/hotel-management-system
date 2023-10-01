<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\RoomDetailController;
use App\Http\Controllers\Web\RoomController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\OurTeamController;
use App\Http\Controllers\Web\WebLoginController;
use App\Http\Controllers\Web\WebRegisterController;
use App\Http\Controllers\Web\PartnerListController;
use App\Http\Controllers\Web\Partners\AdisHotelController;



// These routes is for the main menu
Route::get('/', [HomepageController::class, '__invoke'])->name('web.home');
Route::get('about', [AboutController::class, 'index'])->name('web.about');
Route::get('contact', [ContactController::class, 'index'])->name('web.contact');
Route::get('services', [ServiceController::class, 'index'])->name('web.services');
Route::get('room/{id}', [RoomDetailController::class, 'show'])->name('web.rooms');
Route::get('rooms', [RoomController::class, 'index'])->name('web.rooms');
Route::get('partners-list', [PartnerListController::class, 'index'])->name('web.partners-list');
Route::get('booking', [BookingController::class, 'index'])->name('web.booking');
Route::get('our-team', [OurTeamController::class, 'index'])->name('web.our-team');

Route::get('login', [WebLoginController::class, 'index'])->name('web.login');
Route::get('register', [WebRegisterController::class, 'index'])->name('web.register');

// Group Routes for each Hotels
Route::get('partners-list/adis-hotel', [AdisHotelController::class, 'index'])->name('web.adis-hotel');


Route::fallback(function () {
    return view('web.frontend.404.index');
});

