<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        $titulo = 'Login';
        $navbar = false;
        if (Auth::check()) {
            return redirect()->route('vistas-inicio');
        }
        return view('auth/login', compact('titulo','navbar'));
    }

    public function logear(Request $request)
    {
        $credenciales = $request->only("nombre_usuario", "password");
        
        $reglas = ['nombre_usuario' => 'required', 'password' => 'required'];
        $mensajes = [
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.'
        ];

        $validador = Validator::make($credenciales, $reglas, $mensajes);

        if ($validador->fails()) {
            return back()->withErrors($validador)->withInput($credenciales);
        }

        if (Auth::attempt($credenciales)) {
            alert()->success('Credenciales correctas');
            return redirect()->route('vistas-inicio');
        } else {
            alert()->error('Usuario y Contraseña incorrectos');
            return back()->withInput($credenciales)->withErrors(['login' => 'Usuario o contraseña incorrectos.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        alert()->success('Exito','Se ha cerrado la sesión éxito');
        return redirect()->route('auth-login');
    }

}
