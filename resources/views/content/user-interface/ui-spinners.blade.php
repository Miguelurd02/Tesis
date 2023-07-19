@extends('layouts/blankLayout')

@section('title', 'Spinners - UI elements')


@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Forgot Password -->
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
          <h4 class="mb-2">Cambiar Contraseña </h4>
          <form id="formAuthentication" class="mb-3" action="javascript:void(0)" method="GET">
            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Nueva Contraseña</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Confirmar nueva contraseña</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100">Aceptar</button>
          </form>
       
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection
