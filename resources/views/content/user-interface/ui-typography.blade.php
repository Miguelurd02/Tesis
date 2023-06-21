@extends('layouts/contentNavbarLayout')

@section('title', 'Inmobiliarias')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/cards.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/inmobiliarias/vistainmo.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> <span class="text-muted fw-light">Inmobiliarias</span> / {{$inmobiliaria->nombre}}</h4>



<div class="container">
   <div class="row">
    <div class="col-md-4">
      <div class="card-body-profile text-center" bis_skin_checked="1">
        <img src="{{ asset('assets/img/inmobiliarias/' . $inmobiliaria->imagen) }}" alt="inmobiliaria imagen" class="rounded-circle img-fluid" style="width: 200px;">
        <h2 class="my-3">{{$inmobiliaria->nombre}}</h2>
        <p class="text-muted mb-1">{{$inmobiliaria->rif}}</p>
        <p class="text-muted mb-4"> <span class="material-icons">location_on</span> {{$inmobiliaria->direccion}}</p>
        <div class="d-flex justify-content-center mb-2" bis_skin_checked="1">
          <a href="#propiedades" type="button" class="btn btn-primary ms-1" fdprocessedid="zcv1ay">Ver propiedades</a>
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
            <p class="text-muted mb-0">{{$inmobiliaria->user->email}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Teléfono</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0">{{$inmobiliaria->telefono}}</p>
          </div>
        </div>
        <hr>
        <div class="row" bis_skin_checked="1">
          <div class="col-sm-3" bis_skin_checked="1">
            <p class="mb-0">Sobre nosotros</p>
          </div>
          <div class="col-sm-9" bis_skin_checked="1">
            <p class="text-muted mb-0">{{$inmobiliaria->descripcion}}</p>
          </div>
        </div>
      </div>
      <br>
      <div class="row row-cols-1 row-cols-md-5 g-4 mb-5">
        @foreach ($inmobiliaria->agentes->take(5) as $agente)
            <div class="col center">
              <div class="agent-container">
                <img class="agent-photo" src="{{ asset('assets/img/agentes/' . $agente->imagen) }}" alt="Agent Photo">
              </div>
            </div>
        @endforeach
    </div>
    </div>
</div>
<hr>
<h1 id="propiedades" class="text-center">Propiedades</h1>
<hr>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    @foreach ($inmobiliaria->agentes as $agente)
        @foreach ($agente->propiedades as $propiedad)
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
              <div class="price">{{$propiedad->precio}}</div>
            </div>
          </div>
        </a>
        </div>
        
        @endforeach
    @endforeach
</div>








@endsection