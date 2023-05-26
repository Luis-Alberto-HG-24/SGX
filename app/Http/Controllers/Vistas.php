<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Vistas extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index']);
    }

    public function index(){
        $titulo = "Inicio";
        $items = Estudiante::all();
        return view('inicio', compact('titulo', 'items'));
    }

}