<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Vistas;
use App\Http\Controllers\Funciones;
use Illuminate\Support\Facades\Route;

Route::controller(Vistas::class)->group(function (){
    Route::get('/inicio', 'index')->name('vistas-inicio');
    Route::get('/perfil/{id}', 'perfilEstudiante')->name('vistas-perfil-estudiante');
});

Route::controller(Funciones::class)->group(function (){
    Route::post('/registro', 'registrar')->name('funciones-registro');
    Route::post('/store', 'store')->name('funciones-registroAlumno');
    Route::put('/update', 'updateModal')->name('funciones-updateModal');
    Route::delete('/delete', 'destroyModal')->name('funciones-deleteModal');
    Route::delete('/delete/{id}', 'destroy')->name('funciones-delete');
    Route::get('/obtenerDatos/{id}','obtenerDatos')->name('funciones-obtenerDatos');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('/', 'login')->name('auth-login');
    Route::post('/signIn', 'logear')->name('auth-logear');
    Route::get('/logout', 'logout')->name('auth-logout');
});