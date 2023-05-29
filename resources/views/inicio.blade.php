@extends('layouts/main')
@section('contenido')
    <body>
        <header class="masthead sticky-top">
            <div class="container"></div>
        </header>
        <div class="container my-5">
            <div class="row">
                <div class="col-3">
                    <div class="text-muted fs-5 fw-light">Dashboard</div>
                </div>
            </div>
        </div>

        @if (Str::length($items) == 2)
            <div class="container my-5">
                <div class="row">
                    <div class="col text-center p-5">
                        <div class="fs-2 text-muted fw-light mt-5">Aun no has agregado ningún estudiante</div>
                    </div>
                </div>
            </div>
        @else
         {{--  SECCION USUARIOS TARJETAS--}}
            <div class="container my-5" id="seccion_usuarios_tarjetas">
                <div class="row justify-content-evenly my-5">
                    @foreach ($items as $item)
                    <div class="col-lg-5 mb-5">
                        <a href="{{Route('vistas-perfil-estudiante', $item->id_estudiante)}}" class="text-decoration-none text-muted ">
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
                                                        {{$item->nombre_estudiante}}
                                                        {{$item->apellidoPaterno_estudiante}}
                                                        {{$item->apellidoMaterno_estudiante}} <br>
                                                        <div class="text-muted small">
                                                            {{$item->numero_control}}<br>
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
                    @endforeach
                </div>
            </div>
            {{-- SECCION TABLA USUARIOS --}}
            <div class="container my-5 d-none" id="seccion_usuario_tabla">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <table class="table" id="tabla_usuarios">
                            <thead>
                                <tr>
                                    <th class="text-center fw-light">Nombre</th>
                                    <th class="text-center fw-light">Numero de Control</th>
                                    <th class="text-center fw-light">Carrera</th>
                                    <th class="text-center fw-light">Ver</th>
                                    <th class="text-center fw-light">Editar</th>
                                    <th class="text-center fw-light">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($items as $item)
                                    <td class="small">{{$item->nombre_estudiante}} {{$item->apellidoPaterno_estudiante}} {{$item->apellidoMaterno_estudiante}}</td>
                                    <td class="small">{{$item->numero_control}}</td>
                                    <td class="small" >{{$item->carrera}}</td>
                                    <td class="text-center">
                                        <a href="{{route('vistas-perfil-estudiante', $item->id_estudiante)}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <button data-bs-toggle="modal" data-bs-target="#modalActualizar" type="button" class="btn btn-warning" onclick="editar({{$item->id_estudiante}})">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar" onclick="eliminar({{$item->id_estudiante}})">
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
        @endif
    </body>

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
                                    <input type="text" class="form-control form-light" id="nombre_estudiante" name="nombre_estudiante" placeholder="Nombre" required>
                                    <label for="nombre_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Nombre </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellidoPaterno_estudiante" name="apellidoPaterno_estudiante" placeholder="Apellido Paterno" required>
                                    <label for="apellidoPaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Paterno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellidoMaterno_estudiante" name="apellidoMaterno_estudiante" placeholder="Apellido Materno" required>
                                    <label for="apellidoMaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Materno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="numero_control" name="numero_control" placeholder="Número de Control" pattern="[0-9]{10}" maxlength="9">
                                    <label for="numero_control" class="fw-light text-muted"><i class="fa-solid fa-arrow-up-9-1 me-2"></i> Numero de control</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="tel" class="form-control form-light" id="telefono_celular" name="telefono_celular" placeholder="Teléfono celular" pattern="[0-9]{10}" maxlength="10" required>
                                    <label for="telefono_celular" class="fw-light text-muted"><i class="fa-solid fa-mobile me-2"></i> Teléfono Celular</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form mb-3">
                                    <label for="carrera" class="fw-light text-muted"><i class="fa-solid fa-graduation-cap"></i> Carrera </label>
                                    <select class="form-select form-control form-light" type="text" id="carrera" name="carrera" placeholder="Carrera" aria-label="Default select example" required>
                                        <option selected disabled><i class="fa-solid fa-graduation-cap" placeholder="Carrera">Seleccionar carrera...</i></option>
                                        <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                                        <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                                        <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
                                    <label for="fecha_nacimiento" class="fw-light text-muted"><i class="fa-regular fa-calendar me-2"></i> Fecha de Nacimiento</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="escuela_procedencia" name="escuela_procedencia" placeholder="Escuela de Procedencia" required>
                                    <label for="escuela_procedencia" class="fw-light text-muted"><i class="fa-solid fa-school me-2"></i> Escuela de Procedencia</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_registro" name="fecha_registro" placeholder="Fecha de Ingreso" required>
                                    <label for="fecha_registro" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Fecha de Ingreso</label>
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

{{-- MODAL PARA ACTUALIZAR ESTUDIANTES --}}
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
                        <input type="number" id="id_estudiante" name="id_estudiante" class="d-none">
                        <input type="text" id="tipo" name="tipo" class="d-none" value="inicio">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="nombre_estudiante_act" name="nombre_estudiante">
                                    <label for="nombre_estudiante_act" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Nombre </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellidoPaterno_estudiante_act" name="apellidoPaterno_estudiante">
                                    <label for="apellidoPaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Paterno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellidoMaterno_estudiante_act" name="apellidoMaterno_estudiante">
                                    <label for="apellidoMaterno_estudiante" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Materno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="numero_control_act" name="numero_control">
                                    <label for="numero_control" class="fw-light text-muted"><i class="fa-solid fa-arrow-up-9-1 me-2"></i> Numero de control</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="number" class="form-control form-light" id="telefono_celular_act" name="telefono_celular">
                                    <label for="telefono_celular" class="fw-light text-muted"><i class="fa-solid fa-mobile me-2"></i> Telefono Celular</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-light" id="carrera_act" name="carrera">
                                    <label for="carrera" class="fw-light text-muted"><i class="fa-solid fa-graduation-cap"></i> Carrera </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_nacimiento_act" name="fecha_nacimiento" placeholder="Fecha de Nacimiento">
                                    <label for="fecha_nacimiento" class="fw-light text-muted"><i class="fa-regular fa-calendar me-2"></i> Fecha de Nacimiento</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="escuela_procedencia_act" name="escuela_procedencia" placeholder="Escuela de Procedencia">
                                    <label for="escuela_procedencia" class="fw-light text-muted"><i class="fa-solid fa-school me-2"></i> Escuela de procedencia</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="date" class="form-control form-light" id="fecha_registro_act" name="fecha_registro" placeholder="Fecha de Ingreso">
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
                                        <td>
                                            <input type="text" id="llenar_nombre" class="form-tabla" disabled>
                                        </td>
                                        <td>
                                            <input type="text" id="llenar_numCtrl" class="form-tabla" disabled>
                                        </td>
                                        <td>
                                            <input type="text" id="llenar_carrera" class="form-tabla" disabled>
                                        </td>
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
                    <input type="number" id="id_estudiante_eliminar" name="id_estudiante_eliminar" class="d-none">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{---------------------------------------------------------------------------------}}

{{-- BOTON FLOTANTE QUE AGREGA ESTUDIANTES --}}
<button type="button" class="btn btn-flotante" data-bs-toggle="modal" data-bs-target="#modalAgregar">
    <i class="fa-solid fa-user-plus fs-5"></i>
</button>

{{-- BOTON FLOTANTE PARA MOSTRAR LA TABLA --}}
<button type="button" class="btn btn-flotante-vista" id="btn_muestra_tabla">
    <i class="fa-solid fa-table-list fs-5"></i>
</button>

{{-- BOTON FLOTANTE PARA MOSTRAR LAS TARJETAS --}}
<button type="button" class="btn btn-flotante-vista d-none" id="btn_muestra_tarjetas">
    <i class="fa-regular fa-address-card fs-5"></i>
</button>


@endsection
@section('scripts')
<script src="{{asset('js/web/inicio.js')}}"></script>
@endsection
