@extends('layouts/contentNavbarLayout')

@section('title', 'Inmobiliarias')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/inmobiliarias/inmobiliarias.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<!-- Agrega la biblioteca Isotope -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> Inmobiliarias</h4>

<!-- Search bar -->
<div class="mb-4">
  <input type="text" id="search-input" class="form-control" placeholder="Buscar inmobiliaria">
</div>

<!-- Grid Card -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5" id="inmobiliarias-grid">
  @foreach ($inmobiliarias as $inmobiliaria)
  <div class="col grid-item">
    <a href="{{ route('ui-typography.show', ['id' => $inmobiliaria->id]) }}">
      <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
        <img class="card-img-top" src="{{ asset('assets/img/inmobiliarias/' . $inmobiliaria->imagen) }}" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">{{ $inmobiliaria->nombre }}</h5>
          <p class="card-rif">J-{{ $inmobiliaria->rif }}</p>
        </div>
      </div>
    </a>
  </div>
  @endforeach
</div>
@endsection

@section('page-script')
<script>
  function addShadow(element) {
    element.classList.add("shadow-effect");
  }

  function removeShadow(element) {
    element.classList.remove("shadow-effect");
  }

  // Inicializar Isotope después de que se cargue la página
  $(window).on('load', function() {
     var inmobiliariasGrid = $('#inmobiliarias-grid');
    inmobiliariasGrid.isotope({
      itemSelector: '.grid-item',
      layoutMode: 'fitRows'
    });
  });

  // Manejar el evento de búsqueda en vivo
  document.getElementById('search-input').addEventListener('input', function() {
    var searchQuery = this.value.toLowerCase().trim();
    var inmobiliariasGrid = $('#inmobiliarias-grid');

    inmobiliariasGrid.isotope({ filter: function() {
      var inmobiliariaNombre = $(this).find('.card-title').text().toLowerCase();
      var inmobiliariaDescripcion = $(this).find('.card-description').text().toLowerCase();

      return inmobiliariaNombre.includes(searchQuery) || inmobiliariaDescripcion.includes(searchQuery);
    }});
  });
</script>
@endsection



  
 
 
  
 

<!--/ Card layout -->

<script>
  function addShadow(element) {
  element.classList.add("shadow-effect");
}

function removeShadow(element) {
  element.classList.remove("shadow-effect");
}

</script>
