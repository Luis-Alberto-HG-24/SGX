@extends('layouts/main')
@section('contenido')
<body>
    <header class="masthead sticky-top">
        <div class="container">
        </div>
    </header>
     {{-- SECCION DATOS ALUMNOS --}}
    <div class="container p-5" id="seccion_datos_estudiante">
        <div class="row">
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
        <div class="row justify-content-center my-3 fw-lighter  text-center" id="seccion_datos_estudiante">
            <div class="col-lg-4 mt-3 mb-5">
                <div class="fs-4">  Numero de control</div>
                <div class="text-muted fs-5"> {{$datos->numero_control}}</div>
            </div>
            <div class="col-lg-4 mt-3 mb-5">
                <div class="fs-4"> Nombre</div>
                <div class="text-muted fs-5">
                    {{$datos->nombre_estudiante}}
                    {{$datos->apellidoPaterno_estudiante}}
                    {{$datos->apellidoMaterno_estudiante}}
                </div>
            </div>
            <div class="col-lg-4 mt-4 mb-5">
                <div class="fs-4"> Carrera</div>
                <div class="text-muted fs-5">{{$datos->carrera}}</div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="fs-5">Telefono celular</div>
                <div class="text-muted">{{$datos->telefono_celular}}</div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="fs-5">Fecha de Nacimiento</div>
                <div class="text-muted">{{$datos->fecha_nacimiento}}</div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="fs-5">Telefono celular</div>
                <div class="text-muted">{{$datos->telefono_celular}}</div>
            </div>
            <div class="col-lg-4">
                <div class="fs-5">Escuela de procedencia</div>
                <div class="text-muted">{{$datos->escuela_procedencia}}</div>
            </div>
            <div class="col-lg-4">
                <div class="fs-5">Fecha de registro</div>
                <div class="text-muted">{{$datos->fecha_registro}}</div>
            </div>
        </div>
    {{-- SECCION CREDITO CIVICO--}}
        <div class="row my-5">
                <div class="col-lg-6 mt-lg-5">
                    <div class="container mt-lg-5">
                        <div class="row">
                            <div class="col fs-3 fw-lighter">
                                Credito Civico
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col text-primary fw-light fs-5">
                                En tramite 
                            </div>
                            <div class="col fw-light fs-5 text-muted text-end">
                                <i class="fa-regular fa-folder me-2"></i>
                                Guardado en la carpeta 3B
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-5">
                    <div class="container mt-lg-5">
                        <div class="row">
                            <div class="col p-3 text-end">
                                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button" class="btn bg-verde mt-5 me-2">Constancia</button>
                                <button data-bs-toggle="modal" data-bs-target="#modalMoocCivico" type="button" class="btn bg-azul mt-5 me-2">MOOC</button>
                                <button data-bs-toggle="modal" data-bs-target="#modalEvidenciaCivico" type="button" class="btn bg-azul2 mt-5">Evidencias</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</div>
    {{-- SECCION EDITAR --}}
    <div class="modal border-0 fade" id="modalActualizar" tabindex="-1" aria-labelledby="modalActualizar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-light" id="exampleModalLabel">Actualizar un Estudiante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container my-3">
                        <form action="{{route('funciones-updateModal')}}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="number" id="id_estudiante" name="id_estudiante" class="d-none" value="{{$datos->id_estudiante}}">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-light" id="nombre_estudiante" name="nombre_estudiante" value="{{$datos->nombre_estudiante}}">
                                        <label for="nombre_estudiante_act" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Nombre </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-light" id="apellidoPaterno_estudiante" name="apellidoPaterno_estudiante" value="{{$datos->apellidoPaterno_estudiante}}">
                                        <label for="apellidoPaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Paterno</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-light" id="apellidoMaterno_estudiante" name="apellidoMaterno_estudiante" value="{{$datos->apellidoMaterno_estudiante}}">
                                        <label for="apellidoMaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Materno</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-4">
                                        <input type="number" class="form-control form-light" id="numero_control" name="numero_control" value="{{$datos->numero_control}}">
                                        <label for="numero_control" class="fw-light text-muted"><i class="fa-solid fa-arrow-up-9-1 me-2"></i> Numero de control</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-4">
                                        <input type="number" class="form-control form-light" id="telefono_celular" name="telefono_celular" value="{{$datos->telefono_celular}}">
                                        <label for="telefono_celular" class="fw-light text-muted"><i class="fa-solid fa-mobile me-2"></i> Telefono Celular</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-light" id="carrera" name="carrera" value="{{$datos->carrera}}">
                                        <label for="carrera" class="fw-light text-muted"><i class="fa-solid fa-graduation-cap"></i> Carrera </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-4">
                                        <input type="date" class="form-control form-light" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" value="{{$datos->fecha_nacimiento}}">
                                        <label for="fecha_nacimiento" class="fw-light text-muted"><i class="fa-regular fa-calendar me-2"></i> Fecha de Nacimiento</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-light" id="escuela_procedencia" name="escuela_procedencia" placeholder="Escuela de Procedencia" value="{{$datos->escuela_procedencia}}">
                                        <label for="escuela_procedencia" class="fw-light text-muted"><i class="fa-solid fa-school me-2"></i> Escuela de procedencia</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-4">
                                        <input type="date" class="form-control form-light" id="fecha_registro" name="fecha_registro" placeholder="Fecha de Ingreso" value="{{$datos->fecha_registro}}">
                                        <label for="fecha_registro" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Fecha ingreso</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <span class="btn btn-cerrar" data-bs-dismiss="modal">Cancelar</span>
                                    <button class="btn btn-login">Agregar</button>
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


  <!-- MODAL MOOC CIVICO -->
<div class="modal fade" id="modalMoocCivico" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalMoocCivico" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-light" id="staticBackdropLabel">Credito academico - MOOC</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container p-5">
                <div class="row">
                    <div class="col-4">
                        <div class="mt-lg-1">Evidencia Mooc Civico </div>
                    </div>
                    <div class="col text-center">
                        <button type="button" class="btn bg-amarillo fw-light"><i class="fa-solid fa-eye me-2"></i>Ver MOOC</button>
                    </div>
                    <div class="col text-center">
                        <button type="button" class="btn bg-rojo fw-light"><i class="fa-solid fa-trash me-2"></i> Eliminar MOOC</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <div class="file-select" id="btn_mooc_civico" >
                <input type="file" name="btn_mooc_civico" aria-label="Archivo" accept="image/.jpg,.jpeg,.png/document/.doc,.docx,.pdf">
            </div>
            <button type="button" class="btn btn-login">Aceptar</button>
        </div>
      </div>
    </div>
</div>


<!-- MODAL EVIDENCIA CIVICO -->
<div class="modal fade" id="modalEvidenciaCivico" tabindex="-1" aria-labelledby="modalEvidenciaCivico" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection