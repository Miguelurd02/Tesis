@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
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
          <h4 class="mb-2">¡Bienvenido a {{config('variables.templateName')}}! </h4>
          <p class="mb-4">Por favor inicia sesión para comenzar</p>

          <form id="formAuthentication" class="mb-3" action="/auth/login-basic" method="POST">
            @csrf
            @include('content.authentications.mensaje-error')
            <div class="mb-3">
              <label for="email" class="form-label">Correo eletrónico / Nombre de usuario</label>
              <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="Ingresa tu correo eletrónico o usuario" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Contraseña</label>
                <a href="{{url('auth/forgot-password-basic')}}">
                  <small>¿Has olvidado tu contraseña?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Recuérdame
                </label>
              </div>
            </div>
            <div class="mb-3">
              <input type="submit" class="btn btn-primary d-grid w-100" value="Iniciar Sesión">
            </div>
          </form>

          <p class="text-center">
            <span>¿Eres nuevo en nuestra plataforma?</span>
            <a href="{{url('auth/register-basic')}}">
              <span>Registrate</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
