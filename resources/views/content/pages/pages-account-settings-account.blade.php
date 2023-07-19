@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/perfil/perfil.css') }}" />
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Configuración de la Cuenta /</span> Cuenta
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Cuenta</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('/perfil/usuario/favoritos')}}"><i class="bx bx-heart me-1"></i> Favoritos</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('/perfil/usuario/seguridad')}}"><i class='bx bx-shield-quarter me-1'></i> Seguridad</a></li>
    </ul>
  </div>
  </div>
  
    <div class="row">
    <div class="col-md-4">
      <div class="card mb-4 card-body text-center" bis_skin_checked="1">
        <img src="{{asset('assets/img/avatars/user-image.png')}}" alt="user imagen" class="card-img-top-agente">
        <h2 class="card-title-agente"> </h2>
          <p class=" mb-4 inmo-detail">vicky.bellomo</p>
      </div>
    </div> 

    <div class="col-md-8">
      <div class="card mb-4">
      <div class="card-body" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
          <h3>Información del perfil</h3>
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Nombre</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Apellido</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Correo electrónico</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Teléfono</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <hr>
      </div>
      <br>
     
    </div>
    </div>
    
      <!-- /Account -->
    </div>

  <div class="row">
    <div class="col-12" bis_skin_checked="1">
      <div class="card mb-4" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">
          <p class="demo-inline-spacing">
            <div class="row">
              <div class="col col-md-10">
            <h3>Cambiar información del perfil</h3>
            </div>
            <div class="col col-md-2">
            <button class="btn btn-primary me-1 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Editar Cuenta
            </button>
          </div>
        </div>
          </p>
          <div class="collapse" id="collapseExample" bis_skin_checked="1" style="">
            <div class="d-grid d-sm-flex p-3" bis_skin_checked="1">
              <img src="{{asset('assets/img/avatars/user-image.png')}}" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
              <div>
          
                <!-- Account -->
                <div>
                  <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Nombre</label>
                        <input class="form-control" type="text" id="firstName" name="firstName" value="" autofocus />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Apellido</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" value="" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input class="form-control" type="text" id="email" name="email" value="" placeholder="" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Teléfono</label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text">VE (+58)</span>
                          <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="" />
                        </div>
                      </div>
                      
                    </div>
                    <div class="mt-2">
                      <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
                      <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                    </div>
                  </form>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
