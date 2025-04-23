<?php

use App\Http\Controllers\Admin\{AboutController, BannerController, ContactController, FeatureController, LoginController, MetaDataController, PackageController, ServiceController};
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserPageController::class,'home'])->name('users.home'); 
Route::get('aboutus',[UserPageController::class,'about'])->name('users.aboutus'); 
Route::get('services',[UserPageController::class,'service'])->name('users.services'); 
// Route::get('/servicedetails',[UserPageController::class,'servicedetails'])->name('users.servicedetails'); 
Route::get("/servicedetails/{slug}", [UserPageController::class, 'servicedetails'])->where('slug', '[A-Za-z0-9\-]+')->name('users.servicedetails');
Route::get('packages',[UserPageController::class,'package'])->name('users.packages'); 
// Route::get('/packagedetails/{id}',[UserPageController::class,'packagedetails'])->name('users.packagedetails'); 
Route::get("/packagedetails/{slug}", [UserPageController::class, 'packagedetails'])->where('slug', '[A-Za-z0-9\-]+')->name('users.packagedetails');
Route::get('contactus',[UserPageController::class,'contact'])->name('users.contactus'); 
Route::post('/send-email', [UserPageController::class, 'sendEmail'])->name('send.email');

Route::group(["prefix"=> "admin"], function () {
// Admin routes
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
        Route::get('/registration', [LoginController::class, 'registration'])->name('registration');
        Route::post('/register-process', [LoginController::class, 'registerProcess'])->name('registerProcess');
    });
// Authenticated routes
    Route::group(['middleware' => 'auth'], function () {
        // Dashboard and Profile routes
        Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
        Route::get('/change-password', [LoginController::class, 'showChangePasswordForm'])->name('changePasswordForm');
        Route::post('/change-password', [LoginController::class, 'changePassword'])->name('changePassword');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        // Resourceful routes for Admin sections
        $resources = [
            'banner'    => BannerController::class,
            'meta_data' => MetaDataController::class,
            'about'     => AboutController::class,
            'services'  => ServiceController::class,
            'packages'  => PackageController::class,
            'features'  => FeatureController::class,
            'contact'   => ContactController::class,
        ];

        foreach ($resources as $resource => $controller) {
            Route::get("$resource", [$controller, 'index'])->name("$resource.index");
            Route::get("$resource/create", [$controller, 'createOrEdit'])->name("$resource.create");
            // Route::get("$resource/{slug}", [$controller, 'show'])->name("$resource.show");
            Route::get("$resource/{id}", [$controller, 'show'])->where('id', '[0-9]+')->name("$resource.show");
            Route::get("$resource/{slug}", [$controller, 'show'])->where('slug', '[A-Za-z0-9\-]+')->name("$resource.show");
            Route::get("$resource/edit/{id}", [$controller, 'createOrEdit'])->name("$resource.edit");
            Route::post("$resource/update", [$controller, 'storeOrUpdate'])->name("$resource.update");
            Route::get("$resource/delete/{id}", [$controller, 'destroy'])->name("$resource.delete");
        }
    });
});