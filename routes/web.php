<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Public Portfolio
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->middleware('track.visitor')
    ->name('home');

Route::post('/contact', [MessageController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Posts
    |--------------------------------------------------------------------------
    */

    Route::resource('posts', PostController::class);


    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    Route::get('/messages', [
        MessageController::class,
        'index'
    ])->name('messages.index');

    Route::patch('/messages/{message}/read', [
        MessageController::class,
        'markAsRead'
    ])->name('messages.read');

    Route::delete('/messages/{message}', [
        MessageController::class,
        'destroy'
    ])->name('messages.destroy');


    /*
    |--------------------------------------------------------------------------
    | Visitors
    |--------------------------------------------------------------------------
    */

    Route::get('/visitors', [
        VisitorController::class,
        'index'
    ])->name('visitors.index');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');

});


require __DIR__.'/auth.php';
