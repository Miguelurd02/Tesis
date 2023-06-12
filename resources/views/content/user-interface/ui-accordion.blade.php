@extends('layouts/contentNavbarLayout')

@section('title', 'Propiedades')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/cards.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> Propiedades</h4>


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
      <div class="price">{{$propiedad->precio}}</div>
    </div>
  </div>
</a>
</div>

@endforeach
  
 
 
  
 

<!--/ Card layout -->
@endsection
<script>
  function addShadow(element) {
  element.classList.add("shadow-effect");
}

function removeShadow(element) {
  element.classList.remove("shadow-effect");
}

</script>
