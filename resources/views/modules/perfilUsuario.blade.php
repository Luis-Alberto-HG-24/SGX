@extends('layouts/main')
@section('contenido')
    <body>
        <header class="masthead sticky-top">
            <div class="container">
            </div>
        </header>
        <div class="container p-5 ">
            <div class="row">
                <div class="col text-muted fw-light fs-5">
                    Datos del usuario
                </div>
                <div class="col text-end">
                    <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#editarUsuario"><i class="fa-solid fa-pen text-muted"></i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="{{asset('img/usuarioDefecto.png')}}" alt="" class="img-estudiante-perfil">
                </div>
            </div>
            <div class="row justify-content-center mt-5 mb-3 fw-lighter text-center" id="seccion_datos_estudiante">
                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                    <div class="fs-4"> Nombre</div>
                    <div class="text-muted fs-5">
                        {{Auth::user()->nombre}}
                        {{Auth::user()->apellido_paterno}}
                        {{Auth::user()->apellido_materno}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                    <div class="fs-4">Nombre de usuario</div>
                    <div class="text-muted fs-5">{{Auth::user()->nombre_usuario}}</div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-5">
                    <div class="fs-4">Correo</div>
                    <div class="text-muted fs-5">{{Auth::user()->email}}</div>
                </div>
            </div>
        </div>
    </body>
    
    <!-- MODAL EDITAR USUARIO -->
    <div class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="editarUsuario" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <h5 class="modal-title fw-light text-muted" id="exampleModalLabel">Editar usuario</h5>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{route('funciones-updateUsusario', Auth::user()->id_usuario)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-light" id="nombre" name="nombre" placeholder="Nombre" value="{{Auth::user()->nombre}}">
                                        <label for="nombre" class="fw-light text-muted"><i class="fa-solid fa-user me-2"></i>Nombre</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-light" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno" value="{{Auth::user()->apellido_paterno}}">
                                        <label for="apellidoP" class="fw-light text-muted"><i class="fa-solid fa-user me-2"></i> Apellido Paterno</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-light" id="apellidoM" name="apellidoM" placeholder="Apellido Materno" value="{{Auth::user()->apellido_materno}}">
                                        <label for="apellidoM" class="fw-light text-muted"><i class="fa-solid fa-user me-2"></i> Apellido Materno</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-light" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario" value="{{Auth::user()->nombre_usuario}}">
                                        <label for="nombre_usuario" class="fw-light text-muted">Nombre de usuario</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control form-light" id="correo" name="correo" placeholder="Correo" value="{{Auth::user()->email}}">
                                        <label for="correo" class="fw-light text-muted"><i class="fa-solid fa-envelope me-2"></i>Correo</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control form-light" id="password" name="password" placeholder="Contraseña" value="">
                                        <label for="password" class="fw-light text-muted"><i class="fa-solid fa-key me-2"></i>Contraseña</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5 mb-2">
                                <div class="col text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection