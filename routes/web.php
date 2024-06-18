<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;



Route::get('/', [ HomeController::class, 'index' ] );
Route::get('/about', [ HomeController::class, 'about' ] );
Route::get('/contact', [ HomeController::class, 'contact' ] );
Route::get('/events', [ HomeController::class, 'events' ] );
Route::get('/events/{id}', [ HomeController::class, 'singleevent' ] )->name('events.details');
Route::get('/checkout', [ HomeController::class, 'checkout' ] );
Route::get('/payment', [ HomeController::class, 'payment' ] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group([ 'prefix' => 'dashboard' ], function ($router) {
    
    Route::resource('events', EventController::class);
    Route::resource('eventTypes', EventTypeController::class);
    Route::resource('eventCategories', EventCategoryController::class);
    Route::resource('bookings', BookingController::class);

    Route::post('/events/{id}/tickets', [EventController::class, 'addTicket'])->name('events.addTicket');
    Route::post('/events/{id}/purchase', [EventController::class, 'purchase'])->name('events.purchase');

})->middleware(['auth', 'verified']);