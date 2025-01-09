<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 
| 
| 
|
*/

// Home Route
Route::get('/', [UserController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

    // Payment Routes
    Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment');
    Route::post('/payment/submit', [PaymentController::class, 'submitPayment'])->name('payment.submit');

    // Friends Routes
    Route::post('/friends/add/{id}', [FriendController::class, 'addFriend'])->name('friends.add');
    Route::post('/friends/remove/{id}', [FriendController::class, 'removeFriend'])->name('friends.remove');

    // Messaging/Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
});

// Search and Filtering
Route::get('/search', [UserController::class, 'search'])->name('search');