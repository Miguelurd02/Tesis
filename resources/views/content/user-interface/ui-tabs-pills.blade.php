@extends('layouts/blankLayout')

@section('title', 'Tabs and pills - UI elements')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')

<div class="container-xxl">
  <div class="authentication-basic container-p-y ">
      <!-- Register Card -->
      <div class="row justify-content-center">
        <div class="col-md-5"> <!-- Ajusta el número de columnas según tus necesidades -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <img src="{{ asset('assets/img/img2/agente-inmobiliario.png')}}" width=30>
                <a href="{{url('/')}}" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span>
                </a>
              </div>
              <br>
              <!-- /Logo -->
              <h4 class="mb-2">Completa el perfil para la inmobiliaria</h4>
              <p class="mb-4">Proporciona la información a continuación, la cual será necesaria para que la inmobiliaria pueda ser identificada correctamente por los suscriptores.</p>

              <form id="formAuthentication" class="mb-3" action="/auth/register-basic" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nombre de la Inmobiliaria</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="lastname" class="form-label">RIF</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Ingresa tu apellido">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label" for="phoneNumber">Teléfono</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">VE (+58)</span>
                      <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="" />
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label" for="imagen">Seleccionar imagen:</label>
                    <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*" >
                  </div>
                </div>
                <div class="mb-3 col-md-12">
                  <label for="direccion" class="form-label">Dirección</label>
                  <input class="form-control" type="text" id="direccion" name="direccion" value="" placeholder="" />
                </div>
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="10" cols="80"></textarea>
                  </div>
                </div>
    
                <input type="submit" class="btn btn-primary d-grid w-100" value="Guardar Información">
              </form>
              <p class="text-center">
                <span>Podrás editar esta información más adelante si lo deseas</span>
              </p>
    
            </div>
          </div>
        </div>
      </div>

      <!-- Register Card -->

@endsection
