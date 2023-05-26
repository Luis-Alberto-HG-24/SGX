@extends('layouts/main')
@section('contenido')
    <div class="container my-3 p-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-3 col-md-6 col-sm-10 bg-white shadow login" id="seccion_login">
                <div class="container">
                    <div class="row">
                        <div class="col text-center p-5">
                            <img src="{{ asset('img/logoSGX.png') }}" alt="" class="img-login">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <p class="fw-light text-muted">Sistema Gestor <br> de ExtraEscolares</p>
                        </div>
                    </div>
                    <form action="{{ route('auth-logear') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row justify-content-center mt-5">
                            <div class="col-10">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-light" id="nombre_usuario" name="nombre_usuario" required placeholder="Username here">
                                    <label for="userLogin" class="fw-light text-muted"><i class="fa-solid fa-user me-2 text-muted"></i>Usuario</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control form-light" id="password" name="password" required placeholder="Password here">
                                    <label for="passwordLogin" class="fw-light text-muted"><i class="fa-solid fa-key me-2 text-muted"></i>Contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 text-center">
                                <button class="btn btn-login">Ingresar</button>
                            </div>
                            <div class="col-12 text-center mt-2">
                                <span class="btn fw-light text-muted my-3 text-decoration-none small-2" id="btn_crearCuenta">Crear cuenta</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 bg-white shadow login d-none" id="seccion_registro">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center p-5">
                            <div class="fs-4 fw-lighter">Creacion de cuenta de usuario</div>
                        </div>
                        <div class="col-12 text-center">
                            <img src="{{asset('img/usuarioDefecto.png')}}" alt="" class="img-login mb-4">
                        </div>
                    </div>
                    <form action="{{ route('funciones-registro') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row my-3">
                            <div class="col-12 col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="nombre" name="nombre" placeholder="Nombre">
                                    <label for="nombre" class="fw-light text-muted"><i class="fa-solid fa-user me-2"></i>Nombre</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno">
                                    <label for="apellidoP" class="fw-light text-muted"><i class="fa-solid fa-user me-2"></i>Apellido Paterno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno">
                                    <label for="apellidoM" class="fw-light text-muted"><i class="fa-solid fa-user me-2"></i>Apellido Materno</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control form-light" id="email" name="email" placeholder="Correo">
                                    <label for="correo" class="fw-light text-muted"><i class="fa-solid fa-envelope me-2"></i>Correo</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-light" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario">
                                    <label for="nombreUsuario" class="fw-light text-muted"><i class="fa-regular fa-circle-user me-2"></i>Nombre de usuario</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control form-light" id="password" name="password" placeholder="Contraseña">
                                    <label for="nombre" class="fw-light text-muted"><i class="fa-solid fa-key me-2"></i>Contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-12 text-center">
                                <button class="btn btn-login">Crear usuario</button>
                            </div>
                            <div class="col text-center mt-3 mb-2">
                                <span class="btn small-2 fw-light text-muted" id="btn_login">Iniciar sesion</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/web/login.js')}}"></script>
@endsection