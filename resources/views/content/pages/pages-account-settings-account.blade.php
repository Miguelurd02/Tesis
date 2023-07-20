@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
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
          <p class=" mb-4 inmo-detail">{{$user->username}}</p>
      </div>
    </div> 

    <div class="col-md-8">
      <div class="card mb-4">
      <div class="card-body" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
          <h3>Información del perfil</h3>
          <div class="col-sm-12" bis_skin_checked="1">
            <p class="mb-0">Nombre: {{$user->suscriptor->nombre}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-12" bis_skin_checked="1">
            <p class="mb-0">Apellido: {{$user->suscriptor->apellido}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-12" bis_skin_checked="1">
            <p class="mb-0">Correo electrónico: {{$user->email}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-12" bis_skin_checked="1">
            <p class="mb-0">Teléfono: +58-{{$user->suscriptor->telefono}}</p>
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
            <button class="btn btn-primary me-1 collapsed editar" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" data-id="{{$user->suscriptor->id}}">
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
                  <form id="formAccountSettings" id="editarForm" action="{{route('suscriptor.editar',$user->suscriptor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="editar_suscriptor" value="{{$user->suscriptor->id}}">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre',$user->suscriptor->nombre)}}" autofocus />
                        @error('nombre')
                          @if(old('editar_suscriptor') == $user->suscriptor->id)
                            <label class="mensaje-error">{{ $message }}</label>
                          @endif
                        @enderror
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input class="form-control" type="text" name="apellido" id="apellido" value="{{ old('apellido',$user->suscriptor->apellido)}}" />
                        @error('apellido')
                          @if(old('editar_suscriptor') == $user->suscriptor->id)
                            <label class="mensaje-error">{{ $message }}</label>
                          @endif
                        @enderror
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input class="form-control" type="text" id="email" name="email" value="{{ old('email',$user->email)}}" placeholder="" />
                        @error('email')
                          @if(old('editar_suscriptor') == $user->suscriptor->id)
                            <label class="mensaje-error">{{ $message }}</label>
                          @endif
                        @enderror
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text">VE (+58)</span>
                          <input type="text" id="telefono" name="telefono" value="{{ old('telefono',$user->suscriptor->telefono)}}" class="form-control" placeholder="" />
                        </div>
                        @error('telefono')
                          @if(old('editar_suscriptor') == $user->suscriptor->id)
                            <label class="mensaje-error">{{ $message }}</label>
                          @endif
                        @enderror
                      </div>
                      
                    </div>
                    <div class="mt-2">
                      <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
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

  @if($errors->hasAny('nombre', 'apellido', 'email', 'telefono') && old('editar_suscriptor') == $user->suscriptor->id)
  {{-- Se genera un input hidden para tener una referencia a cual botón apuntar para reabrir el modal en caso de error --}}
  <input type='hidden' id="error-handler" value="{{$user->suscriptor->id}}">

  <script type="application/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Se busca el value contenido en el input hidden (el id del suscriptor)
      const target = document.querySelector('#error-handler');

      // Se busca el botón con la clase "editar" y el atributo data-id con el id del suscriptor y se aprieta
      document.querySelector(`button.editar[data-id="${target.value}"]`).click();
    });
  </script>
@endif

@endsection
