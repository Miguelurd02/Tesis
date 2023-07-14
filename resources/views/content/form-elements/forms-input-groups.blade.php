@extends('layouts/contentNavbarLayout')

@section('title', 'Input groups - Forms')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/apartado-inmobiliaria/inicio.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inmobiliarias /</span> Inicio</h4>

<div class="row">
  <!-- Basic -->
  <div class="col-md-12  text-center">
   <h1 class="bienvenido">Bienvenida inmobiliaria {{$inmobiliaria->nombre}}</h1>
   <a href="{{url('/publicacion/registrar')}}">
   <button type="submit" class="btn btn-primary me-2">Realizar Publicación</button>
  </a>
  </div>
</div>
<br>
<div class="row">
  <!-- Basic -->
  <div class="col-md-12 center-text">
   <h1 class="ultimas-publicaciones">Últimas publicaciones</h1>
  </div>
</div>
<div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
  @foreach ($propiedades as $propiedad)
  <div class="col">
    <a href="{{ route('ui-toasts.show', ['id' => $propiedad->id]) }}">
    <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
      <img class="card-img-top" src="{{ asset('assets/img/propiedades/' . $propiedad->imagen) }}" alt="Card image cap" />
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
        <div class="price">{{$propiedad->precio}}</div>
      </div>
    </div>
  </a>
  </div>
  
  @endforeach
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <a href="{{url('/publicacion/ver')}}">
      <h2 class="text-center">Ver más</h2>
      </a>
    </div>
  </div>
@endsection
