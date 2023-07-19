@extends('layouts/contentNavbarLayout')

@section('title', 'Collapse - UI elements')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Publicaciones /</span> Realizar publicación</h4>

<!-- Collapse -->
<h5>Realizar nueva publicación</h5>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Ingrese los datos de la propiedad</h5>
      <div class="card-body">
        <form class="form-publicar-propiedad" action="" method="GET" enctype="multipart/form-data">
          <div class="row">

            <div class="col col-md-6">
              <label for="titulo" class="form-label">Titulo</label>
              <input name="titulo" class="form-control mb-3" type="text">
            </div>
              
            <div class="col col-md-6">
            <label for="contrato" class="form-label">Tipo de contrato</label>
              <select id="contrato" class="select2 form-select mb-3" name="contrato">
                <option value="">Seleccionar</option>
                <option value="venta">Venta</option>
                <option value="alquiler">Alquiler</option>
              </select>
            </div>
              <div class="col col-md-6">
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

              
              <div class="col col-md-6">
                <label for="dimension" class="form-label">Dimensiones</label>
                <input name="dimension" class="form-control mb-3" type="text" placeholder="m2">
              </div>
              
              <div class="col-md-6">
                <label for="precio" class="form-label">Precio</label>
                <input name="precio" class="form-control mb-3" type="text" placeholder="U$S">
              </div>

              <div class="mb-3 col-md-6">
                <label for="ciudad" class="form-label">Ciudad</label>
                <select id="ciudad" class="select2 form-select" onchange="mostrarSectores()" name="ciudad">
                  <option value="">Seleccionar Ciudad</option>
                  @foreach ($ciudads as $ciudad)
                  <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                  @endforeach
                </select>
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="sector" class="form-label">Sector</label>
                <select id="sector" class="select2 form-select" name="sector">
                  <option value="">Seleccionar Sector</option>
                 
                </select>
              </div>

               <div class="mb-3 col-md-6">
                <label for="agente" class="form-label">Agente inmobiliario</label>
                <select id="agente" class="select2 form-select" name="agente">
                  <option value="">Seleccionar Agente</option>
                  @foreach ($agentes as $agente)
                  <option value="{{$agente->id}}">{{$agente->id}}. {{$agente->nombre}} {{$agente->apellido}}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3 col-md-3">
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
              <div class="mb-3 col-md-3">
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
              <div class="mb-3 col-md-3">
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
              <div class="mb-3 col-md-3">
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

              <div class="col col-md-6">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" class="form-control mb-3" rows="10" cols="80">
                 </textarea>
              </div>

              <div class="col col-md-6">
                <label for="imagen">Seleccionar imagen:</label>
                <input class="form-control mb-3" type="file" id="imagen" name="imagen" accept="image/*" multiple>
              </div>
            </div>
            <div class="mt-2 text-center">
              <button type="submit" class="btn btn-primary me-2">Publicar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
   
@endsection

<!-- SCRIPT PARA MOSTRAR LOS SECTORES SEGUN LA CIUDAD -->
<script>
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
  }
</script>

