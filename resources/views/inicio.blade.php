@extends('layouts/main')
@section('contenido')
    <body class="body-inicio">
        <header class="masthead sticky-top">
            <div class="container"></div>
        </header>
        <div class="container mt-5">
            <div class="row justify-content-between">
                <div class="col-3">
                    <div class="text-muted fs-5 fw-light">Dashboard</div>
                </div>
            </div>
            {{--  SECCION USUARIOS --}}
            <div class="row my-5">
                <div class="col-lg-6">
                    {{-- Plantilla de usuarios --}}
                    <a href="" class="text-decoration-none text-muted ">
                        <div class="container border-left-primary shadow border-0 card p-3 card-alumno">
                            <div class="row">
                                <div class="col-lg-4 me-3">
                                    <div class="row">
                                        <div class="col text-center"><img src="{{asset('img/usuarioDefecto.png')}}" alt="" class="img-usuario-inicio mt-5 mb-1"></div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col text-center fw-light">
                                                    Hernandez Gutierrez luis <br>
                                                    <div class="text-muted small">
                                                        191190073 <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mt-2 mb-4">
                                        <div class="col">
                                            <div class="row mb-2">
                                                <div class="col fw-light fw-light"> Creditos Civicos </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-barra-azul" style="width: 25%" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="row mb-2">
                                                <div class="col fw-light">Creditos Culturales</div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-barra-verde" style="width: 50%" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row mb-2">
                                                <div class="col fw-light"> Creditos Deportivos </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-barra-rojo" style="width: 75%" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered border-dark table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Numero de Control</th>
                                <th>Telefono Celular</th>
                                <th>Carrera</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Escuela de Procedencia de Medio Superior</th>
                                <th>Fecha de Ingreso</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($items as $item)
                            <tr>
                                <td style="font-size: 15px;">{{$item->nombre_estudiante}}</td>
                                <td style="font-size: 15px;">{{$item->apellidoPaterno_estudiante}}</td>
                                <td style="font-size: 15px;">{{$item->apellidoMaterno_estudiante}}</td>
                                <td style="font-size: 15px;">{{$item->numero_control}}</td>
                                <td style="font-size: 15px;">{{$item->telefono_celular}}</td>
                                <td style="font-size: 15px;" align="justify">{{$item->carrera}}</td>
                                <td style="font-size: 15px;">{{$item->fecha_nacimiento}}</td>
                                <td style="font-size: 15px;" align="justify">{{$item->escuela_procedencia}}</td>
                                <td style="font-size: 15px;">{{$item->fecha_registro}}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning" style="margin-top: 2px;" data-bs-toggle="modal" data-bs-target="#modalActualizar" data-id-estudiante="{{$item->id_estudiante}}">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger" style="margin-top: 2px;" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-action="{{ route('funciones-delete', $item->id_estudiante) }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

{{-- BOTON FLOTANTE QUE AGREGA ESTUDIANTES --}}
<button type="button" class="btn btn-flotante" data-bs-toggle="modal" data-bs-target="#modalAgregar">
    <img src="{{asset('icons/userPlus.png')}}" alt="" class="img-icon-agregar">
</button>

{{-- MODAL PARA AGREGAR ESTUDIANTES --}}
<div class="modal border-0 fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-light" id="exampleModalLabel">Agregar un Estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container my-3">
                    <form action="{{ route('funciones-registroAlumno') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="nombre_estudiante" name="nombre_estudiante">
                                    <label for="nombre_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Nombre </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellidoPaterno_estudiante" name="apellidoPaterno_estudiante">
                                    <label for="apellidoPaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Paterno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellidoMaterno_estudiante" name="apellidoMaterno_estudiante">
                                    <label for="apellidoMaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Materno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="numero_control" name="numero_control">
                                    <label for="numero_control" class="fw-light text-muted"><i class="fa-solid fa-arrow-up-9-1 me-2"></i> Numero de control</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="telefono_celular" name="telefono_celular">
                                    <label for="telefono_celular" class="fw-light text-muted"><i class="fa-solid fa-mobile me-2"></i> Telefono Celular</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-light" id="carrera" name="carrera">
                                    <label for="carrera" class="fw-light text-muted"><i class="fa-solid fa-graduation-cap"></i> Carrera </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento">
                                    <label for="fecha_nacimiento" class="fw-light text-muted"><i class="fa-regular fa-calendar me-2"></i> Fecha de Nacimiento</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="escuela_procedencia" name="escuela_procedencia" placeholder="Escuela de Procedencia">
                                    <label for="escuela_procedencia" class="fw-light text-muted"><i class="fa-solid fa-school me-2"></i> Escuela de procedencia</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_registro" name="fecha_registro" placeholder="Fecha de Ingreso">
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

<!-- MODAL PARA ACTUALIZAR ESTUDIANTES -->
<div class="modal border-0 fade" id="modalActualizar" tabindex="-1" aria-labelledby="modalActualizar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-light" id="exampleModalLabel">Actualizar Datos del Estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container my-3">
                    <form action="{{ route('funciones-update', $item->id_estudiante) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="nombre_estudiante" name="nombre_estudiante" value="{{ $item->nombre_estudiante }}" placeholder="Nombre">
                                    <label for="nombre_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Nombre </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellidoPaterno_estudiante" name="apellidoPaterno_estudiante" value="{{ $item->apellidoPaterno_estudiante }}" placeholder="Apellido Paterno">
                                    <label for="apellidoPaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Paterno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellidoMaterno_estudiante" name="apellidoMaterno_estudiante" value="{{ $item->apellidoMaterno_estudiante }}" placeholder="Apellido Materno">
                                    <label for="apellidoMaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Materno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="numero_control" name="numero_control" value="{{ $item->numero_control }}" placeholder="Numero de control">
                                    <label for="numero_control" class="fw-light text-muted"><i class="fa-solid fa-arrow-up-9-1 me-2"></i> Numero de control</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="telefono_celular" name="telefono_celular" value="{{ $item->telefono_celular }}" placeholder="Telefono Celular">
                                    <label for="telefono_celular" class="fw-light text-muted"><i class="fa-solid fa-mobile me-2"></i> Telefono Celular</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-light" id="carrera" name="carrera" value="{{ $item->carrera }}" placeholder="Carrera">
                                    <label for="carrera" class="fw-light text-muted"><i class="fa-solid fa-graduation-cap"></i> Carrera </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $item->fecha_nacimiento }}" placeholder="Fecha de Nacimiento">
                                    <label for="fecha_nacimiento" class="fw-light text-muted"><i class="fa-regular fa-calendar me-2"></i> Fecha de Nacimiento</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="escuela_procedencia" name="escuela_procedencia" value="{{ $item->escuela_procedencia }}" placeholder="Escuela de Procedencia">
                                    <label for="escuela_procedencia" class="fw-light text-muted"><i class="fa-solid fa-school me-2"></i> Escuela de procedencia</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_registro" name="fecha_registro" value="{{ $item->fecha_registro }}" placeholder="Fecha de Ingreso">
                                    <label for="fecha_registro" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Fecha ingreso</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span class="btn btn-cerrar" data-bs-dismiss="modal">Cancelar</span>
                                <button class="btn btn-login">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA ELIMINAR ESTUDIANTES -->
<div class="modal border-0 fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-light" id="exampleModalLabel">Eliminar Estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este estudiante?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('funciones-delete', $item->id_estudiante) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<a class="nav-link" href="{{ route('auth-logout') }}" style="font-size: 30px; color:red;" title="Cerrar Sesion"><i class="fa-solid fa-door-open"></i>Salir</a>

@endsection
@section('scripts')
@endsection