@extends('layouts/contentNavbarLayout')

@section('title', 'Propiedades')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/cards.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> Propiedades</h4>
 <!-- FILTRO -->
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h1 class="card-header">Filtro de búsqueda</h1>
      <div class="card-body">
        <form id="formAccountSettings" action="{{ route('propiedades.buscar') }}" method="GET">
           <!-- COLUMNAS PARA LOS CAMPOS -->
          <div class="row">
             
            <div class="mb-3 col-md-3">
              <label for="contrato" class="form-label">Tipo de búsqueda</label>
              <select id="contrato" class="select2 form-select" name="contrato">
                <option value="">Seleccionar</option>
                <option value="venta">Venta</option>
                <option value="alquiler">Alquiler</option>
              </select>
            </div>

            <div class="mb-3 col-md-3">
              <label for="tipo-inmueble" class="form-label">Tipo de Inmueble</label>
              <select id="tipo-inmueble" class="select2 form-select" name="tipo">
                <option value="">Seleccionar</option>
                <option value="apartamento">Apartamento</option>
                <option value="casa">Casa</option>
                <option value="terreno">Terreno</option>
                <option value="local">Local Comercial</option>
                <option value="oficina">Oficina</option>  
              </select>
            </div>

            <div class="mb-3 col-md-3">
              <label for="ciudad" class="form-label">Ciudad</label>
              <select id="ciudad" class="select2 form-select" onchange="mostrarSectores()" name="ciudad">
                <option value="">Seleccionar Ciudad</option>
                @foreach ($ciudads as $ciudad)
                <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3 col-md-3">
              <label for="sector" class="form-label">Sector</label>
              <select id="sector" class="select2 form-select" name="sector">
                <option value="">Seleccionar Sector</option>
               
              </select>
            </div>

            <div class="mb-3 col-md-2">
              <label class="form-label" for="rango-dimension">Rango de área</label>
             
              <input type="number" class="form-control" id="rango-dimension-desde" name="rango-dimension-desde" placeholder="Desde (m2)" />
              
              <p></p>

              <input type="number" class="form-control" id="rango-dimension-hasta" name="rango-dimension-hasta" placeholder="Hasta (m2)" />

            </div>

            <div class="mb-3 col-md-2">
              <label class="form-label" for="rango-precio">Rango de precio</label>

              <input type="number" class="form-control" id="rango-precio-desde" name="rango-precio-desde" placeholder="Desde (USD)" />

              <p></p>

              <input type="number" class="form-control" id="rango-precio-hasta" name="rango-precio-hasta" placeholder="Hasta (USD)" oninput="formatoSeparadores('rango-precio-hasta')"/>
            </div>
           

            <div class="mb-3 col-md-1">
              <label for="plantas" class="form-label">N° Plantas</label>
              <select id="n-plantas" class="select2 form-select" name="plantas">
                <option value="">Nº</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 o más</option>
              </select>
            </div>
            <div class="mb-3 col-md-1">
              <label for="habitaciones" class="form-label">N° Habita</label>
              <select id="n-habitaciones" class="select2 form-select" name="habitaciones">
                <option value="">Nº</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 o más</option>
              </select>
            </div>
            <div class="mb-3 col-md-1">
              <label for="baños" class="form-label">N° Baños</label>
              <select id="n-baños" class="select2 form-select" name="banos">
                <option value="">Nº</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 o más</option>
              </select>
            </div>
            <div class="mb-3 col-md-1">
              <label for="garage" class="form-label">N° Garage</label>
              <select id="n-garage" class="select2 form-select" name="estacionamiento">
                <option value="">Nº</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 o más</option>
              </select>
            </div>

            <div class="mb-3 col-md-3">
              <label for="inmobiliaria" class="form-label">Inmobiliaria</label>
              <select id="inmobiliaria" class="select2 form-select" name="inmobiliaria">
                <option value="">Seleccionar</option>
                @foreach ($inmobiliarias as $inmobiliaria)
                <option value="{{$inmobiliaria->id}}">{{$inmobiliaria->nombre}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Buscar</button>
            <button type="reset" class="btn btn-outline-secondary">Reestablecer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<hr>
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
      <div class="price">U$S <?= number_format($propiedad->precio, 2, ',', '.'); ?></div>
    </div>
  </div>
</a>
</div>
@endforeach
@else
<div class="center-text row">
  <div class="col md-12" style=" position: absolute;
    padding-top: 50px;
    padding-left:370px ;
   
    
  }">
 <h3 class="no-favoritos">Ninguna propiedad coincide con su busqueda...</h3>
</div>
</div>
@endif
</div>

@endsection
 
  <!-- SCRIPTS USADOS -->

<!-- RECARGAR ELEMENTOS DEL FILTRO -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    function cargarFiltrosDesdeURL() {
      const urlParams = new URLSearchParams(window.location.search);

      // Obtener los parámetros del filtro de la URL
      const contrato = urlParams.get('contrato');
      const tipoInmueble = urlParams.get('tipo');
      const ciudad = urlParams.get('ciudad');
      const sector = urlParams.get('sector');
      const rangoDimensionDesde = urlParams.get('rango-dimension-desde');
      const rangoDimensionHasta = urlParams.get('rango-dimension-hasta');
      const rangoPrecioDesde = urlParams.get('rango-precio-desde');
      const rangoPrecioHasta = urlParams.get('rango-precio-hasta');
      const plantas = urlParams.get('plantas');
      const habitaciones = urlParams.get('habitaciones');
      const banos = urlParams.get('banos');
      const estacionamiento = urlParams.get('estacionamiento');
      const inmobiliaria = urlParams.get('inmobiliaria');
      // Otros campos

      // Establecer los valores en los elementos "select" correspondientes
      document.getElementById('contrato').value = contrato || '';
      document.getElementById('tipo-inmueble').value = tipoInmueble || '';
      document.getElementById('ciudad').value = ciudad || '';
      document.getElementById('rango-dimension-desde').value = rangoDimensionDesde || '';
      document.getElementById('rango-dimension-hasta').value = rangoDimensionHasta || '';
      document.getElementById('rango-precio-desde').value = rangoPrecioDesde || '';
      document.getElementById('rango-precio-hasta').value = rangoPrecioHasta || '';
      document.getElementById('n-plantas').value = plantas || '';
      document.getElementById('n-habitaciones').value = habitaciones || '';
      document.getElementById('n-baños').value = banos || '';
      document.getElementById('n-garage').value = estacionamiento || '';
      document.getElementById('inmobiliaria').value = inmobiliaria || '';
     
      mostrarSectores(); // Llamada a la función para mostrar los sectores después de cargar los valores
    }

    function mostrarSectores() {
      var ciudadId = document.getElementById('ciudad').value;
      var sectorSelect = document.getElementById('sector');
      sectorSelect.innerHTML = ''; // Limpiar opciones anteriores
      sectorSelect.innerHTML = '<option value="">Seleccionar Sector</option>'; // Opción predeterminada
      @foreach($ciudads as $ciudad)
          if (ciudadId === "{{ $ciudad->id }}") {
              @foreach($ciudad->sectores as $sector)
                  sectorSelect.innerHTML += '<option value="{{ $sector->id }}">{{ $sector->nombre }}</option>';
              @endforeach
          }
      @endforeach

        // Obtener el valor del sector de la URL
        var sectorIdEnURL = getUrlParameter('sector');
      if (sectorIdEnURL) {
        // Seleccionar automáticamente el sector que coincide con el valor en la URL
        sectorSelect.value = sectorIdEnURL;
      }
    }

    // Llamada para cargar los valores al cargar la página
    cargarFiltrosDesdeURL();

    // Agregar el evento de escucha para el cambio de ciudad y llamar a la función mostrarSectores
    document.getElementById('ciudad').addEventListener('change', mostrarSectores);
  });

   // Función para obtener el valor de un parámetro en la URL
   function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  }
</script>


<!--/ Card layout -->
<script>
  function addShadow(element) {
  element.classList.add("shadow-effect");
}

function removeShadow(element) {
  element.classList.remove("shadow-effect");
}

</script>


