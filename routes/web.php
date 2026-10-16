<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
});



