<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Vistas;
use Illuminate\Support\Facades\Route;

Route::controller(Vistas::class)->group(function (){
    Route::get('/inicio', 'index')->name('vistas-inicio');
    Route::post('/store', 'registrar')->name('vistas-registro');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('/', 'login')->name('auth-login');
    Route::post('/signIn', 'logear')->name('auth-logear');
    Route::get('/logout', 'logout')->name('auth-logout');
});