@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Pages')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Configuración de la Cuenta / </span> Seguridad
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link" href="/perfil/usuario"><i class="bx bx-user me-1"></i> Cuenta</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('/perfil/usuario/favoritos')}}"><i class="bx bx-heart me-1"></i> Favoritos</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-shield-quarter me-1'></i> Seguridad</a></li>
    </ul>
  </div>
  </div>
    <div class="row">
    <div class="col-md-12">
    <div class="card mb-4">
      <h4 class="card-header">Cambiar la contraseña</h4>
      @if (session('success'))
    <div class="alert alert-success mt-4">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger mt-4">
        {{ session('error') }}
    </div>
@endif
      <!-- Account -->
      <div class="card-body">
        <form id="formAccountSettings" method="POST" action="{{ route('cambiar.clave') }}" >
          @csrf
          @method('PUT')
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="password" class="form-label">Contraseña actual</label>
              <input class="form-control" type="password" id="password" name="password"  autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="new_password" class="form-label">Contraseña nueva</label>
              <input class="form-control" type="password" name="new_password" id="new_password"  />
              @error('new_password')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label for="confirm_password" class="form-label">Repetir contraseña nueva</label>
              <input class="form-control" type="password" id="confirm_password" name="confirm_password"  placeholder="" />
            </div>
           <!--<div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Código de confirmationación</label>
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
      <h5 class="card-header">Información adicional</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading fw-bold mb-1">¿Quieres eliminar tu cuenta?</h6>
            <p class="mb-0">Para ello debes comunicarte con el soporte de Laria. Recuerda que una vez que elimines tu cuenta, ya no hay vuelta atrás.</p>
          </div>
        </div>
      </div>
    </div>
   </div>
  </div>
  
@endsection
