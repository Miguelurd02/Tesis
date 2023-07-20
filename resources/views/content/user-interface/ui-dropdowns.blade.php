@extends('layouts/contentNavbarLayout')

@section('title', 'Dropdowns - UI elements')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/apartado-inmobiliaria/inicio.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Publicaciones /</span> Ver publicaciones
</h4>

@foreach($propiedadesPorAgente as $nombreAgente => $propiedades)
@if($propiedades->count() > 0)
    <h2>{{ $nombreAgente }} </h2>
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
      @foreach ($propiedades as $propiedad)
      <div class="col">
        <a href="{{ route('ui-toasts.show', ['id' => $propiedad->id]) }}">
        <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
          <img class="card-img-top" src="{{ asset('assets/img/propiedades/' . $propiedad->imagen) }}" alt="Card image cap" />
        </a>
          <div class="card-body">
            <h5 class="card-title">{{$propiedad->titulo}}</h5>
            <p class="card-direccion">{{$propiedad->sector->nombre}}, {{$propiedad->sector->ciudad->nombre}}</p>
            <p class="card-construccion">{{$propiedad->dimension}}m<sup>2</sup> de construcción</p>
            <p class="card-description">{{$propiedad->descripcion}}</p>
            <div class="property-details">
              <div class="property-detail">
                <span class="material-icons">bathtub</span> {{$propiedad->banos}}
              </div>
              <div class="property-detail">
                <span class="material-icons">bed</span> {{$propiedad->habitaciones}}
              </div>
              <div class="property-detail">
                <span class="material-icons">apartment</span> {{$propiedad->plantas}}
              </div>
              <div class="property-detail">
                <span class="material-icons">directions_car</span> {{$propiedad->estacionamiento}}
              </div>
            </div>
            <div class="price">{{$propiedad->precio}} U$S</div>
              <div class="row">
                <div class="col-md-1 delete-button" style="margin-right: 2%">
                  <button type="button" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalborrar{{$propiedad->id}}" data-id="{{$propiedad->id}}">
                    <span class="tf-icons bx bx-trash"></span>
                  </button>
                </div>
                <div class="col-md-1 edit-button">
                  <button type="button" class="btn btn-icon btn-sm btn-primary editar" data-bs-toggle="modal" data-bs-target="#modaleditar{{$propiedad->id}}" data-id="{{$propiedad->id}}">
                    <span class="tf-icons bx bx-edit"></span>
                  </button>
                </div>
              </div>
          </div>
        </div>
      
      </div>
      @include('content.tables.modalinmu')
      @endforeach
      </div>
      @endif
@endforeach



@endsection
