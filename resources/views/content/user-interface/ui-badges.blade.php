@extends('layouts/contentNavbarLayout')

@section('title', 'Badges - UI elements')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/agentes/agentes.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> Agentes inmobiliarios</h4>


<!-- Grid Card -->
 <div class="row mb-5">
  @foreach ($agentes as $agente)
  <div class="col-md-6" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
    <a href="">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="card-img card-img-left" src="{{ asset('assets/img/agentes/' . $agente->imagen) }}" alt="Card image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$agente->nombre}} {{$agente->apellido}}</h5>
              <h5 class="card-inmo">{{$agente->inmobiliaria->nombre}}</h5>
            </div>
          </div>
        </div>
      </div>
    </a> 
  </div>
  @endforeach
</div>
<br>


  
 
 
  
 

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

