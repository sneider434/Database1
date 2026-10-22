<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\RegistrationsController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


/*
Route::get('/about', function () {
    return 'Acerca de nosotros';
});

Route::get('/user/{id}', function ($id) {
    return 'ID de usuario: ' . $id;
})->where('id', '[0-9]{3}');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return 'Panel de administración';
    });
    Route::get('/users', function () {
        return 'Lista de usuarios';
    });
});*/

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('attendees',AttendeeController::class);
    Route::resource('events',EventsController::class);
    Route::resource('registrations',RegistrationsController::class);


});



