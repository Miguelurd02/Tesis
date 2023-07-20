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
         

          <form id="formAuthentication" class="mb-3" action="{{route('detalles.inmobiliaria')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
            <div class="row">
              <div class="col-md-12 mb-3">
                  <label for="nombre" class="form-label">Nombre de la Inmobiliaria</label>
                  <input type="text" class="form-control" id="nombre"
                      value="{{ old('nombre') }}" name="nombre"
                      placeholder="Ingresa la inmobiliaria...">
                  @error('nombre')
                      <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
                  @enderror
              </div>
              <div class="col-md-12 mb-3">
                  <label for="rif" class="form-label">RIF</label>
                  <div class="input-group input-group-merge">
                      <span class="input-group-text">J-</span>
                      <input type="text" id="rif" name="rif" value="{{ old('rif') }}"
                          class="form-control" placeholder="" />
                  </div>
                  @error('rif')
                      <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
                  @enderror
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 mb-3">
                  <label class="form-label" for="telefono">Teléfono</label>
                  <div class="input-group input-group-merge">
                      <span class="input-group-text">VE (+58)</span>
                      <input type="text" id="telefono" name="telefono"
                          value="{{ old('telefono') }}" class="form-control" placeholder="" />
                  </div>
                  @error('telefono')
                      <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
                  @enderror
              </div>
              <div class="col-md-12 mb-3">
                  <label class="form-label" for="imagen">Seleccionar imagen:</label>
                  <input class="form-control" name="imagen" type="file" id="formFile">
                  @error('imagen')
                      <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
                  @enderror
              </div>
          </div>
          <div class="mb-3 col-md-12">
              <label for="direccion" class="form-label">Dirección</label>
              <input class="form-control" type="text" id="direccion" name="direccion"
                  value="{{ old('direccion') }}" placeholder="" />
              @error('direccion')
                  <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
              @enderror
          </div>
          <div class="row">
              <div class="col-md-12 mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea name="descripcion" class="form-control" rows="10" cols="80">{{ old('descripcion') }}</textarea>
                  @error('descripcion')
                      <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
                  @enderror
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
