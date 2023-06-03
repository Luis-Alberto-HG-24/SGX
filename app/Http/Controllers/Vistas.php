<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Carbon\Carbon;

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

    public function perfilEstudiante($id){
        $titulo = "Perfil de estudiante";
        $datos = Estudiante::find($id);
        return view('modules/perfilEstudiante',compact('titulo','datos'));
    }

    public function pdf_constancia($id)
    {
        $titulo = "PDF - Constancia de Liberación Parcial";
        $datos = Estudiante::find($id);
        $anioActual = Carbon::now()->year;
        $fechaActual = Carbon::now()->format('d-m-Y');
        $rutaImagen = public_path('img/logo_itma2.webp');
        $contenidoImagen = file_get_contents($rutaImagen);
        $imagenBase64_1 = base64_encode($contenidoImagen);
        $rutaImagen2 = public_path('img/logo_tecnm.png');
        $contenidoImagen2 = file_get_contents($rutaImagen2);
        $imagenBase64_2 = base64_encode($contenidoImagen2);
        $dompdf = new Dompdf();
        $html = view('pdf_constancia_parcial', compact('titulo', 'imagenBase64_1', 'imagenBase64_2' ,'datos', 'anioActual', 'fechaActual'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        return response($output)->header('Content-Type', 'application/pdf');
    }

    public function pdf_constancia_final($id)
    {
        $titulo = "PDF - Constancia de Liberación Final";
        $datos = Estudiante::find($id);
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
        $html = view('pdf_constancia_total', compact('titulo', 'imagenBase64_1', 'imagenBase64_2', 'datos', 'anioActual', 'fechaActual'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        return response($output)->header('Content-Type', 'application/pdf');
    }

    public function buscar(Request $request)
    {
        $titulo = "Resultados";
        $termino = $request->input('termino');
        $items = Estudiante::where('nombre_estudiante', 'LIKE', "%$termino%")->orWhere('numero_control', 'LIKE', "%$termino%")->orWhere('abreviatura_carrera', 'LIKE', "%$termino%")->get();
        return view('inicio', compact('titulo','items'));
    }
}