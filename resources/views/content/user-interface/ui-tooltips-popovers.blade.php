@extends('layouts/contentNavbarLayout')

@section('title', 'Tooltips and popovers - UI elements')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/cards.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/inmobiliarias/vistaagente.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> <span class="text-muted fw-light">Agentes</span> / {{$agentes->nombre}} {{$agentes->apellido}}</h4>



<div class="container">
   <div class="row">
    <div class="col-md-4">
      <div class="card-body-profile text-center" bis_skin_checked="1">
        <img src="{{ asset('assets/img/agentes/' . $agentes->imagen) }}" alt="inmobiliaria imagen" class="rounded-circle img-fluid" style="width: 200px;">
        <h2 class="my-3">{{$agentes->nombre}} {{$agentes->apellido}}</h2>
        <p class="text-muted mb-1"></p>
        <p class="text-muted mb-4"> 
    
        <p>{{$agentes->inmobiliaria->nombre}}</p>
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
            <p class="mb-0">Correo Electronico</p>
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

</div>








@endsection