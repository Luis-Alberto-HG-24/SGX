<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Funciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Estudiante();
        $item->nombre_estudiante = $request->nombre_estudiante;
        $item->apellidoPaterno_estudiante = $request->apellidoPaterno_estudiante;
        $item->apellidoMaterno_estudiante = $request->apellidoMaterno_estudiante;
        $item->numero_control = $request->numero_control;
        $item->telefono_celular = $request->telefono_celular;
        $item->carrera = $request->carrera;
        $item->fecha_nacimiento = $request->fecha_nacimiento;
        $item->escuela_procedencia = $request->escuela_procedencia;
        $item->fecha_registro = $request->fecha_registro;
        if ($item->save()) {
            alert()->success('Exito', 'Los datos se han registrado exitosamente.');
            return redirect()->route('vistas-inicio');
        } else {
            alert()->error('Error', 'Los datos no se han registrado.');
            return redirect()->route('vistas-inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateModal(Request $request)
    {
        $id = $request->id_estudiante;
        $tipo = $request->tipo;
        $item = Estudiante::find($id);
        $item->nombre_estudiante = $request->nombre_estudiante;
        $item->apellidoPaterno_estudiante = $request->apellidoPaterno_estudiante;
        $item->apellidoMaterno_estudiante = $request->apellidoMaterno_estudiante;
        $item->numero_control = $request->numero_control;
        $item->telefono_celular = $request->telefono_celular;
        $item->carrera = $request->carrera;
        $item->fecha_nacimiento = $request->fecha_nacimiento;
        $item->escuela_procedencia = $request->escuela_procedencia;
        $item->fecha_registro = $request->fecha_registro;
        if ($item->save()) {
            if ($tipo == "perfil") {
                Alert::success('Exito', 'Los datos se han actualizado exitosamente.');
                return redirect()->route('vistas-perfil-estudiante',$item->id_estudiante);
            }
            Alert::success('Exito', 'Los datos se han actualizado exitosamente.');
            return redirect()->route('vistas-inicio');
        } else {
            alert()->error('Error', 'Los datos no se han actualizado.');
            return redirect()->route('vistas-inicio');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroyModal(Request $request)
    {   
        $id = $request->id_estudiante_eliminar;
        $item = Estudiante::find($id);
        if ($item->delete()) {
            Alert::success('Exito', 'Los datos se han eliminado exitosamente.');
            return redirect() -> route('vistas-inicio');
        } else {
            alert()->error('Error', 'Los datos no se han eliminado.');
            return redirect('/delete');
        }
    }

    public function obtenerDatos($id){
        $datos = Estudiante::find($id);
        return response()->json($datos);
    }
}


