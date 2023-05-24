<?php

use App\Http\Controllers\Vistas;
use Illuminate\Support\Facades\Route;

Route::controller(Vistas::class)->group(function (){
    Route::get('/','login') -> name('vistas-login');
    Route::get('/inicio','inicio') -> name('vista-inicio');
});