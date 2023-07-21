@extends('layouts/blankLayout')

@section('title', 'Forgot Password Basic - Pages')

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
          <h4 class="mb-2">¿Olvidó su contraseña? </h4>
          <p class="mb-4">Para reestablecer su contraseña, puede comunicarse con un agente de soporte técnico de Laria, a través del siguiente correo, para ser atendido en el menor tiempo posible:</p>
          <div class="text-center">
            <h5>SOPORTE@LARIA.COM</h3>
              <br>
            <a href="{{url('auth/login-basic')}}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Volver al inicio de sesión
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection
