<?php

use App\Http\Controllers\Admin\{AboutController,AuthController,BlogController,ClientsController,ContactController,EmployeeController,PortfolioController,ProfileController,ServicesController,TestimonialController,UserController};
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;


Route::get('/',[UserPageController::class,'home'])->name('users.home'); 
Route::get('aboutus',[UserPageController::class,'about'])->name('users.aboutus'); 
Route::get('services',[UserPageController::class,'service'])->name('users.services'); 
Route::get('/servicedetails',[UserPageController::class,'servicedetails'])->name('users.servicedetails'); 
Route::get('packages',[UserPageController::class,'package'])->name('users.packages'); 
Route::get('/packagedetails/{id}',[UserPageController::class,'packagedetails'])->name('users.packagedetails'); 
Route::get('contactus',[UserPageController::class,'contact'])->name('users.contactus'); 
Route::post('/send-email', [UserPageController::class, 'sendEmail'])->name('send.email');

// Admin routes
Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/admin/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');

// Authenticated routes
// Route::middleware(['auth'])->group(function () {
    // Dashboard and Profile routes
    Route::get('/admin/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/logout', [ProfileController::class, 'logout'])->name('logout');


    Route::post('import', [EmployeeController::class, 'import'])->name('import');
    Route::get('export', [EmployeeController::class, 'export'])->name('export');

    // Resourceful routes for Admin sections
    $resources = [
        'users' => UserController::class,
        'about' => AboutController::class,
        'clients' => ClientsController::class,
        'testimonial' => TestimonialController::class,
        'services' => ServicesController::class,
        'portfolio' => PortfolioController::class,
        'blog' => BlogController::class,
        'contact' => ContactController::class,
        'employee' => EmployeeController::class,
    ];

    foreach ($resources as $resource => $controller) {
        Route::prefix("admin/{$resource}")->name("{$resource}.")->group(function () use ($controller, $resource) {
            Route::get('/', [$controller, 'index'])->name('index');
            Route::get('/create', [$controller, 'createOrEdit'])->name('create');
            Route::get('/edit/{id}', [$controller, 'createOrEdit'])->name('edit');
            Route::post('/{id}', [$controller, 'show'])->name('show');
            Route::post('/update', [$controller, 'storeOrUpdate'])->name('update');
            Route::delete('/delete/{id}', [$controller, 'destroy'])->name('delete');
        });
    }
// });