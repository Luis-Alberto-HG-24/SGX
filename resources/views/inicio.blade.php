@extends('layouts/main')
@section('contenido')
    <body class="body-inicio">
        <header class="masthead sticky-top">
            <div class="container">
            </div>
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
                   <a href="" class="text-decoration-none text-muted border ">
                        <div class="container border-left-primary shadow border-0 card p-3 card-alumno">
                            <div class="row">
                                <div class="col-lg-4 me-3">
                                    <div class="row">
                                        <div class="col  text-center">
                                            <img src="{{asset('img/usuarioDefecto.png')}}" alt="" class="img-usuario-inicio mt-5 mb-1">
                                        </div>
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
    </body>

{{-- BOTON FLOTANTE QUE AGREGA USUARIOS --}}

<button type="button" class="btn btn-flotante" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <img src="{{asset('icons/userPlus.png')}}" alt="" class="img-icon-agregar">
</button>

{{-- MODAL PARA AGREGAR USUARIOS --}}
<div class="modal border-0 fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-light" id="exampleModalLabel">Agregar un Estudiante</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container my-3">
                <form action="" action="POST">
                    @csrf
                    @method('POST')
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-light" id="nombre" name="nombre" placeholder="Nombre">
                                <label for="nombre" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Nombre </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-light" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno">
                                <label for="apellidoP" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Paterno</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-light" id="apellidoM" name="apellidoM" placeholder="Apellido Materno">
                                <label for="apellidoM" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Apellido Materno</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-4">
                                <input type="number" class="form-control form-light" id="numCtrl" name="numCtrl" placeholder="Numero de control">
                                <label for="numCtrl" class="fw-light text-muted"><i class="fa-solid fa-arrow-up-9-1 me-2"></i> Numero de control</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-4">
                                <input type="number" class="form-control form-light" id="telefono_celular" name="telefono_celular" placeholder="Telefono Celular">
                                <label for="telefono_celular" class="fw-light text-muted"><i class="fa-solid fa-mobile me-2"></i> Telefono Celular</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-light" id="carrera" name="carrera" placeholder="Carrera">
                                <label for="carrera" class="fw-light text-muted"><i class="fa-solid fa-graduation-cap"></i> Carrera </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control form-light" id="fechaNac" name="fechaNac" placeholder="Fecha de Nacimiento">
                                <label for="fechaNac" class="fw-light text-muted"><i class="fa-regular fa-calendar me-2"></i> Fecha de Nacimiento</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-light" id="escuelaProcedencia" name="escuelaProcedencia" placeholder="Escuela de procedencia">
                                <label for="escuelaProcedencia" class="fw-light text-muted"><i class="fa-solid fa-school me-2"></i> Escuela de procedencia</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control form-light" id="fechaIngreso" name="fechaIngreso" placeholder="Fecha ingreso">
                                <label for="fechaIngreso" class="fw-light text-muted"><i class="fa-regular fa-user me-2"></i> Fecha ingreso</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cerrar" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-login">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('scripts')
@endsection