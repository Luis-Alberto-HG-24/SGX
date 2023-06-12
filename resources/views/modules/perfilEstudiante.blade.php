@extends('layouts/main')
@section('contenido')

<body>
    <header class="masthead sticky-top">
        <div class="container">
        </div>
    </header>
     {{-- SECCION DATOS ALUMNOS --}}
    <div class="container p-5 ">
        <div class="row">
            <div class="col text-muted fw-light fs-5">
                Datos del alumno
            </div>
            <div class="col text-end">
                <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#modalActualizar"><i class="fa-solid fa-pen text-muted"></i></button>
                <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#modalEliminar"><i class="fa-solid fa-trash-can text-muted"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{asset('img/usuarioDefecto.png')}}" alt="" class="img-estudiante-perfil">
            </div>
        </div>
        <div class="row justify-content-center my-3 fw-lighter text-center" id="seccion_datos_estudiante">
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">  Numero de control</div>
                <div class="text-muted fs-5"> {{$datos->numero_control}}</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4"> Nombre</div>
                <div class="text-muted fs-5">
                    {{$datos->nombre_estudiante}}
                    {{$datos->apellidoPaterno_estudiante}}
                    {{$datos->apellidoMaterno_estudiante}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Fecha de Nacimiento</div>
                <div class="text-muted fs-5">{{$datos->fecha_nacimiento}}</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Teléfono Celular</div>
                <div class="text-muted fs-5">{{$datos->telefono_celular}}</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Número de Control</div>
                <div class="text-muted fs-5"> {{$datos->numero_control}}</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Semestre</div>
                <div class="text-muted fs-5">{{$datos->semestre}}°</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Carrera</div>
                <div class="text-muted fs-5">{{$datos->carrera}}</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Periodo</div>
                <div class="text-muted fs-5">{{$datos->periodo}}</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Escuela de Procedencia</div>
                <div class="text-muted fs-5">{{$datos->escuela_procedencia}}</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Fecha de Registro</div>
                <div class="text-muted fs-5">{{$datos->fecha_registro}}</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                <div class="fs-4">Ubicación</div>
                <div class="text-muted fs-5">{{$datos->ubicacion}}</div>
            </div>
        </div>
        <hr class="text-muted">
        <div class="row my-5">
            <div class="col">
                <div class="fs-3 text- fw-lighter">Creditos</div>
            </div>
        </div>
        {{-- SECCION CREDITO CIVICO --}}
        <div class="row my-5">
                <div class="col-12 col-lg-6 mt-lg-5 shadow card-alumno border-0 border-left-success">
                    <div class="container mt-xxl-5 mt-xl5 mt-lg-5 mt-md-5 mt-sm-5 mt-3">
                        <div class="row">
                            <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6  fs-3 fw-lighter">
                                Credito Civico
                            </div>
                            <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 fs-5 fw-lighter text-xxl-end">
                                @if ($civico == "")
                                    0 / Horas
                                @else
                                    {{$civico->total_horas}} / 20  Horas
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            @if ($civico == "")
                            <div class="col text-muted fw-light fs-5">
                               Sin iniciar
                            </div>
                            @else
                            <div class="col text-success fw-light fs-5">
                                {{$civico->estado}}
                            </div>
                            @endif
                            <div class="col fw-light fs-5 text-muted text-xxl-end">
                                <i class="fa-regular fa-folder me-2"></i>
                                Guardado en {{$datos->ubicacion}}
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <div class="progress mb-3">
                                    @if ($civico == "")
                                        <div style="width: 0%;" class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"><div class="text-dark">0/20</div></div>
                                    @else
                                        <div style="width:{{$porcentajeCivico}}%;" class="progress-bar progress-bar-striped progress-bar-animated bg-verde" role="progressbar" aria-label="Basic example" aria-valuenow="{{$civico->total_horas}}" aria-valuemin="0" aria-valuemax="100">{{$porcentajeCivico}}%</div> 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-5">
                    <div class="container mt-lg-5">
                        <div class="row">
                            <div class="col p-3 text-end">
                                @if ($civico != ""  && $moocCivico != "")
                                    @if ($civico->total_horas == 20 && $moocCivico)
                                    <a href="{{route('vistas_constancia_total',["id" => $datos->id_estudiante, "credito" => 'civico'])}}" type="button" class="btn bg-verde mt-5 me-2">Constancia</a>   
                                    @else
                                    <button tu class="btn bg-gris mt-5 me-2 disabled">Constancia</button>
                                    @endif
                                @else
                                <button tu class="btn bg-gris mt-5 me-2 disabled">Constancia</button>
                                @endif
                                <button onclick="agregarMooc('Civico',{{$datos->id_estudiante}})" data-bs-toggle="modal" data-bs-target="#modalMooc" type="button" class="btn bg-azul mt-5 me-2">MOOC</button>
                                <button onclick="agregarEvidencia('Civico',{{$datos->id_estudiante}})" data-bs-toggle="modal" data-bs-target="#modalEvidenciaCivico" type="button" class="btn bg-azul2 mt-5">Evidencias</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div> 
        <hr>
        {{-- SECCION CREDITO CULTURAL --}}
        <div class="row my-5">
            <div class="col-lg-6 mt-lg-5 shadow card-alumno border-0 border-left-primary">
                <div class="container mt-lg-5">
                    <div class="row">
                        <div class="col fs-3 fw-lighter">
                            Credito Cultural
                        </div>
                        <div class="col fs-5 fw-lighter text-end">
                            @if ($cultural == "")
                                0 / Horas
                            @else
                                {{$cultural->total_horas}} / 20  Horas
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        @if ($cultural == "")
                        <div class="col text-muted fw-light fs-5">
                           Sin iniciar
                        </div>
                        @else
                        <div class="col text-primary fw-light fs-5">
                            {{$cultural->estado}}
                        </div>
                        @endif
                        <div class="col fw-light fs-5 text-muted text-xxl-end">
                            <i class="fa-regular fa-folder me-2"></i>
                            Guardado en {{$datos->ubicacion}}
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <div class="progress mb-3">
                                @if ($cultural == "")
                                    <div style="width: 0%;" class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"><div class="text-dark">0/20</div></div>
                                @else
                                    <div style="width:{{$porcentajeCultural}}%;" class="progress-bar progress-bar-striped progress-bar-animated bg-azul2" role="progressbar" aria-label="Basic example" aria-valuenow="{{$cultural->total_horas}}" aria-valuemin="0" aria-valuemax="100">{{$porcentajeCultural}}%</div> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-5">
                <div class="container mt-lg-5">
                    <div class="row">
                        <div class="col p-3 text-end">
                            @if ($cultural != ""  && $moocCultural != "")
                                @if ($cultural->total_horas == 20 && $moocCultural)
                                <a href="{{route('vistas_constancia_total',["id" => $datos->id_estudiante, "credito" => 'civico'])}}" type="button" class="btn bg-verde mt-5 me-2">Constancia</a>   
                                @else
                                <button tu class="btn bg-gris mt-5 me-2 disabled">Constancia</button>
                                @endif
                            @else
                            <button tu class="btn bg-gris mt-5 me-2 disabled">Constancia</button>
                            @endif
                            <button onclick="agregarMooc('Cultural',{{$datos->id_estudiante}})" data-bs-toggle="modal" data-bs-target="#modalMooc" type="button" class="btn bg-azul mt-5 me-2">MOOC</button>
                            <button onclick="agregarEvidencia('Cultural',{{$datos->id_estudiante}})" data-bs-toggle="modal" data-bs-target="#modalEvidenciaCivico" type="button" class="btn bg-azul2 mt-5">Evidencias</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
         {{-- SECCION CREDITO DEPORTIVO --}}
         <div class="row my-5">
            <div class="col-lg-6 mt-lg-5 shadow card-alumno border-0 border-left-danger">
                <div class="container mt-lg-5">
                    <div class="row">
                        <div class="col fs-3 fw-lighter">
                            Credito Deportivo
                        </div>
                        <div class="col fs-5 fw-lighter text-end">
                            @if ($deportivo == "")
                                0 / Horas
                            @else
                                {{$deportivo->total_horas}} / 20  Horas
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        @if ($deportivo == "")
                        <div class="col text-muted fw-light fs-5">
                           Sin iniciar
                        </div>
                        @else
                        <div class="col text-danger fw-light fs-5">
                            {{$deportivo->estado}}
                        </div>
                        @endif
                        <div class="col fw-light fs-5 text-muted text-xxl-end">
                            <i class="fa-regular fa-folder me-2"></i>
                            Guardado en {{$datos->ubicacion}}
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <div class="progress mb-3">
                                @if ($deportivo == "")
                                    <div style="width: 0%;" class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"><div class="text-dark">0/20</div></div>
                                @else
                                    <div style="width:{{$porcentajeDeportivo}}%;" class="progress-bar progress-bar-striped progress-bar-animated bg-rojo" role="progressbar" aria-label="Basic example" aria-valuenow="{{$deportivo->total_horas}}" aria-valuemin="0" aria-valuemax="100">{{$porcentajeDeportivo}}%</div> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-5">
                <div class="container mt-lg-5">
                    <div class="row">
                        <div class="col p-3 text-end">
                            @if ($deportivo != ""  && $moocDeportivo != "")
                                @if ($deportivo->total_horas == 20 && $moocDeportivo)
                                <a href="{{route('vistas_constancia_total',["id" => $datos->id_estudiante, "credito" => 'civico'])}}" type="button" class="btn bg-verde mt-5 me-2">Constancia</a>   
                                @else
                                <button tu class="btn bg-gris mt-5 me-2 disabled">Constancia</button>
                                @endif
                            @else
                            <button tu class="btn bg-gris mt-5 me-2 disabled">Constancia</button>
                            @endif
                            <button onclick="agregarMooc('Deportivo',{{$datos->id_estudiante}})" data-bs-toggle="modal" data-bs-target="#modalMooc" type="button" class="btn bg-azul mt-5 me-2">MOOC</button>
                            <button onclick="agregarEvidencia('Deportivo',{{$datos->id_estudiante}})" data-bs-toggle="modal" data-bs-target="#modalEvidenciaCivico" type="button" class="btn bg-azul2 mt-5">Evidencias</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
    </div>

{{-- MODAL PARA EDITAR ESTUDIANTES --}}
<div class="modal border-0 fade" id="modalActualizar" tabindex="-1" aria-labelledby="modalActualizar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <h1 class="modal-title fs-5 fw-light" id="exampleModalLabel">Actualizar un Estudiante</h1>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container my-3">
                        <div class="row mt-2 mb-5">
                            <div class="col text-center">
                                <img src="{{asset('img/usuarioDefecto.png')}}" alt="" class="img-login">
                            </div>
                        </div>
                        <form action="{{ route('funciones-updateModal') }}" method="POST">
                            <input type="number" name="id_estudiante" id="id_estudiante" value="{{$datos->id_estudiante}}" class="d-none">
                            <input type="text" name="tipo" id="tipo" value="perfil" hidden>
                            @method('PUT')
                            @csrf
                            <div id="act_pt1">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control form-light" id="nombre_estudiante" name="nombre_estudiante" placeholder="Nombre" required value="{{$datos->nombre_estudiante}}">
                                            <label for="nombre_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Nombre(s) </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control form-light" id="apellidoPaterno_estudiante" name="apellidoPaterno_estudiante" placeholder="Apellido Paterno" required value="{{$datos->apellidoPaterno_estudiante}}">
                                            <label for="apellidoPaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Paterno</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control form-light" id="apellidoMaterno_estudiante" name="apellidoMaterno_estudiante" placeholder="Apellido Materno" required value="{{$datos->apellidoMaterno_estudiante}}">
                                            <label for="apellidoMaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Materno</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="date" class="form-control form-light" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required value="{{$datos->fecha_nacimiento}}">
                                            <label for="fecha_nacimiento" class="fw-light text-muted"><i class="fa-regular fa-calendar me-2"></i> Fecha de Nacimiento</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="tel" class="form-control form-light" id="telefono_celular" name="telefono_celular" placeholder="Teléfono celular" pattern="[0-9]{10}" maxlength="10" required value="{{$datos->telefono_celular}}">
                                            <label for="telefono_celular" class="fw-light text-muted"><i class="fa-solid fa-mobile me-2"></i> Teléfono Celular</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="number" class="form-control form-light" id="numero_control" name="numero_control" placeholder="Número de Control" pattern="[0-9]{10}" maxlength="9" value="{{$datos->numero_control}}">
                                            <label for="numero_control" class="fw-light text-muted"><i class="fa-solid fa-arrow-up-9-1 me-2"></i> Numero de control</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 mb-2">
                                    <div class="col text-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-login" id="btn_act_siguiente">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                            <div id="act_pt2" class="d-none">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="number" class="form-control form-light" id="semestre" name="semestre" placeholder="semestre" pattern="[0-9]{10}" maxlength="2" required title="Solo se permiten números" value="{{$datos->semestre}}">
                                            <label for="semestre" class="fw-light text-muted"><i class="fa-solid fa-hashtag"></i> Semestre</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form mb-3">
                                            <label for="carrera" class="fw-light text-muted"><i class="fa-solid fa-graduation-cap"></i> Carrera </label>
                                            <select class="form-select form-control form-light" type="text" id="carrera" name="carrera" placeholder="Carrera" aria-label="Default select example" required>
                                                <option  selected value="{{$datos->carrera}}">{{$datos->carrera}}</option>
                                                @if ($datos->carrera == "Ingeniería en Sistemas Computacionales")
                                                    <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                                                    <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                                                @elseif ($datos->carrera == "Ingeniería en Gestión Empresarial")
                                                    <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                                                    <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                                                @else
                                                    <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                                                    <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form mb-3">
                                            <label for="abreviatura" class="fw-light text-muted"><i class="fa-solid fa-graduation-cap"></i> Abreviatura</label>
                                            <input type="text" class="form-control form-light" id="abreviatura_carrera" name="abreviatura_carrera" aria-label="Default select example" required readonly value="{{$datos->abreviatura_carrera}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form mb-3">
                                            <label for="carrera" class="fw-light text-muted"><i class="fa-solid fa-calendar"></i> Periodo Actual</label>
                                            <select class="form-select form-control form-light" type="text" id="periodo" name="periodo" placeholder="periodo" aria-label="Default select example" required title="Seleccione una opción">
                                                <option selected value="{{$datos->periodo}}"><i class="fa-solid fa-graduation-cap" placeholder="Carrera">{{$datos->periodo}}</i></option>
                                                @if ($datos->periodo == "Enero - Junio")
                                                    <option value="Agosto - Diciembre">Agosto - Diciembre</option>
                                                @else
                                                    <option value="Enero - Junio">Enero - Junio</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control form-light" id="escuela_procedencia" name="escuela_procedencia" placeholder="Escuela de Procedencia" required value="{{$datos->escuela_procedencia}}">
                                            <label for="escuela_procedencia" class="fw-light text-muted"><i class="fa-solid fa-school me-2"></i> Escuela de Procedencia</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="date" class="form-control form-light" id="fecha_registro" name="fecha_registro" placeholder="Fecha de Ingreso" required value="{{$datos->fecha_registro}}">
                                            <label for="fecha_registro" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Fecha de Ingreso</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-light" id="ubicacion_act" placeholder="Ubicación" value="{{$datos->ubicacion}}">
                                            <label for="ubicacion_act">Ubicación</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 mb-2">
                                    <div class="col text-center">
                                        <span class="btn btn-cerrar" data-bs-dismiss="modal">Cancelar</span>
                                        <button type="button" class="btn btn-secondary" id="btn_act_regresar">Regresar</button>
                                        <button class="btn btn-login">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

{{-- MODAL PARA ELIMINAR ESTUDAINTES --}}
<div class="modal border-0 fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-light" id="exampleModalLabel">Eliminar Estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="fs-5 text-muted">¿Estás seguro de que deseas eliminar este estudiante?</p>
                        </div>
                        <div class="col mt-5 text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="fw-light">Nombre</th>
                                        <th class="fw-light">Numero de control</th>
                                        <th class="fw-light">Carrera</th>
                                    </tr>
                                </thead>
                                <tbody class="text-muted">
                                    <tr>
                                        <td>{{$datos->nombre_estudiante}} {{$datos->apellidoPaterno_estudiante}} {{$datos->apellidoMaterno_estudiante}}</td>
                                        <td>{{$datos->numero_control}}</td>
                                        <td>{{$datos->carrera}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('funciones-deleteModal') }}" method="POST">
                    <input type="number" id="id_estudiante_eliminar" name="id_estudiante_eliminar" class="d-none" value="{{$datos->id_estudiante}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

  <!-- MODAL MOOC-->
<div class="modal fade" id="modalMooc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalMoocCivico" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <div class="container p-3">
                <div class="row">
                    <div class="col text-center fw-light">
                        <h1 class="modal-title fs-5 fw-light" id="staticBackdropLabel">Moocs</h1>
                    </div>
                </div>
            </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container p-5">
                <div class="row">
                   <div class="col" id="seccion_info">                      
                   </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-2 p-0 text-end">
                        <button type="button" class="btn btn-secondary mt-1" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{route('funciones-agregarMooc')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div id="seccion_botones"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<!-- MODAL ELIMINAR MOOC-->
<div class="modal fade" id="modalEliminarMooc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEliminarMooc" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container p-3">
                    <div class="row">
                        <div class="col text-center">
                            <h1 class="modal-title fs-5 fw-light" id="modalEliminarMooc">Eliminar Mooc</h1>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container p-5">
                    <div class="row">
                        <div class="col text-center">
                            <div class="fw-light text-muted fw-2">¿Estás seguro de que deseas eliminar este Mooc?</div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" id="nombre_mooc" class="form-tabla" disabled></td>
                                        <td><button type="button" class="btn btn-warning"><i class="fa-solid fa-eye"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{route('funciones-eliminarMooc')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="number" name="id_estudiante" value="{{$datos->id_estudiante}}" hidden>
                    <input type="number" id="id_mooc_eliminar" name="id_mooc_eliminar" hidden>
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EVIDENCIA-->
<div class="modal fade" id="modalEvidenciaCivico" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalEvidenciaCivico" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content p-3">
            <div class="modal-header">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="modal-title fw-light" id="exampleModalLabel">Subir evidencia</h5>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container p-5">
                    <div class="row">
                        <div class="col" id="seccion_info_evidencia">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-login" data-bs-toggle="modal" data-bs-target="#modalAgregarEvento">Agregar nuevo evento</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ELIMINAR EVENTO -->
<div class="modal fade" id="modalEliminarEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEliminarEvento" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container p-3">
                    <div class="row">
                        <div class="col text-center">
                            <h1 class="modal-title fs-5 fw-light" id="modalEliminarMooc">Eliminar Mooc</h1>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container p-5">
                    <div class="row">
                        <div class="col text-center">
                            <div class="fw-light text-muted fw-2">¿Estás seguro de que deseas eliminar este evento?</div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col text-center" id="seccion_eliminar_evento">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <form action="{{route('funciones-eliminarEvento',$datos->id_estudiante)}}" method="POST">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                @csrf
                                @method('DELETE')
                                <input type="text" name="tipo_credito_eliminar" id="tipo_credito_eliminar" hidden>
                                <input type="number" id="id_evento_eliminar" name="id_evento_eliminar" hidden>
                                <input type="number" id="id_evidencia_eliminar" name="id_evidencia_eliminar" hidden>
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR EVENTO -->
<div class="modal fade" id="modalAgregarEvento" tabindex="-1" aria-labelledby="modalAgregarEvento" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container p-3">
                    <div class="row">
                        <div class="col text-center fw-light">
                            <h5 class="modal-title fw-light" id="exampleModalLabel">Agregar un nuevo evento</h5>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{route('funciones-agregarEvento', $datos->id_estudiante)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="text" id="tipo_credito_evento" name="tipo_credito_evento" hidden>
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="nombre_evento" name="nombre_evento" placeholder="Nombre del evento">
                                    <label for="nombre_evento" class="fw-lighter">Nombre del evento</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="horas" name="horas" placeholder="Horas que vale el evento">
                                    <label for="horas" class="fw-lighter">Horas que vale el evento</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_evento" name="fecha_evento" placeholder="Fecha del evento">
                                    <label for="">Fecha del evento</label>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="file-select mt-3" id="btn_evidencia" >
                                    <input type="file" name="btn_archivo" aria-label="Archivo" accept="image/jpg, image/jpeg, image/png, document/doc, document/docx, document/pdf">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button class="btn btn-login">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR EVENTO -->
<div class="modal fade" id="modalEditarEvento" tabindex="-1" aria-labelledby="modalEditarEvento" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container p-3">
                    <div class="row">
                        <div class="col text-center fw-light">
                            <h5 class="modal-title fw-light" id="exampleModalLabel">Editar evento</h5>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{route('funciones-editarEvento')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="text" name="id_estudiante" hidden value="{{$datos->id_estudiante}}">
                        <input type="text" name="id_evento" id="id_evento_act" hidden>
                        <input type="text" name="id_evidencia" id="id_evidencia_act" hidden>
                        <input type="text" name="credito" id="credito_act_evento" hidden>
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="nombre_evento_act" name="nombre_evento_act" placeholder="Nombre del evento" required>
                                    <label for="nombre_evento" class="fw-lighter">Nombre del evento</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="horas_act" name="horas_act" placeholder="Horas que vale el evento" required>
                                    <label for="horas" class="fw-lighter">Horas que vale el evento</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_evento_act" name="fecha_evento_act" placeholder="Fecha del evento" required>
                                    <label for="">Fecha del evento</label>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="file-select mt-3" id="btn_evidencia" >
                                    <input type="file" name="btn_archivo_act" aria-label="Archivo" accept="image/jpg, image/jpeg, image/png, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf, video/mp4">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col text-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button class="btn btn-login">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL VISTA PREVIA -->
<div class="modal fade" id="modalVistaPrevia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="modal-title" id="exampleModalLabel">Vista previa de la evidencia</h5>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col text-center" id="seccion_vistaPrevia"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script src="{{asset('js/web/perfilEstudiante.js')}}"></script>
@endsection
