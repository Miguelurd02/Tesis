@extends('layouts/contentNavbarLayout')


@section('title', 'Error - Pages')


@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/perfil/perfil.css') }}" />
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Inmobiliaria / Perfil de empresa/ </span> Seguridad
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link" href="/perfil/inmobiliaria"><i class="bx bx-user me-1"></i> Cuenta</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-shield-quarter me-1'></i> Seguridad</a></li>
    </ul>
  </div>
  </div>
    <div class="row">
    <div class="col-md-12">
    <div class="card mb-4">
      <h4 class="card-header">Cambiar la contraseña</h4>
      <!-- Account -->
      <div class="card-body">
        <form id="formAccountSettings" method="POST">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="contr-actual" class="form-label">Contraseña actual</label>
              <input class="form-control" type="text" id="contr-actual" name="contr-actual"  autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="contr-nueva" class="form-label">Contraseña nueva</label>
              <input class="form-control" type="text" name="contr-nueva" id="contr-nueva"  />
            </div>
            <div class="mb-3 col-md-6">
              <label for="contr-nueva-rept" class="form-label">Repetir contraseña nueva</label>
              <input class="form-control" type="text" id="contr-nueva-rept" name="contr-nueva-rept"  placeholder="" />
            </div>
           <!--<div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Código de confirmación</label>
              <div class="input-group input-group-merge">
                <button id="show_password" class="btn btn-success" type="button" onclick="">
                  <i class='bx bx-mail-send'></i>
                </button>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="" />
              </div>
            </div>--> 
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
     <!-- Delete Account -->
    <div class="row">
      <div class="col col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Eliminar Cuenta</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading fw-bold mb-1">Estás seguro(a) de que deseas eliminar tu cuenta?</h6>
            <p class="mb-0">Una vez que elimines tu cuenta, ya no hay vuelta atrás.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">Confirmo la desactivacion de mi cuenta</label>
          </div>
          <button type="submit" class="btn btn-danger deactivate-account">Desactivar Cuenta</button>
        </form>
      </div>
    </div>
   </div>
  </div>
  
@endsection

