<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class Vistas extends Controller
{
    public function login(){
        $titulo = 'Login';
        return view('login',compact('titulo'));
    }

    public function inicio(){
        $titulo = 'Inicio';
        return view('inicio',compact('titulo'));
    }
}
