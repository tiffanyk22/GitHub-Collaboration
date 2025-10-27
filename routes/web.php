<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

Route::resource('rooms', RoomController::class);
Route::resource('reservations', ReservationController::class);
