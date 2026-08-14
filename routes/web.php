<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReservationController::class, 'create'])->name('reservations.create');

Route::post('/reservations', [ReservationController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('reservations.store');

require __DIR__.'/auth.php';
