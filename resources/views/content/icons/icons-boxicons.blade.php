@extends('layouts/contentNavbarLayout')

@section('title', 'Boxicons - Icons')

@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/css/iniciosuscriptor/filtro.css') }}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h1 class="card-header">Filtro de búsqueda</h5>
      <!-- FILTRO -->
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
           <!-- COLUMNAS PARA LOS CAMPOS -->
          <div class="row">
             
            <div class="mb-3 col-md-3">
              <label for="tipo-busqueda" class="form-label">Tipo de búsqueda</label>
              <select id="tipo-busqueda" class="select2 form-select">
                <option value="">Seleccionar</option>
                <option value="venta">Venta</option>
                <option value="alquiler">Alquiler</option>
              </select>
            </div>

            <div class="mb-3 col-md-3">
              <label for="tipo-inmueble" class="form-label">Tipo de Inmueble</label>
              <select id="tipo-inmueble" class="select2 form-select">
                <option value="">Seleccionar</option>
                <option value="apartamento">Apartamento</option>
                <option value="casa">Casa</option>
                <option value="terreno">Terreno</option>
                <option value="local_comercial">Local Comercial</option>
                <option value="oficinas">Oficina</option>  
              </select>
            </div>

            <div class="mb-3 col-md-3">
              <label for="ciudad" class="form-label">Ciudad</label>
              <select id="ciudad" class="select2 form-select" onchange="updateSectores()">
                <option value="">Seleccionar Ciudad</option>
                <option value="caracas">Caracas</option>
                <option value="valencia">Valencia</option>
                <option value="maracaibo">Maracaibo</option>
                <!-- Agregar más opciones de ciudades aquí -->
              </select>
            </div>

            <div class="mb-3 col-md-3">
              <label for="sector" class="form-label">Sector</label>
              <select id="sector" class="select2 form-select">
                <option value="">Seleccionar Sector</option>
                <option value="caracas">Caracas</option>
                <option value="valencia">Valencia</option>
                <option value="maracaibo">Maracaibo</option>
                <!-- Agregar más opciones de ciudades aquí -->
              </select>
            </div>

            <div class="mb-3 col-md-2">
              <label class="form-label" for="rango-dimension">Rango de área</label>
             
              <input type="text" class="form-control" id="rango-dimension-desde" name="rango-dimension-desde" placeholder="Desde (m2)" oninput="formatoSeparadores('rango-dimension-desde')"/>
              
              <p></p>

              <input type="text" class="form-control" id="rango-dimension-hasta" name="rango-dimension-hasta" placeholder="Hasta (m2)" oninput="formatoSeparadores('rango-dimension-hasta')" />

            </div>

            <div class="mb-3 col-md-2">
              <label class="form-label" for="rango-precio">Rango de precio</label>

              <input type="text" class="form-control" id="rango-precio-desde" name="rango-precio-desde" placeholder="Desde (USD)" oninput="formatoSeparadores('rango-precio-desde')" />

              <p></p>

              <input type="text" class="form-control" id="rango-precio-hasta" name="rango-precio-hasta" placeholder="Hasta (USD)" oninput="formatoSeparadores('rango-precio-hasta')"/>
            </div>
           
            <div class="mb-3 col-md-1">
              <label for="plantas" class="form-label">N° Plantas</label>
              <select id="n-plantas" class="select2 form-select">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 o más</option>
              </select>
            </div>
            <div class="mb-3 col-md-1">
              <label for="habitaciones" class="form-label">N° Habita</label>
              <select id="n-habitaciones" class="select2 form-select">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 o más</option>
              </select>
            </div>
            <div class="mb-3 col-md-1">
              <label for="baños" class="form-label">N° Baños</label>
              <select id="n-baños" class="select2 form-select">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 o más</option>
              </select>
            </div>
            <div class="mb-3 col-md-1">
              <label for="garage" class="form-label">N° Garage</label>
              <select id="n-garage" class="select2 form-select">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 o más</option>
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

  <!-- SCRIPTS USADOS -->

    <!--SCRIPT.1 PARA COLOCARLE EL FORMATO DE MILESIMAS A LOS CAMPOS DE LOS RANGOS DIMENSION Y PRECIO -->
<script>
  function formatoSeparadores(idCampo) {
    var inputNumero = document.getElementById(idCampo);
    var numero = inputNumero.value;

    // Remover los separadores de miles existentes
    numero = numero.replace(/,/g, "");

    // Aplicar el formato con separadores de miles
    numero = numberWithCommas(numero);

    // Actualizar el valor del campo de entrada
    inputNumero.value = numero;
  }

  function numberWithCommas(numero) {
    return numero.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
</script>

 <!-- SCRIPT.2 PARA MOSTRAR LOS SECTORES SEGUN LA CIUDAD -->
<script>
  function updateSectores() {
    var ciudadSelector = document.getElementById("ciudad");
    var sectorSelector = document.getElementById("sector");

    // Limpiar opciones anteriores
    sectorSelector.innerHTML = '<option value="">Seleccionar Sector</option>';

    // Obtener la ciudad seleccionada
    var ciudadSeleccionada = ciudadSelector.value;

    // Verificar la ciudad seleccionada y agregar los sectores correspondientes
    if (ciudadSeleccionada === "caracas") {
      sectorSelector.innerHTML += `
        <option value="chacao">Chacao</option>
        <option value="altamira">Altamira</option>
        <option value="las-mercedes">Las Mercedes</option>
      `;
    } else if (ciudadSeleccionada === "valencia") {
      sectorSelector.innerHTML += `
        <option value="naguanagua">Naguanagua</option>
        <option value="el-quiz">El Quiz</option>
        <option value="prebo">Prebo</option>
      `;
    } else if (ciudadSeleccionada === "maracaibo") {
      sectorSelector.innerHTML += `
        <option value="el-milagro">El Milagro</option>
        <option value="la-limpia">La Limpia</option>
        <option value="tierra-negra">Tierra Negra</option>
      `;
    }
    // Agrega más condiciones según tus ciudades y sectores

    // Opcional: Puedes deshabilitar el selector de sectores si no hay ciudad seleccionada
    sectorSelector.disabled = ciudadSeleccionada === "";
  }
</script>
@endsection
