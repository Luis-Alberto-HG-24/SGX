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
                    <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#modalActualizar"><i class="fa-solid fa-pen text-muted"></i></button>
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
                    <div class="fs-4">Teléfono Celular</div>
                    <div class="text-muted fs-5">{{Auth::user()->email}}</div>
                </div>
            </div>
        </div>
    </body>
@endsection