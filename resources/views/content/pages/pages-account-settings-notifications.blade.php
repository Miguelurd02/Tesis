@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Pages')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/favoritos/favoritos.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/cards.css') }}" />
@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Configuración de la Cuenta /</span> Favoritos
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link" href="{{url('/perfil/usuario')}}"><i class="bx bx-user me-1"></i> Cuenta</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-heart me-1"></i> Favoritos</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class='bx bx-shield-quarter me-1'></i> Seguridad</a></li>
    </ul>
  </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
  @if (count($propiedades) > 0)
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
            <div class="delete-button">
              <a href="{{ route('pages-account-settings-notifications.eliminarFavoritos', ['id' => $propiedad->id]) }}" class="btn-delete">
                <span class="material-icons">delete</span>
              </a>
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  @else
  <div class="center-text row">
    <div class="col md-12">
   <h3 class="no-favoritos">Aún no tienes ninguna propiedad agregada a favoritos</h3>
   
  </div>
  </div>
  @endif
</div>

@endsection

