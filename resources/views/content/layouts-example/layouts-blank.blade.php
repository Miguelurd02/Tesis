@extends('layouts/blankLayout')

@section('title', 'Blank layout - Layouts')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <img src="{{ asset('assets/img/img2/agente-inmobiliario.png')}}" width=30>
            <a href="{{url('/')}}" class="app-brand-link gap-2">
    
              <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Completa tu perfil</h4>
          <p class="mb-4">Proporciona la información a continuación, esta será necesaria para poder ser contactado por nuestros agentes inmobiliarios.</p>
         

          <form id="formAuthentication" class="mb-3" action="/auth/register-basic" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Ingresa tu apellido">
              </div>
            <div class="mb-3">
                <label class="form-label" for="phoneNumber">Teléfono</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">VE (+58)</span>
                  <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="" />
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
    <!-- Register Card -->
  </div>
</div>
</div>
@endsection
