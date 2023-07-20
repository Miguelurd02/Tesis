@extends('layouts/contentNavbarLayout')

@section('title', 'Collapse - UI elements')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Publicaciones /</span> Realizar publicación</h4>

<!-- Collapse -->
<h5>Realizar nueva publicación</h5>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Ingrese los datos de la propiedad</h5>
      <div class="card-body">
        <form class="form-publicar-propiedad" action="{{ route('propiedad.registrar') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">

            <div class="col col-md-6 mb-3">
              <label for="titulo" class="form-label">Titulo</label>
              <input name="titulo" class="form-control" value="{{old('titulo')}}" type="text">
              @error('titulo')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
            </div>
              
            <div class="col col-md-6 mb-3">
            <label for="contrato" class="form-label">Tipo de contrato</label>
              <select id="contrato" class="select2 form-select " value="{{old('contrato')}}" name="contrato">
                <option value="">Seleccionar</option>
                <option value="venta">Venta</option>
                <option value="alquiler">Alquiler</option>
              </select>
              @error('contrato')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
            </div>
              <div class="col col-md-6">
                <label for="tipo" class="form-label">Tipo de Inmueble</label>
              <select id="tipo" class="select2 form-select" name="tipo">
                <option value="">Seleccionar</option>
                <option value="apartamento">Apartamento</option>
                <option value="casa">Casa</option>
                <option value="terreno">Terreno</option>
                <option value="local">Local Comercial</option>
                <option value="oficina">Oficina</option>  
              </select>
              @error('tipo')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
              </div>

              
              <div class="col col-md-6 mb-3">
                <label for="dimension" class="form-label">Dimensiones</label>
                <input name="dimension" class="form-control" value="{{old('dimension')}}" type="text" placeholder="m2">
                @error('dimension')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
              </div>
              
              <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input name="precio" class="form-control" type="text" value="{{old('precio')}}" placeholder="U$S">
                @error('precio')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
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
                <label for="sector_id" class="form-label">Sector</label>
                <select id="sector_id" class="select2 form-select" name="sector_id">
                  <option value="">Seleccionar Sector</option>
                 
                </select>
                @error('sector_id')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
              </div>

               <div class="mb-3 col-md-6">
                <label for="agentes_id" class="form-label">Agente inmobiliario</label>
                <select id="agentes_id" class="select2 form-select" name="agentes_id">
                  <option value="">Seleccionar Agente</option>
                  @foreach ($agentesInmu as $agente)
                  <option value="{{$agente->id}}">{{$agente->nombre}} {{$agente->apellido}}</option>
                  @endforeach
                </select>
                @error('agentes_id')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
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
                @error('plantas')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
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
                @error('habitaciones')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
              </div>
              <div class="mb-3 col-md-3">
                <label for="banos" class="form-label">N° Baños</label>
                <select id="banos" class="select2 form-select" name="banos">
                  <option value="">Nº</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5 o más</option>
                </select>
                @error('banos')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
              </div>
              <div class="mb-3 col-md-3">
                <label for="estacionamiento" class="form-label">N° Garage</label>
                <select id="estacionamiento" class="select2 form-select" name="estacionamiento">
                  <option value="">Nº</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5 o más</option>
                </select>
                @error('estacionamiento')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
              </div>

              <div class="col col-md-6">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" class="form-control mb-3" rows="5" cols="80">{{old('descripcion')}}
                 </textarea>
                 @error('descripcion')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
              </div>

              <div class="col col-md-6 mb-3">
                <label for="imagen">Seleccionar imagen promocional:</label>
                <input class="form-control" type="file" id="imagen" name="imagen">
                @error('imagen')
                        <label class="mensaje-error">{{ $message }}</label>
                    @enderror
                <br>
                <label for="imagenes" class="form-label">Imagenes de la propiedad:</label>
                <input class="form-control" type="file" id="formFileMultiple" name="imagenes[]" multiple>
                @error('imagenes')
                    <label class="mensaje-error">{{ $message }}</label>
                @enderror
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
      var sectorSelect = document.getElementById('sector_id');
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

