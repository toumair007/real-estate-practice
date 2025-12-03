<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminLocationController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Agent\AgentController;

// Front End Section
Route::get('/', [FrontController::class, 'index'])->name('front.home');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');
Route::get('/locations', [FrontController::class, 'locations'])->name('front.locations');

Route::middleware('app.guest:web,agent')->group(function () {
    Route::get('/select-user', [FrontController::class, 'selectUser'])->name('select.user');
});

// User Section
Route::middleware('app.guest')->group(function () {
    Route::get('/registration', [UserController::class, 'registration'])->name('registration');
    Route::post('/registration', [UserController::class, 'registrationSubmit'])->name('registration.submit');
    Route::get('/registration-verify/{token}/{email}', [UserController::class, 'registrationVerify'])->name('registration.verify');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/forget-password', [UserController::class, 'forgetPassword'])->name('forget.password');
    Route::post('/forget-password', [UserController::class, 'forgetPasswordSubmit'])->name('forget.password.submit');
    Route::get('/reset-password/{token}/{email}', [UserController::class, 'resetPassword'])->name('reset.password');
    Route::post('/reset-password/{token}/{email}', [UserController::class, 'resetPasswordSubmit'])->name('reset.password.submit');
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('user')->group(function(){
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'profileSubmit'])->name('profile.submit');
});

// Agent Section
Route::middleware('app.guest:agent')->prefix('agent')->group(function(){
    Route::get('/', function(){ return redirect()->route('agent.login'); });
    Route::get('/registration', [AgentController::class, 'registration'])->name('agent.registration');
    Route::post('/registration-submit', [AgentController::class, 'registrationSubmit'])->name('agent.registration.submit');
    Route::get('/registration-verify/{token}/{email}', [AgentController::class, 'registrationVerify'])->name('agent.registration.verify');
    Route::get('/login', [AgentController::class, 'login'])->name('agent.login');
    Route::post('/login', [AgentController::class, 'loginSubmit'])->name('agent.login.submit');
    Route::get('/forget-password', [AgentController::class, 'forgetPassword'])->name('agent.forget.password');
    Route::post('/forget-password', [AgentController::class, 'forgetPasswordSubmit'])->name('agent.forget.password.submit');
    Route::get('/reset-password/{token}/{email}', [AgentController::class, 'resetPassword'])->name('agent.reset.password');
    Route::post('/reset-password/{token}/{email}', [AgentController::class, 'resetPasswordSubmit'])->name('agent.reset.password.submit');
});
Route::get('agent/logout', [AgentController::class, 'logout'])->name('agent.logout');

Route::middleware('agent')->prefix('agent')->group(function(){
    Route::get('/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
    Route::get('/profile', [AgentController::class, 'profile'])->name('agent.profile');
    Route::post('/profile', [AgentController::class, 'profileSubmit'])->name('agent.profile.submit');
});

// Admin Section
Route::prefix('admin')->group(function(){
    Route::get('/', function(){ return redirect()->route('admin.login'); });
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::get('/forget-password', [AdminController::class, 'forgetPassword'])->name('admin.forget.password');
    Route::post('/forget-password', [AdminController::class, 'forgetPasswordSubmit'])->name('admin.forget.password.submit');
    Route::get('/reset-password/{token}/{email}', [AdminController::class, 'resetPassword'])->name('admin.reset.password');
    Route::post('/reset-password/{token}/{email}', [AdminController::class, 'resetPasswordSubmit'])->name('admin.reset.password.submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::middleware('admin')->prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/profile-edit', [AdminController::class, 'profileEdit'])->name('admin.profile.edit');
    Route::post('/profile', [AdminController::class, 'profileSubmit'])->name('admin.profile.submit');

    // Package
    Route::get('/package', [AdminPackageController::class, 'index'])->name('admin.package.index');
    Route::get('/package/create', [AdminPackageController::class, 'create'])->name('admin.package.create');
    Route::post('/package/store', [AdminPackageController::class, 'store'])->name('admin.package.store');
    Route::get('/package/edit/{id}', [AdminPackageController::class, 'edit'])->name('admin.package.edit');
    Route::post('/package/update/{id}', [AdminPackageController::class, 'update'])->name('admin.package.update');
    Route::get('/package/delete/{id}', [AdminPackageController::class, 'delete'])->name('admin.package.delete');

    // Location
    Route::get('/location', [AdminLocationController::class, 'index'])->name('admin.location.index');
    Route::get('/location/create', [AdminLocationController::class, 'create'])->name('admin.location.create');
    Route::post('/location/store', [AdminLocationController::class, 'store'])->name('admin.location.store');
    Route::get('/location/edit/{id}', [AdminLocationController::class, 'edit'])->name('admin.location.edit');
    Route::post('/location/update/{id}', [AdminLocationController::class, 'update'])->name('admin.location.update');
    Route::get('/location/delete/{id}', [AdminLocationController::class, 'delete'])->name('admin.location.delete');

    // Type
    Route::get('/type', [PropertyTypeController::class, 'index'])->name('admin.type.index');
    Route::get('/type/create', [PropertyTypeController::class, 'create'])->name('admin.type.create');
    Route::post('/type/store', [PropertyTypeController::class, 'store'])->name('admin.type.store');
    Route::get('/type/edit/{id}', [PropertyTypeController::class, 'edit'])->name('admin.type.edit');
    Route::post('/type/update/{id}', [PropertyTypeController::class, 'update'])->name('admin.type.update');
    Route::get('/type/delete/{id}', [PropertyTypeController::class, 'delete'])->name('admin.type.delete');

    // Amenity
    Route::get('/amenity', [AmenityController::class, 'index'])->name('admin.amenity.index');
    Route::get('/amenity/create', [AmenityController::class, 'create'])->name('admin.amenity.create');
    Route::post('/amenity/store', [AmenityController::class, 'store'])->name('admin.amenity.store');
    Route::get('/amenity/edit/{id}', [AmenityController::class, 'edit'])->name('admin.amenity.edit');
    Route::post('/amenity/update/{id}', [AmenityController::class, 'update'])->name('admin.amenity.update');
    Route::get('/amenity/delete/{id}', [AmenityController::class, 'delete'])->name('admin.amenity.delete');
});
