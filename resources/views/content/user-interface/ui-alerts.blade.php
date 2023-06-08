@extends('layouts/contentNavbarLayout')

@section('title', 'Inmobiliarias')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/inmobiliarias/inmobiliarias.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> Inmobiliarias</h4>


<!-- Grid Card -->
  <div class="row mb-5" bis_skin_checked="1">

      @foreach ($inmobiliarias as $inmobiliaria)
      <div class="col-md-6" bis_skin_checked="1" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
        <a href="">
      <div class="card mb-3" bis_skin_checked="1">
        <div class="row g-0" bis_skin_checked="1">
          <div class="col-md-4" bis_skin_checked="1">
            <img class="card-img card-img-left" src="{{ asset('assets/img/inmobiliarias/' . $inmobiliaria->imagen) }}" alt="Card image">
          </div>
          <div class="col-md-8" bis_skin_checked="1">
            <div class="card-body" bis_skin_checked="1">
              <h5 class="card-title">{{$inmobiliaria->nombre}}</h5>
              <p class="card-description">{{$inmobiliaria->descripcion}}
              </p>
            </div>
          </div>
        </div>
      </div>
      </a> 
      </div>
      @endforeach
    
  </div>

  
 
 
  
 

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
