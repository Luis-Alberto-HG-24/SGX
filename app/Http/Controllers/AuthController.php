<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        $titulo = 'Login';
        if (Auth::check()) {
            return redirect()->route('vistas-inicio');
        }
        return view('login', compact('titulo'));
    }

    public function logear(Request $request)
    {
        $credenciales = $request->only("nombre_usuario", "password");
        if (Auth::attempt($credenciales)) {
            return redirect()->route('vistas-inicio');
        } else {
            return back()->withInput($credenciales);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('auth-login');
    }

}
