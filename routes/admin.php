<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PasswordResetController;

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostEnquiryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RemittanceController;
use App\Http\Controllers\Admin\SearchRemitController;
use App\Http\Controllers\Admin\SearchPropertyController;
use App\Http\Controllers\Admin\SearchAgentController;
use App\Http\Controllers\Admin\TenantRecordController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\RoleUserController;


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

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');

    // Admin Profile routes
    Route::put('profile-password-update/{id}', [ProfileController::class, 'passwordUpdate'])->name('profile-password.update');
    Route::resource('profile', ProfileController::class);

    // Admin Settings routes
    Route::get('setting', [AdminSettingController::class, 'index'])->name('setting.index');
    Route::put('general-setting', [AdminSettingController::class, 'updateGeneralSetting'])->name('general-setting.update');
    Route::put('seo-setting', [AdminSettingController::class, 'updateSeoSetting'])->name('seo-setting.update');

    // This route is for the admin Dashboard page Controller
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // This route is for the PropertyController
    Route::resource('property', PropertyController::class);

    // This route is for the BlogController
    Route::resource('blog', BlogController::class);

    // This route is for the PostEnquireController
    Route::resource('post-enquiry', PostEnquiryController::class);

    // This route is for the AboutUs Controller
    Route::resource('about', AboutController::class);

    // This route is for the PostEnquireController
    Route::resource('agent', AgentController::class);

    // This route is for the RemittanceController
    Route::resource('remit', RemittanceController::class);

    // This route is for the search functionality in the Remittance admin page
    Route::get('search-remit', [SearchRemitController::class, 'search'])->name('remit.search');
    // This route is for the search functionality in the Properties admin page
    Route::get('search-property', [SearchPropertyController::class, 'search'])->name('property.search');
    // This route is for the search functionality in the Properties admin page
    Route::get('search-agent', [SearchAgentController::class, 'search'])->name('agent.search');

    // Thess routes are for the TenantRecordController
    Route::get('statement', [TenantRecordController::class, 'index'])->name('statement.index');
    Route::get('statement/create', [TenantRecordController::class, 'create'])->name('statement.create');
    Route::get('statement/generate-pdf', [TenantRecordController::class, 'generatePDF'])->name('statement.generate-pdf');
    Route::get('statement/generate-excel', [TenantRecordController::class, 'generateExcel'])->name('statement.generate-excel');

    // This route is for Roles and Permission Controller
    Route::get('role', [RolePermissionController::class, 'index'])->name('role.index');
    Route::get('role/create', [RolePermissionController::class, 'create'])->name('role.create');
    Route::post('role/store', [RolePermissionController::class, 'store'])->name('role.store');
    Route::get('role/{role}/edit', [RolePermissionController::class, 'edit'])->name('role.edit');
    Route::put('role/{role}', [RolePermissionController::class, 'update'])->name('role.update');
    Route::delete('role/{role}', [RolePermissionController::class, 'destroy'])->name('role.destroy');

    // Admin User Roles
    Route::resource('role-user', RoleUserController::class);

});
