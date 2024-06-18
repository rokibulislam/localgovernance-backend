<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Route::group([ 'prefix' => 'auth' ], function ($router) {
//     Route::post('login', [ AuthController::class, 'login' ] );
//     Route::post('register', [ AuthController::class, 'register' ] );
// });


// Route::middleware([ 'auth:api' ])->group( function ($router) {
//     Route::get('me',  [ AuthController::class, 'me' ]  );
//     Route::post('logout', [ AuthController::class, 'logout' ] );
//     Route::post('refresh', [ AuthController::class, 'refresh' ] );
// });

// Route::Resource('events', EventController::class);
// Route::Resource('bookings', BookingController::class);
// Route::Resource('tickets', TicketController::class);

// Route::Resource('event-category', EventTypeController::class);
// Route::Resource('event-types', EventCategoryController::class);
