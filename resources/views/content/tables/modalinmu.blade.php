
@section('page-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<!-- Include Styles -->
@include('layouts/sections/styles')

<!-- Include Scripts for customizer, helper, analytics, config -->
@include('layouts/sections/scriptsIncludes')
@endsection

<!--Modal Detalles -->
<div class="modal fade" id="modaldetalle{{$propiedad->id}}" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <form class="modal-content" enctype="multipart/form-data">
            
            <div class="modal-header">
                <h2 class="modal-title" id="backDropModalTitle">Detalles</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                      <label for="imagen" class="form-label">Imagen promocional</label>
                      <img class="rounded modal-propiedad" src="{{ asset('assets/img/propiedades/' . $propiedad->imagen) }}" alt="Card image cap" />
                    </div>
                    <div class="col-12 col-sm-8 mb-3 d-flex flex-column">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input class="form-control" type="text" name="titulo" id="titulo" value="{{$propiedad->titulo}}" readonly/>   
                            </div>
                            <div class="col-12 col-sm-3 mb-3 d-flex flex-column">
                              <label for="contrato" class="form-label">Tipo de contrato</label>
                              <input class="form-control" type="text" name="contrato" id="contrato" value="{{$propiedad->contrato}}" readonly/>   
                            </div>
                            <div class="col-12 col-sm-3 mb-3 d-flex flex-column">
                              <label for="tipo" class="form-label">Tipo de inmueble</label>
                              <input class="form-control" type="text" name="tipo" id="tipo" value="{{$propiedad->tipo}}" readonly/>   
                            </div>
                            <div class="col-6 col-sm-3 mb-3 d-flex flex-column">
                                <label for="banos" class="form-label">Baños</label>
                                <input class="form-control" type="text" name="banos" id="banos" value="{{$propiedad->banos}}" readonly />
                            </div>
                            <div class="col-6 col-sm-3 mb-3 d-flex flex-column">
                                <label for="estacionamiento" class="form-label">Estacionamientos</label>
                                <input class="form-control" type="text" name="estacionamiento" id="estacionamiento" value="{{$propiedad->estacionamiento}}" readonly />
                            </div>
                            <div class="col-6 col-sm-3 mb-3 d-flex flex-column">
                                <label for="habitaciones" class="form-label">Habitaciones</label>
                                <input class="form-control" type="text" name="habitaciones" id="habitaciones" value="{{$propiedad->habitaciones}}" readonly/>
                            </div>
                            <div class="col-6 col-sm-3 mb-3 d-flex flex-column">
                                <label for="plantas" class="form-label">Plantas</label>
                                <input class="form-control" type="text" name="plantas" id="plantas" value="{{$propiedad->plantas}}" readonly />
                            </div>
                            <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
                                <label for="dimension" class="form-label">Dimensiones</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="dimension" id="dimension"
                                        aria-label="Username" value="{{$propiedad->dimension}}" readonly/>
                                        <span class="input-group-text" id="basic-addon11">m<sup>2</sup></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
                                <label for="precio" class="form-label">Precio</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="precio" id="precio"
                                      aria-label="Username" value="{{$propiedad->precio}}" readonly/>
                                      <span class="input-group-text" id="basic-addon11">$</span>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
                <div class="row g-2">
                  <div class="col-12 col-sm-3 mb-3 d-flex flex-column">
                    <label for="sector_id" class="form-label">Sector</label>
                    <input class="form-control" type="text" name="sector_id" id="sector_id" value="{{$propiedad->sector->nombre}}" readonly />
                  </div>
                  <div class="col-12 col-sm-3 mb-3 d-flex flex-column">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input class="form-control" type="text" name="ciudad" id="ciudad" value="{{$propiedad->sector->ciudad->nombre}}" readonly />
                  </div>
                  <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
                    <label for="agentes_id" class="form-label">Agente inmobiliario</label>
                    <input class="form-control" type="text" name="agentes_id" id="agentes_id" value="{{$propiedad->agentes->nombre}}" readonly />
                  </div>
                  
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
                      <label for="exampleFormControlTextarea1" class="form-label"
                      >Descripción</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" readonly >{{$propiedad->descripcion}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 mb-4 mt-2 d-flex flex-column justify-content-center">
                            <h4>Fotos de la propiedad</h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($propiedad->imagenes as $index => $imagen)
                      <div class="col-12 col-sm mb-3 d-flex flex-column">
                        <img class="rounded imagenes" src="{{ asset('assets/img/propiedades/' . $imagen->nombre_foto) }}" alt="Card image cap" />
                      </div>
                      @if (($index + 1) % 5 === 0)
                        </div><div class="row justify-content-center">
                      @endif
                    @endforeach
                  </div>
                      
            </div>
        </form>
    </div>
  </div>

<!-- Modal Editar-->
<div class="modal fade" id="modaleditar{{ $propiedad->id }}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <form class="modal-content" id="form" action="{{ route('propiedad.editar', $propiedad->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group">
        <div class="row">
          <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
              <label for="imagen" class="form-label">Imagen promocional</label>
              <input class="form-control" name="imagen" type="file" id="formFile">
            </div>
            <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                <label for="titulo" class="form-label">Titulo</label>
                <input class="form-control" type="text" name="titulo" id="titulo" />   
            </div>
            <div class="col-12 col-sm-2 mb-3 d-flex flex-column">
              <label for="contrato" class="form-label">Tipo de contrato</label>
              <select id="contrato" class="select2 form-select" name="contrato">
                <option value="">Seleccionar</option>
                <option value="Venta">Venta</option>
                <option value="Alquiler">Alquiler</option>
              </select>
            </div>
            <div class="col-12 col-sm-2 mb-3 d-flex flex-column">
              <label for="tipo" class="form-label">Tipo de inmueble</label>
              <select id="tipo" class="select2 form-select" name="tipo">
                <option value="">Seleccionar</option>
                <option value="Casa">Casa</option>
                <option value="Apartamento">Apartamento</option>
                <option value="Terreno">Terreno</option>
                <option value="Local">Local Comercial</option>
                <option value="Oficina">Oficina</option>
              </select>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-6 col-sm-2 mb-3 d-flex flex-column">
                <label for="banos" class="form-label">Baños</label>
                <input class="form-control" type="text" name="banos" id="banos" />
            </div>
            <div class="col-6 col-sm-2 mb-3 d-flex flex-column">
                <label for="estacionamiento" class="form-label">Estacionamientos</label>
                <input class="form-control" type="text" name="estacionamiento" id="estacionamiento" />
            </div>
            <div class="col-6 col-sm-2 mb-3 d-flex flex-column">
                <label for="habitaciones" class="form-label">Habitaciones</label>
                <input class="form-control" type="text" name="habitaciones" id="habitaciones" />
            </div>
            <div class="col-6 col-sm-2 mb-3 d-flex flex-column">
                <label for="plantas" class="form-label">Plantas</label>
                <input class="form-control" type="text" name="plantas" id="plantas" />
            </div>
            <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
              <label for="dimension" class="form-label">Dimensiones</label>
              <div class="input-group">
                  <input type="text" class="form-control" name="dimension" id="dimension"
                      aria-label="Username" />
                      <span class="input-group-text" id="basic-addon11">m<sup>2</sup></span>
              </div>
            </div>
        </div>
        <div class="row g-2">
          <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
            <label for="sector_id" class="form-label">Sector</label>
            <select id="sector_id" class="select2 form-select" name="sector_id" >
              <option value="">Seleccionar Sector</option>
              @foreach ($sectors as $sector)
              <option value="{{$sector->id}}">{{$sector->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
            <label for="agentes_id" class="form-label">Agente inmobiliario</label>
            <select id="agentes_id" class="select2 form-select" name="agentes_id" >
              <option value="">Seleccionar Sector</option>
              @foreach ($agentes as $agente)
              <option value="{{$agente->id}}">{{$agente->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
            <label for="precio" class="form-label">Precio</label>
            <div class="input-group">
              <input type="text" class="form-control" name="precio" id="precio"
                  aria-label="Username" />
                  <span class="input-group-text" id="basic-addon11">$</span>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
            <label for="imagenes" class="form-label">Imagenes de la propiedad</label>
            <input class="form-control" type="file" id="formFileMultiple" name="imagenes[]" multiple>
          </div>
            <div class="col-12 col-sm-8 mb-3 d-flex flex-column">
              <label for="exampleFormControlTextarea1" class="form-label"
              >Descripción</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" ></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-sm-12 mb-4 d-flex flex-column justify-content-center">
            <h4>Fotos de la propiedad</h4>
          </div>
          @foreach ($propiedad->imagenes as $index => $imagen)
            <div id="foto{{$imagen->id}}" class="col-12 col-sm mb-3 d-flex flex-column">
              <img class="rounded imagenes" src="{{ asset('assets/img/propiedades/' . $imagen->nombre_foto) }}" alt="Card image cap" />
              <button id="eliminarfoto" class="btn btn-secundary" onclick="eliminarImagen(event, {{ $imagen->id }})">Eliminar</button>
            </div>
            @if (($index + 1) % 5 === 0)
              </div><div class="row justify-content-center">
            @endif
          @endforeach
        </div>
    </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalborrar{{ $propiedad->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="modal-content" action="{{ route('propiedad.borrar', $propiedad->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-header center col-12 col-sm-12 mb-3 d-flex flex-column">
          <h2 class="modal-title" id="exampleModalLabel2">¿Está seguro de eliminar la propiedad seleccionada?</h2>
        </div>
        <div class="modal-body">
          <center>
            <button type="submit" class="btn btn-primary">
              Confirmar
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancelar
            </button>
          </center>
        </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>
</div>

<script>

function eliminarImagen(event,id) {
  event.preventDefault();
  if (confirm("¿Está seguro de elimar la imagen?")) {
    $.ajax({
              url: '/eliminar/imagen/' + id,
              type: 'POST',
              data: {
                  _method: 'DELETE', // Especificar el método DELETE
                  _token: $('meta[name="csrf-token"]').attr('content') // Obtener el token CSRF
              },
              dataType: 'json',
              success: function(response) {
                  // Lógica para actualizar la interfaz después de la eliminación
                  console.log('foto' + id);
                  document.getElementById("foto" + id).remove();
              },
              error: function(xhr) {
                  console.log(xhr.responseText);
              }
          });
  } else {
    console.log('cancelado')
  }
          
}


  /**/
</script>