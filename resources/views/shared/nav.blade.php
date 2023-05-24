<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
      <a class="" data-bs-toggle="offcanvas" href="#offcanvasPerfil" role="button" aria-controls="offcanvasPerfil"><img src="{{asset('img/usuarioDefecto.png')}}" alt="..." class="img-usuario-inicio mt-4"> </a>
      <div class="nombre-usuario ms-3 text-white fw-light fs-5 mt-4">Hernandez Gutierrez Luis</div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
              <li class="nav-item"><a data-bs-toggle="offcanvas" href="#offcanvasSGX" role="button" aria-controls="offcanvasSGX" class="nav-link  fs-5 fw-light mt-4" href="#team">SGX</a></li>
              <li class="nav-item"><a class="nav-link mt-4" href="#contact"><img src="{{asset('icons/gear.png')}}" alt="" class="img-icon" ></a></li>
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
        <div class="row">
            <div class="col text-center">
                <div class="fw-light fs-3">Perfil</div>
            </div>
        </div>
      </div>
    </div>
</div>

{{-- OFF CANVAS SGX --}}

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSGX" aria-labelledby="offcanvasSGX">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="fw-light fs-3">Sistema Gestor de Extra escolares</div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col">
                <ul>
                    <li>Agregar estudiante</li>
                </ul>
            </div>
        </div>
      </div>
    </div>
</div>