<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Civico;
use App\Models\Cultural;
use App\Models\Deportivo;
use App\Models\Estudiante;
use App\Models\Evento;
use App\Models\Evidencia;
use App\Models\Moocs;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
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

    public function registrar(Request $request){
        $items = new User();
        $items->nombre = $request->nombre;
        $items->apellido_paterno = $request->apellido_paterno;
        $items->apellido_materno = $request->apellido_materno;
        $items->nombre_usuario = $request->nombre_usuario;
        $items->email = $request->email;
        $items->password = Hash::make($request->password);
        if ($items->save()) {
            alert()->success('Usuario registrado correctamente.');
            return redirect()->route('auth-login');
        }else{
            alert()->error('Usuario no registrado.');
            return redirect()->route('auth-login');
        }
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
    public function store(Request $request){
        $item = new Estudiante();
        $item->nombre_estudiante = $request->nombre_estudiante;
        $item->apellidoPaterno_estudiante = $request->apellidoPaterno_estudiante;
        $item->apellidoMaterno_estudiante = $request->apellidoMaterno_estudiante;
        $item->fecha_nacimiento = $request->fecha_nacimiento;
        $item->telefono_celular = $request->telefono_celular;
        $item->numero_control = $request->numero_control;
        $item->semestre = $request->semestre;
        $item->carrera = $request->carrera;
        $item->abreviatura_carrera = $request->abreviatura_carrera;
        $item->periodo = $request->periodo;
        $item->escuela_procedencia = $request->escuela_procedencia;
        $item->fecha_registro = $request->fecha_registro;
        $item->ubicacion = $request->ubicacion;
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
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateModal(Request $request){
        $id = $request->id_estudiante;
        $tipo = $request->tipo;
        $item = Estudiante::find($id);
        $item->nombre_estudiante = $request->nombre_estudiante;
        $item->apellidoPaterno_estudiante = $request->apellidoPaterno_estudiante;
        $item->apellidoMaterno_estudiante = $request->apellidoMaterno_estudiante;
        $item->fecha_nacimiento = $request->fecha_nacimiento;
        $item->telefono_celular = $request->telefono_celular;
        $item->numero_control = $request->numero_control;
        $item->semestre = $request->semestre;
        $item->carrera = $request->carrera;
        $item->abreviatura_carrera = $request->abreviatura_carrera;
        $item->periodo = $request->periodo;
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

    public function destroyModal(Request $request){   
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


    public function obtenerMooc($tipo,$id){
        $credito = "credito_".$tipo;
        $datos = DB::table('moocs')->where('credito', '=', $credito)->Where('id_estudiante_fk',$id)->get();
        return response()->json($datos);
    }

    public function agregarMooc(Request $request){
        $moocbd = new Moocs();
        $id = $request->id_estudiante;
        $credito = "credito_".$request->tipo_mooc;

        if ($request->hasFile('btn_mooc')) {

            $mooc = $request->file('btn_mooc');

            $extension = $mooc->guessClientExtension();

            $nombre = "Mooc"."_".$id.".".$extension;

            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $ruta = storage_path("app/public/Moocs/img");
            } else if($extension == "pdf"){
                $ruta = storage_path("app/public/Moocs/pdf");
            }else{
                $ruta = storage_path("app/public/Moocs/doc");
            }

            if ( $mooc->move($ruta,$nombre)) {
                
                $moocbd->ruta = $ruta."/".$nombre;
                $moocbd->nombre = $nombre;
                $moocbd->id_estudiante_fk = $id;
                $moocbd->credito = $credito;

               if ( $moocbd->save()) {
                    alert()->success('Exito','Se ha logrado subir la evidencia');
                    return redirect()->route('vistas-perfil-estudiante',$id);
               } else {
                    alert()->error('Error','No se ha logrado subir la evidencia');
                    return redirect()->route('vistas-perfil-estudiante',$id);
               }
               
               
            } else {
                alert()->error('Error','No se ha logrado subir la evidencia');
                return redirect()->route('vistas-perfil-estudiante',$id);
            }
        
        
        } else {
            alert()->error('Error','No se selecciono la evidencia');
            return redirect()->route('vistas-perfil-estudiante',$id);
        }
    }

    public function eliminarMooc(Request $request){
        $id = $request->id_mooc_eliminar;
        $id_estudiante = $request->id_estudiante;
        $mooc = Moocs::find($id);
        $ruta = $mooc->ruta;

        if ($mooc->delete()) {
            unlink($ruta);
            alert()->success('Exito','Se elimino el Mooc con exito');
            return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
        } else {
            alert()->error('Error','No se logro eliminar el Mooc');
            return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
        }
        
    }

    public function agregarEvento(Request $request,$id_estudiante){
        $evento = new Evento();
        $evidencia = new Evidencia();

        switch ($request->tipo_credito_evento) {
            case 'Civico':
                $credito = new Civico();
                $comodin = Civico::where('id_estudiante_fk', $id_estudiante)->count();
                break;
        
            case 'Cultural':
                $credito = new Cultural();
                $comodin = Cultural::where('id_estudiante_fk', $id_estudiante)->count();
                break;

            default:
                $credito = new Deportivo();
                $comodin = Deportivo::where('id_estudiante_fk', $id_estudiante)->count();
                break;
        }
        


        if ($request->hasFile('btn_archivo')) {
            $archivo = $request->file('btn_archivo');
            $extension = $archivo->guessClientExtension();

            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $ruta = storage_path("app/public/Credito".$request->tipo_credito_evento."/img");
            } else if($extension == "pdf"){
                $ruta = storage_path("app/public/Credito".$request->tipo_credito_evento."/pdf");
            }else if($extension == "doc" || $extension == "docx"){
                $ruta = storage_path("app/public/Credito".$request->tipo_credito_evento."/doc");
            }else{
                $ruta = storage_path("app/public/Credito".$request->tipo_credito_evento."/video");
            }
            $nombre = "evidencia_"."_".$archivo->getClientOriginalName();
            $evento->nombre_evento = $request->nombre_evento;
            $evento->horas = $request->horas;
            $evento->credito = $request->tipo_credito_evento;
            $evento->fecha_evento = $request->fecha_evento;
            $evento->id_estudiante_fk = $id_estudiante;
                   
           if ( $evento->save()) {
                $evidencia->nombre_evidencia = $nombre;
                $evidencia->ruta_evidencia = $ruta;
                $evidencia->extension = $extension;
                $id = Evento::latest()->first();
                $evidencia->id_evento_fk = $id->id_evento;

                if ($evidencia->save()) {

                    if($comodin>0){
                        switch ($request->tipo_credito_evento) {
                            case 'Civico':
                                $actualizaCredito = Civico::where('id_estudiante_fk', $id_estudiante)->get();
                                $id_actualizar =  json_encode($actualizaCredito[0]->id_creditoCivico);
                                $creditoActualizar = Civico::find($id_actualizar);
                                break;
                        
                            case 'Cultural':
                                $actualizaCredito = Cultural::where('id_estudiante_fk', $id_estudiante)->get();
                                $id_actualizar =  json_encode($actualizaCredito[0]->id_creditoDeportivo);
                                $creditoActualizar = Cultural::find($id_actualizar);
                                break;
                
                            default:
                                $actualizaCredito = Deportivo::where('id_estudiante_fk', $id_estudiante)->get();
                                $id_actualizar =  json_encode($actualizaCredito[0]->id_creditoDeportivo);
                                $creditoActualizar = Deportivo::find($id_actualizar);
                                break;
                        }
            
                        $resultado =  ($creditoActualizar->total_horas + $request->horas);
            
                        if ($resultado == 20) {
                            $creditoActualizar->estado = "Liberado";
                            $creditoActualizar->total_horas = $resultado;
                        } else if($resultado >20){
                            $creditoActualizar->estado = "Liberado";
                            $creditoActualizar->total_horas = 20;
                        }else{
                            $creditoActualizar->total_horas = $resultado;
                        }   
                        $creditoActualizar->save();
                    }else{
                         $credito->estado = "En tramite";
                         $credito->ubicacion_fisica = "nose";
                         $credito->fecha_registro = $request->fecha_evento;
                         $credito->total_horas = $request->horas;
                         $credito->id_estudiante_fk = $id_estudiante;
                         $credito->save();
                     }
                    if ($archivo->move($ruta,$nombre)) {
                        alert()->success('Exito','Se guardo el evento y su evidencia exitosamente');
                        return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
                    } else {
                        alert()->error('Error','No se guardar el evento');
                        return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
                    }
                } else {
                    alert()->error('Error','No se guardar el evento');
                    return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
                }
           } else {
                alert()->error('Error','No se guardar el evento');
                return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
           }

        
        } else {
            alert()->error('Error','No se selecciono la imagen');
            return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
        }


    }

    public function obtenerEvidencia($tipo,$id){
        $evento = DB::table('evento')
                    ->join('evidencia','id_evento','=','id_evento_fk')
                    ->select('id_evento','id_evidencia','horas','nombre_evento','nombre_evidencia','fecha_evento','id_estudiante_fk','credito')
                    ->where('id_estudiante_fk','=', $id)
                    ->where('credito', '=', $tipo)
                    ->get()
        ;

        return response()->json($evento);
    }

    public function obtenerEvento($id){

        $evento = DB::table('evento')
                    ->join('evidencia','id_evento','=','id_evento_fk')
                    ->select('id_evento','id_evidencia','horas','nombre_evento','nombre_evidencia','fecha_evento','credito')
                    ->where('id_evento','=', $id)
                    ->get()
        ;

        return response()->json($evento);
    }

    public function editarEvento(Request $request){
        $id_estudiante = $request->id_estudiante;
        $credito = $request->credito;
        $horasNuevas = $request->horas_act;
        $evento = Evento::find($request->id_evento);
        $horasViejas = $evento->horas;
        $evento->nombre_evento = $request->nombre_evento_act;
        $evento->horas = $horasNuevas;
        $evento->fecha_evento = $request->fecha_evento_act;

        if ($evento->save()) {

            switch ($credito) {
                case 'Civico':
                    $comodin = Civico::where('id_estudiante_fk',$id_estudiante)->get();
                    $tablaCredito = Civico::find($comodin[0]->id_creditoCivico);
                    break;

                case 'Cultural':
                    $comodin = Cultural::where('id_estudiante_fk',$id_estudiante)->get();
                    $tablaCredito = Cultural::find($comodin[0]->id_creditoCultural);
                    break;
                
                default:
                    $comodin = Deportivo::where('id_estudiante_fk',$id_estudiante)->get();
                    $tablaCredito = Deportivo::find($comodin[0]->id_creditoDeportivo);
                    break;
            }

            if ($horasNuevas > $horasViejas) {
                if ($horasNuevas > 20) {
                    $tablaCredito->total_horas = 20;
                    $tablaCredito->estado = 'Liberado';
                    $tablaCredito->save();
                } else {
                    $resultado = $horasNuevas - $horasViejas;
                    $tablaCredito->total_horas = $tablaCredito->total_horas + $resultado;
                    $tablaCredito->save();
                }
            } else if( $horasNuevas < $horasViejas) {
                $resultado = $horasViejas - $horasNuevas;
                $tablaCredito->total_horas = $tablaCredito->total_horas - $resultado;
                $tablaCredito->save();
            }

            if ($request->hasFile('btn_archivo_act')) {

                $archivo = $request->file('btn_archivo_act');
                $extension = $archivo->guessClientExtension();
                $evidencia = Evidencia::find($request->id_evidencia);
                unlink($evidencia->ruta_evidencia."/".$evidencia->nombre_evidencia);
                $nombre = "evidencia_".$archivo->getClientOriginalName();
                $evidencia->nombre_evidencia = $nombre;
                $evidencia->extension = $extension;
                $evidencia->save();
                
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
                    $ruta = storage_path('app/public/credito'.$credito."/img");
                } else if($extension == 'pdf'){
                    $ruta = storage_path('app/public/credito'.$credito."/pdf");
                }else if($extension == 'doc' || $extension == 'docx'){
                    $ruta = storage_path('app/public/credito'.$credito."/doc");
                }else{
                    $ruta = storage_path('app/public/credito'.$credito."/video");
                }
                

                $archivo->move($ruta,$nombre);

                alert()->success('Exito','Se actualizo el evento con exito');
                return redirect()->route('vistas-perfil-estudiante',$request->id_estudiante);
            } else {    
                alert()->success('Exito','Se actualizo el evento con exito');
                return redirect()->route('vistas-perfil-estudiante',$request->id_estudiante);
            }
        } else {
            alert()->error('Error','No se logro actualizar el evento');
            return redirect()->route('vistas-perfil-estudiante',$request->id_estudiante);
        }
    
    }

    public function eliminarEvento(Request $request, $id_estudiante){       

        $evento = Evento::find($request->id_evento_eliminar);
        $evidencia = Evidencia::find($request->id_evidencia_eliminar);
        $rutaEvidencia = $evidencia->ruta_evidencia."/".$evidencia->nombre_evidencia;
        $horas = $evento->horas;
        
        if ($evidencia->delete()) {
            if ($evento->delete()) {
                if (unlink($rutaEvidencia)) {
                    switch ($request->tipo_credito_eliminar) {
                        case 'Civico':
                            $comodin = Civico::where('id_estudiante_fk', $id_estudiante)->get();
                            $credito = Civico::find($comodin[0]->id_creditoCivico);
                            break;
                    
                        case 'Cultural':
                            $comodin = Cultural::where('id_estudiante_fk', $id_estudiante)->get();
                            $credito = Cultural::find($comodin[0]->id_creditoCultural);
                            break;
            
                        default:
                            $comodin = Deportivo::where('id_estudiante_fk', $id_estudiante)->get();
                            $credito = Deportivo::find($comodin[0]->id_creditoDeportivo);
                            break;
                    }
                    if ($credito->total_horas >= $horas) {
                        $resultado = $credito->total_horas - $horas;
                        $credito->estado = $resultado == 0 ?  'Sin iniciar': 'En tramite';
                        $credito->total_horas = $resultado;
                        $credito->save();
                    } else {
                        $credito->total_horas = 0;
                        $credito->estado = "Sin iniciar";
                        $credito->save();
                    }
                    alert()->success('Exito','Se borro de manera exitosa el evento');
                    return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
                } else {
                    alert()->error('Error','No se logro borrar la evidencia mas sin encambio ya fue borrado el evento');
                    return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
                }
                
            } else {
                alert()->error('Error','No se logro borrar el evento mas sin encambio ya fue borrado el registro de evidencia');
                return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
            }
            
        } else {
            alert()->error('Error','No se logro borrar el evento');
            return redirect()->route('vistas-perfil-estudiante',$id_estudiante);
        }
        
    }

    public function vistaPrevia($id,$credito){
        $evidencia = Evidencia::find($id);

        if ($evidencia->extension == 'jpg' || $evidencia->extension == 'jpeg' || $evidencia->extension == 'png') {
            if ($credito == 'Civico') {
                $ruta = '../storage/Creditocivico/img/'.$evidencia->nombre_evidencia;
            } else if($credito == 'Cultural'){
                $ruta = '../storage/Creditocultural/img/'.$evidencia->nombre_evidencia;
            }else{
                $ruta = '../storage/Creditodeportivo/img/'.$evidencia->nombre_evidencia;
            }

        } else if($evidencia->extension == 'pdf'){
            if ($credito == 'Civico') {
                $ruta = '../storage/Creditocivico/pdf/'.$evidencia->nombre_evidencia;
            } else if($credito == 'Cultural'){
                $ruta = '../storage/Creditocultural/pdf/'.$evidencia->nombre_evidencia;
            }else{
                $ruta = '../storage/Creditodeportivo/pdf/'.$evidencia->nombre_evidencia;
            }
        }

        return response()->json(['ruta'=> $ruta, 'extension'=> $evidencia->extension]);
    }

}