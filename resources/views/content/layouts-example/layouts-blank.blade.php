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
         

          <form id="formAuthentication" class="mb-3" action="{{route('detalles.suscriptor')}}" method="POST">
            @csrf
            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Ingresa tu nombre">
              @error('nombre')
                <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
              @enderror
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}" placeholder="Ingresa tu apellido">
                @error('apellido')
                <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
              @enderror
              </div>
            <div class="mb-3">
                <label class="form-label" for="telefono">Teléfono</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">VE (+58)</span>
                  <input type="text" id="telefono" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="" />
                </div>
                @error('telefono')
                    <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
                  @enderror
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
