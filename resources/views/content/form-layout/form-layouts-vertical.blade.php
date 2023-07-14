@extends('layouts/contentNavbarLayout')

@section('title', ' Vertical Layouts - Forms')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/agentes/agentes.css') }}" />
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
<!-- Agrega la biblioteca Isotope -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inmobiliarias /</span> Mis agentes</h4>

<!-- Search bar -->
<div class="mb-4">
  <input type="text" id="search-input" class="form-control" placeholder="Buscar agente">
</div>

<!-- Grid Card -->
<div class="row row-cols-1 row-cols-md-4 g-4 mb-5" id="agentes-grid">
  @foreach ($agentes as $agente)
  <div class="col grid-item">
    <a href="{{ route('ui-tooltips-popovers.show', ['id' => $agente->id]) }}">
      <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
        <img class="card-img-top" src="{{ asset('assets/img/agentes/' . $agente->imagen) }}" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">{{ $agente->nombre }} {{ $agente->apellido }}</h5>
          <p class="card-inmo">{{ $agente->inmobiliaria->nombre }}</p>
        </div>
      </div>
    </a>
  </div>
  @endforeach
</div>

<!--/ Card layout -->
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
    var agentesGrid = $('#agentes-grid');
    agentesGrid.isotope({
      itemSelector: '.grid-item',
      layoutMode: 'fitRows'
    });
  });

  // Manejar el evento de búsqueda en vivo
  document.getElementById('search-input').addEventListener('input', function() {
    var searchQuery = this.value.toLowerCase().trim();
    var agentesGrid = $('#agentes-grid');

    agentesGrid.isotope({ filter: function() {
      var agenteNombre = $(this).find('.card-title').text().toLowerCase();
      var agenteInmobiliaria = $(this).find('.card-inmo').text().toLowerCase();

      return agenteNombre.includes(searchQuery) || agenteInmobiliaria.includes(searchQuery);
    }});
  });
</script>
@endsection
