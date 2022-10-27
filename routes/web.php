<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UsersController::class, 'profile'])->name('profile');
    Route::view('/notifications', 'notifications.index')->name('notifications');

    Route::controller(FriendsController::class)->group( function () {
        Route::get('/friends', 'index')->name('friends');
        Route::get('/friend-requests', 'friendRequestNotifications')->name('friendRequestNotifications');
        Route::post('/send-friend-request', [FriendsController::class, 'sendFriendRequest'])->name('SendfriendRequest');
        Route::post('/accept-friend-request', [FriendsController::class, 'acceptFriendRequest'])->name('acceptFriendRequest');
        Route::post('/reject-friend-request', [FriendsController::class, 'rejectFriendRequest'])->name('rejectFriendRequest');
    });

});

Route::view('/', 'welcome');
Route::get('/users', [UsersController::class, 'index'])->name('people');
