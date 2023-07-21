@extends('layouts/contentNavbarLayout')

@section('title', ' Vertical Layouts - Forms')

@section('vendor-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/agentes/agentes.css') }}" />
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
<!-- Agrega la biblioteca Isotope -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inmobiliarias /</span> Mis agentes</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Ingrese los datos del nuevo agente</h5>
      <div class="card-body">
        <form class="form-publicar-propiedad" action="{{ route('agente.registrar') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="agente_crear" value="1">
          <input type="hidden" name="inmobiliaria_id" value="{{$user->inmobiliaria->id}}">
          <div class="row">

            <div class="col col-md-6 mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input class="form-control" type="text" name="nombre" id="nombre" value="{{old('nombre')}}"/>
                    @error('nombre')
                    @if(old('agente_crear'))
                        <label class="mensaje-error">{{ $message }}</label>
                    @endif
                    @enderror
            </div>
              
            <div class="col col-md-6 mb-3">
              <label for="apellido" class="form-label">Apellido</label>
                <input class="form-control" type="text" name="apellido" id="apellido" value="{{old('apellido')}}" />
              @error('apellido')
                @if(old('agente_crear'))
                  <label class="mensaje-error">{{ $message }}</label>
                 @endif
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">+58</span>
                <input type="text" class="form-control" name="telefono" id="telefono" aria-label="Username" value="{{old('telefono')}}"/>
              </div>
              @error('telefono')
                @if(old('agente_crear'))
                  <label class="mensaje-error">{{ $message }}</label>
                @endif
              @enderror
            </div>
              
              <div class="col col-md-6 mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                          <input class="form-control" type="text" name="email" id="email"  value="{{old('email')}}"/>
                @error('email')
                  @if(old('agente_crear'))
                    <label class="mensaje-error">{{ $message }}</label>
                  @endif
                @enderror
              </div>
              
              <div class="col col-md-12">
                <label for="imagen" class="form-label">Foto de perfil</label>
                          <input class="form-control" name="imagen"  type="file" id="imagen">
                    @error('imagen')
                    @if(old('agente_crear'))
                    <label class="mensaje-error">{{ $message }}</label>
                @endif
                    @enderror
              </div>
            </div>
            <br>
            <div class="mt-2 text-center">
              <button type="submit" class="btn btn-primary me-2">Publicar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<br>

<div class="row row-cols-1 row-cols-md-4 g-4 mb-5" id="agentes-grid">
  @foreach ($agentes as $agente)
  <div class="col grid-item">
    <a href="{{ route('ui-tooltips-popovers.show', ['id' => $agente->id]) }}">
      <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
        <img class="card-img-top" src="{{ asset('assets/img/agentes/' . $agente->imagen) }}" alt="Card image cap" />
      </a>
        <div class="card-body">
          <h5 class="card-title">{{ $agente->nombre }} {{ $agente->apellido }}</h5>
          <p class="card-inmo">{{ $agente->inmobiliaria->nombre }}</p>

          <div class="row">
            <div class="col-md-1 delete-button" style="margin-right: 2%">
              <button type="button" class="btn btn-icon btn-sm btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalborrar{{ $agente->id }}"
                data-id="{{ $agente->id }}">
                <span class="tf-icons bx bx-trash"></span>
              </button>
            </div>
            <div class="col-md-1 edit-button">
              <button type="button" class="btn btn-icon btn-sm btn-primary editar"
                data-bs-toggle="modal"
                data-bs-target="#modaleditar{{ $agente->id }}"
                data-id="{{ $agente->id }}">
                <span class="tf-icons bx bx-edit"></span>
               </button>
            </div>
          </div>
          
        </div>
      </div>
  </div>
  @include('content.form-layout.modaleditar')
  @endforeach
</div>

<!--/ Card layout -->
@endsection

@section('page-script')
<script>
  function addShadow(element) {
    element.classList.add("shadow-effect");
  }

  function removeShadow(element) {
    element.classList.remove("shadow-effect");
  }

  
@endsection
