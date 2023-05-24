<?php

namespace App\Http\Controllers;

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
        return view('inicio', compact('titulo'));
    }

    public function registrar(Request $request)
    {
        $items = new User();
        $items->nombre = $request->nombre;
        $items->apellido_paterno = $request->apellido_paterno;
        $items->apellido_materno = $request->apellido_materno;
        $items->nombre_usuario = $request->nombre_usuario;
        $items->email = $request->email;
        $items->password = Hash::make($request->password);
        $items->save();
        return redirect()->route('auth-login');
    }

}