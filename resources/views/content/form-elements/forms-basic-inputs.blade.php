@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/perfil/perfil.css') }}" />
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Inmobiliaria /</span> Perfil de empresa
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Cuenta</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('/perfil/seguridad')}}"><i class='bx bx-shield-quarter me-1'></i> Seguridad</a></li>
    </ul>
  </div>
  </div>
  
    <div class="row">
    <div class="col-md-4">
      <div class="card mb-4 card-body text-center" bis_skin_checked="1">
        <img src="{{asset('assets/img/inmobiliarias/' . $user->inmobiliaria->imagen)}}" alt="user imagen" class="imagen-inmo">
        <h2 class="card-title-agente"> </h2>
          <p class=" mb-4 inmo-detail">{{$user->inmobiliaria->nombre}}</p>
      </div>
    </div> 

    <div class="col-md-8">
      <div class="card mb-4">
      <div class="card-body" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
          <h3>Información del perfil</h3>
          <div class="col-sm-12" bis_skin_checked="1">
            <p class="mb-0">RIF: J-{{$user->inmobiliaria->rif}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-12" bis_skin_checked="1">
            <p class="mb-0">Teléfono: +58-{{$user->inmobiliaria->telefono}} </p>
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
            <p class="mb-0">Dirección: {{$user->inmobiliaria->direccion}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-12" bis_skin_checked="1">
            <p class="mb-0">Descripción: {{$user->inmobiliaria->descripcion}}</p>
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
            <button class="btn btn-primary me-1 collapsed editar" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" data-id="{{$user->inmobiliaria->id}}" aria-expanded="false" aria-controls="collapseExample">
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
                  <form id="formAccountSettings" id="editarForm" action="{{route('inmobiliaria.editar',$user->inmobiliaria->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="editar_inmobiliaria" value="{{$user->inmobiliaria->id}}">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input class="form-control" type="text" id="email" name="email" value="{{ old('email',$user->email)}}" placeholder="" />
                        @error('email')
                          @if(old('editar_inmobiliaria') == $user->inmobiliaria->id)
                            <label class="mensaje-error">{{ $message }}</label>
                          @endif
                        @enderror
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text">VE (+58)</span>
                          <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono',$user->inmobiliaria->telefono)}}" placeholder="" />
                        </div>
                        @error('telefono')
                          @if(old('editar_inmobiliaria') == $user->inmobiliaria->id)
                            <label class="mensaje-error">{{ $message }}</label>
                          @endif
                        @enderror
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input class="form-control" type="text" id="direccion" name="direccion" value="{{ old('direccion',$user->inmobiliaria->direccion)}}" placeholder="" />
                        @error('direccion')
                          @if(old('editar_inmobiliaria') == $user->inmobiliaria->id)
                            <label class="mensaje-error">{{ $message }}</label>
                          @endif
                        @enderror
                      </div>
                      <div class="col col-md-6">
                        <label class="form-label" for="imagen">Seleccionar imagen de perfil:</label>
                        <input class="form-control mb-3" type="file" id="imagen" name="imagen">
                        @error('imagen')
                          @if(old('editar_inmobiliaria') == $user->inmobiliaria->id)
                            <label class="mensaje-error">{{ $message }}</label>
                          @endif
                        @enderror
                      </div>
                    </div>
                      <div class="col col-md-12">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" class="form-control mb-3" rows="5" cols="80">{{ old('descripcion',$user->inmobiliaria->descripcion)}}
                         </textarea>
                         @error('descripcion')
                          @if(old('editar_inmobiliaria') == $user->inmobiliaria->id)
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

  @if($errors->hasAny('email', 'telefono', 'imagen', 'direccion','descripcion') && old('editar_inmobiliaria') == $user->inmobiliaria->id)
  {{-- Se genera un input hidden para tener una referencia a cual botón apuntar para reabrir el modal en caso de error --}}
  <input type='hidden' id="error-handler" value="{{$user->inmobiliaria->id}}">

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