@extends('layouts/contentNavbarLayout')

@section('title', 'Tooltips and popovers - UI elements')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/cards.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/agentes/vistaagente.css') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> <span class="text-muted fw-light">Agentes</span> / {{$agentes->nombre}} {{$agentes->apellido}}</h4>



<div class="container">
   <div class="row">
    <div class="col-md-4">
      <div class="card-body-profile text-center" bis_skin_checked="1">
        <img src="{{ asset('assets/img/agentes/' . $agentes->imagen) }}" alt="agente imagen" class="card-img-top-agente">
        <h2 class="card-title-agente">{{$agentes->nombre}} {{$agentes->apellido}}</h2>
          <p class=" mb-4 inmo-detail"> <span class="material-symbols-outlined">apartment</span> {{$agentes->inmobiliaria->nombre}}</p>
        <div class="d-flex justify-content-center mb-2" bis_skin_checked="1">
          <a href="#propiedades" type="button" class="btn btn-primary ms-1" fdprocessedid="zcv1ay">Ver sus propiedades</a>
        </div>
  
      </div>
    </div>  
    <div class="col-md-8">
      <div class="card-body" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
          <h3>Informacion del perfil</h3>
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Correo electrónico</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0">{{$agentes->email}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Teléfono</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0">{{$agentes->telefono}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Sobre mi</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0">{{$agentes->descripcion}}</p>
          </div>
        </div>
      </div>
      <br>
     
    </div>
</div>

<hr>
<h1 id="propiedades" class="text-center">PROPIEDADES ASIGNADAS</h1>

<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
  @foreach ($propiedades as $propiedad)
  <div class="col">
    <a href="">
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
              <span class="material-icons">local_parking</span> {{$propiedad->estacionamiento}}
            </div>
          </div>
          <div class="price">U$S {{$propiedad->precio}}</div>
        </div>
      </div>
    </a>
  </div>
  @endforeach
</div>


</div>








@endsection