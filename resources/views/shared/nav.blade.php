<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container-fluid">
      <a  class="ms-xxl-5 ms-md-5 mt-lg-4 mt-xxl-0 ms-sm-5 ms-3" data-bs-toggle="offcanvas" href="#offcanvasPerfil" role="button" aria-controls="offcanvasPerfil"><img src="{{asset('img/usuarioDefectoBlanco.png')}}" alt="..." class="img-usuario-inicio"> </a>
      <span class="ms-xxl-5 ms-md-5 mt-lg-4 mt-xxl-0 ms-sm-5 ms-3 tec">TECNM CAMPUS MILPA ALTA II</span>
      <a  class="sgx ms-xxl-5 ms-md-5 mt-lg-4 mt-xxl-0 me-sm-5" data-bs-toggle="offcanvas" href="#offcanvasPerfil" role="button" aria-controls="offcanvasPerfil"><img src="{{asset('img/SGX.png')}}" alt="..." class="img-sgx-inicio"> </a>
      <div class="collapse navbar-collapse mt-xxl-3 mt-xl-2 me-lg-2" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0 ">
              <li class="nav-item text-end mt-4 me-xxl-5 me-xl-5 me-l-5 logo-nav"><a class="mt-4" href="{{route('vistas-inicio')}}"><img src="{{asset('img/SGX.png')}}" alt="" class="img-logo-nav"></a></li>
          </ul>
      </div>
  </div>
</nav>

{{-- OFF CANVAS PERFIL --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasPerfil" aria-labelledby="offcanvasPerfil">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="container">
        <div class="row mb-3">
          <div class="col text-center">
            <img src="{{asset('img/usuarioDefecto.png')}}" alt="" class="img-usuario-inicio">
          </div>
        </div>
        <div class="row">
          <div class="col text-center fw-lighter fs-2">
            {{Auth::user()->nombre_usuario}}
          </div>
        </div>
        <div class="row mt-2">
            <div class="col text-center">
                <div class="fw-lighter small text-muted fs-5">
                  {{Auth::user()->nombre}} {{Auth::user()->apellido_paterno}} {{Auth::user()->apellido_materno}}
                </div>
            </div>
        </div>
        <div class="row my-5">
          <div class="col text-center">
            <a href="{{route('vistas-perfilUsuario')}}" class="text-decoration-none text-muted"><i class="fa-solid fa-user me-2"></i>Perfl</a>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col text-center fw-light hover-opcion">
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn text-muted"><i class="fa-solid fa-door-open me-2 hover-opcion"></i>Cerrar Sesión</button>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- MODAL CERRAR SESION -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col text-center p-3">
              <div>¿Estas seguro de que deseas cerrar la sesión?</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row my-3">
          <div class="col text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a href="{{route('auth-logout')}}" class="btn btn-danger">Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
