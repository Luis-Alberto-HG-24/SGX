<?php

namespace App\Http\Controllers;

use App\Models\Civico;
use App\Models\Cultural;
use App\Models\Deportivo;
use App\Models\Estudiante;
use App\Models\Evento;
use App\Models\Moocs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Break_;

class Vistas extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index']);
    }

    public function index(){
        $titulo = "Inicio";
        $items = Estudiante::all();
        $civicos = Civico::all();
        $culturales = Cultural::all();
        $deportivos = Deportivo::all();
        return view('inicio', compact('titulo', 'items','civicos','culturales','deportivos'));
    }

    public function perfilUsuario(){
        $titulo = "Perfil";
        return view('modules/perfilUsuario', compact('titulo'));
    }

    public function perfilEstudiante($id){
        $moocs = Moocs::all();
        $civico = Civico::find($id);
        $cultural = Cultural::find($id);
        $deportivo = Deportivo::find($id);
        $moocCultural = false;
        $moocCivico = false;
        $moocDeportivo = false;
        

        if ($moocs != "[]") {
           $moocsAlumno = Moocs::where('id_estudiante_fk','=',$id)->get();
           foreach($moocsAlumno as $registro){
                if ($registro->credito == "credito_Civico") {
                    $moocCivico = true;
                   break;
                }  
           }
        }else{
            $moocsAlumno = "";
        }

        if ($civico == "") {
            $porcentajeCivico = 0;
        } else {
            $porcentajeCivico = $civico->total_horas * 5;
        }

        // ------------------------------ Cultural ------------------------

        if ($moocs != "[]") {
            $moocCultural = Moocs::where('id_estudiante_fk','=',$id)->get();
            foreach($moocCultural as $registro){
                 if ($registro->credito == "credito_Cultural") {
                     $moocCultural = true;
                    break;
                 }  
            }
         }else{
            $moocCultural = "";
        }

        if ($cultural == "") {
            $porcentajeCultural = 0;
        } else {
            $porcentajeCultural = $cultural->total_horas * 5;
        }

        //----------------------------- Deportivo --------------------------------
        if ($moocs != "[]") {
            $moocsAlumno = Moocs::where('id_estudiante_fk','=',$id)->get();
            foreach($moocsAlumno as $registro){
                 if ($registro->credito == "credito_Deportivo") {
                        $moocDeportivo = true;
                    break;
                 }  
            }
         }else{
            $moocDeportivo = "";
        }
        

        if ($deportivo == "") {
            $porcentajeDeportivo = 0;
        } else {
            $porcentajeDeportivo = $deportivo->total_horas * 5;
        }
    
        $titulo = "Perfil de estudiante";
        $datos = Estudiante::find($id);
        return view('modules/perfilEstudiante',
                    compact('titulo','datos','civico','porcentajeCivico','moocsAlumno',
                            'moocCivico','cultural','porcentajeCultural','moocCultural',
                            'porcentajeDeportivo','deportivo','moocDeportivo'));
    }

    public function pdf_constancia($id,$evento){
        $titulo = "PDF - Constancia de Liberación Parcial";
        $datos = Estudiante::find($id);
        $evento = Evento::find($evento);
        $anioActual = Carbon::now()->year;
        $fechaActual = Carbon::now()->format('d-m-Y');
        $rutaImagen = public_path('img/logo_itma2.webp');
        $contenidoImagen = file_get_contents($rutaImagen);
        $imagenBase64_1 = base64_encode($contenidoImagen);
        $rutaImagen2 = public_path('img/logo_tecnm.png');
        $contenidoImagen2 = file_get_contents($rutaImagen2);
        $imagenBase64_2 = base64_encode($contenidoImagen2);
        $dompdf = new Dompdf();
        $html = view('pdf_constancia_parcial', compact('titulo', 'imagenBase64_1', 'imagenBase64_2' ,'datos', 'anioActual', 'fechaActual','evento'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        return response($output)->header('Content-Type', 'application/pdf');
    }

    public function pdf_constancia_final($id,$credito){
        $creditoTotal = $credito;
        $titulo = "PDF - Constancia de Liberación Final";
        $datos = Estudiante::find($id);
        // $evento = Evento::find($evento);
        $anioActual = Carbon::now()->year;
        $fechaActual = Carbon::now()->format('d-m-Y');
        $titulo = 'PDF - Constancia de Liberacion Total';
        $rutaImagen = public_path('img/logo_itma2.webp');
        $contenidoImagen = file_get_contents($rutaImagen);
        $imagenBase64_1 = base64_encode($contenidoImagen);
        $rutaImagen2 = public_path('img/logo_tecnm.png');
        $contenidoImagen2 = file_get_contents($rutaImagen2);
        $imagenBase64_2 = base64_encode($contenidoImagen2);
        $dompdf = new Dompdf();
        $html = view('pdf_constancia_total', compact('titulo', 'imagenBase64_1', 'imagenBase64_2', 'datos', 'anioActual', 'fechaActual','creditoTotal'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        return response($output)->header('Content-Type', 'application/pdf');
    }

    public function buscar(Request $request){
        $titulo = "Resultados";
        $termino = $request->input('termino');
        $items = Estudiante::where('nombre_estudiante', 'LIKE', "%$termino%")->orWhere('numero_control', 'LIKE', "%$termino%")->orWhere('abreviatura_carrera', 'LIKE', "%$termino%")->get();
        if ($items == "") {
            $items = "No hay ningun estudiante que coincida con la busqueda";
        }
        return view('inicio', compact('titulo','items'));
    }
}