<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Vistas;
use App\Http\Controllers\Funciones;
use Illuminate\Support\Facades\Route;

Route::controller(Vistas::class)->group(function (){
    Route::get('/inicio', 'index')->name('vistas-inicio');
    Route::get('/perfil/{id}', 'perfilEstudiante')->name('vistas-perfil-estudiante');
    Route::get('/pdf_constancia/{id}/{evento}', 'pdf_constancia')->name('vistas-constancia-liberacion');
    Route::get('/pdf_constancia_final/{id}/{credito}', 'pdf_constancia_final')->name('vistas_constancia_total');
    Route::get('/buscar', 'buscar')->name('vistas-buscar');
    Route::get('/Perfil_usuario', 'perfilUsuario')->name('vistas-perfilUsuario');
});

Route::controller(Funciones::class)->group(function (){
    Route::post('/registro', 'registrar')->name('funciones-registro');
    Route::post('/store', 'store')->name('funciones-registroAlumno');
    Route::put('/update', 'updateModal')->name('funciones-updateModal');
    Route::delete('/delete', 'destroyModal')->name('funciones-deleteModal');
    Route::delete('/delete/{id}', 'destroy')->name('funciones-delete');
    Route::get('/obtenerDatos/{id}','obtenerDatos')->name('funciones-obtenerDatos');
    Route::get('/obtenerMooc/{tipo}/{id}','obtenerMooc')->name('funciones-obtenerMooc');
    Route::post('/agregarMooc','agregarMooc')->name('funciones-agregarMooc');
    Route::delete('/borrarMooc','eliminarMooc')->name('funciones-eliminarMooc');
    Route::post('/agregarEvento/{id}', 'agregarEvento')->name('funciones-agregarEvento')->middleware('web');
    Route::get('/obtenerEvidencia/{tipo}/{id}','obtenerEvidencia')->name('funciones-obtenerEvidencia');
    Route::get('/obtenerEvento/{id}','obtenerEvento')->name('funciones-obtenerEvento');
    Route::post('/editarEvento','editarEvento')->name('funciones-editarEvento');
    Route::delete('/eliminarEvento/{estudiante}','eliminarEvento')->name('funciones-eliminarEvento');
    Route::get('/vistaPrevia/{id}/{credito}', 'vistaPrevia')->name('funciones-vistaPrevia');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('/', 'login')->name('auth-login');
    Route::post('/logear', 'logear')->name('auth-logear');
    Route::get('/logout', 'logout')->name('auth-logout');
});