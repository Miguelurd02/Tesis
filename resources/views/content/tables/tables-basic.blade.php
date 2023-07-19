@extends('layouts/contentNavbarLayout')

@section('title', 'Tabla Propiedades - Administrador')

@section('vendor-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>


<script>
  $(document).ready(function() {
    $('#example').DataTable(
      { 
        "dom":'<"ui grid"' +
    '<"eight wide column"l>' +
    '<"eight wide column"B>' +
    '<"eight wide right aligned column"f>' +
    '>' +
    '<"row dt-table"' +
    '<"sixteen wide column"t>' +
    '>' +
    '<"row-footer"' +
    '<"seven wide column"i>' +
    '<"nine wide RIGHT aligned column"p>' +
    '>',
        buttons: [
            {
                extend: 'excel',
                text: 'Excel',
                className: 'btn btn-primary',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-primary',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        "language": {
            "lengthMenu": "Muestra _MENU_ registros por página",
            "zeroRecords": "No se han encontrado registros",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros en total)",
            "search": "Buscar:",
            "paginate":{
              "next": "Siguiente",
              "previous": "Anterior"
            }
        }
    }
    );
  });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.semanticui.min.css">
@endsection

@section('content')

<div class="modal fade" id="modalregistro" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-xl">
      <form class="modal-content" action="{{ route('propiedad.registrar') }}" method="POST"
          enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="crear_propiedad" value="1">
          <div class="modal-header">
              <h2 class="modal-title" id="backDropModalTitle">Registro</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                    <label for="imagen" class="form-label">Imagen promocional</label>
                    <input class="form-control" name="imagen" type="file" id="formFile">
                    @error('imagen')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                  </div>
                  <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                      <label for="titulo" class="form-label">Titulo</label>
                      <input class="form-control" type="text" value="{{old('titulo')}}" name="titulo" id="titulo" />   
                      @error('titulo')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                  </div>
                  <div class="col-12 col-sm-2 mb-3 d-flex flex-column">
                    <label for="contrato" class="form-label">Tipo de contrato</label>
                    <select id="contrato" class="select2 form-select" name="contrato">
                      <option value="">Seleccionar</option>
                      <option value="Venta">Venta</option>
                      <option value="Alquiler">Alquiler</option>
                    </select>
                    @error('contrato')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
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
                    @error('tipo')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                  </div>
              </div>
              <div class="row g-2">
                  <div class="col-6 col-sm-2 mb-3 d-flex flex-column">
                      <label for="banos" class="form-label">Baños</label>
                      <input class="form-control" type="text" value="{{old('banos')}}" name="banos" id="banos" />
                      @error('banos')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                  </div>
                  <div class="col-6 col-sm-2 mb-3 d-flex flex-column">
                      <label for="estacionamiento" class="form-label">Estacionamientos</label>
                      <input class="form-control" type="text" value="{{old('estacionamiento')}}" name="estacionamiento" id="estacionamiento" />
                      @error('estacionamiento')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                  </div>
                  <div class="col-6 col-sm-2 mb-3 d-flex flex-column">
                      <label for="habitaciones" class="form-label">Habitaciones</label>
                      <input class="form-control" type="text" value="{{old('habitaciones')}}" name="habitaciones" id="habitaciones" />
                      @error('habitaciones')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                  </div>
                  <div class="col-6 col-sm-2 mb-3 d-flex flex-column">
                      <label for="plantas" class="form-label">Plantas</label>
                      <input class="form-control" type="text" value="{{old('plantas')}}" name="plantas" id="plantas" />
                      @error('plantas')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                  </div>
                  <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                    <label for="dimension" class="form-label">Dimensiones</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{old('dimension')}}" name="dimension" id="dimension"
                            aria-label="Username" />
                            <span class="input-group-text" id="basic-addon11">m<sup>2</sup></span>
                    </div>
                    @error('dimension')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
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
                  @error('sector_id')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                </div>
                <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                  <label for="agentes_id" class="form-label">Agente inmobiliario</label>
                  <select id="agentes_id" class="select2 form-select" name="agentes_id" >
                    <option value="">Seleccionar Sector</option>
                    @foreach ($agentes as $agente)
                    <option value="{{$agente->id}}">{{$agente->nombre}} {{$agente->apellido}}</option>
                    @endforeach
                  </select>
                  @error('agentes_id')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                </div>
                <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                  <label for="precio" class="form-label">Precio</label>
                  <div class="input-group">
                    <input type="text" class="form-control" value="{{old('precio')}}" name="precio" id="precio"
                        aria-label="Username" />
                        <span class="input-group-text" id="basic-addon11">$</span>
                  </div>
                  @error('precio')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                  <label for="imagenes" class="form-label">Imagenes de la propiedad</label>
                  <input class="form-control" type="file" id="formFileMultiple" name="imagenes[]" multiple>
                  @error('imagenes')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                </div>
                  <div class="col-12 col-sm-8 mb-3 d-flex flex-column">
                    <label for="exampleFormControlTextarea1" class="form-label"
                    >Descripción</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" >{{old('descripcion')}}</textarea>
                    @error('descripcion')
                      @if(old('crear_propiedad'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
      </form>
  </div>
</div>

@if($errors->hasAny('titulo', 'imagen','tipo', 'contrato', 'banos', 'estacionamiento', 'habitaciones', 'plantas', 'dimension', 'sector_id', 'agentes_id', 'precio', 'descripcion', 'imagenes',) && old('crear_propiedad'))
    {{-- Se genera un input hidden para tener una referencia a cual botón apuntar para reabrir el modal en caso de error --}}
    <script type="application/javascript">
      document.addEventListener('DOMContentLoaded', () => {
        // Se busca el botón con el id "create-button" para volver a abrir el modal
        document.querySelector('#create-button').click();
      });
    </script>
  @endif

<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <h1 class="card-header">Listado de Propiedades</h1>
      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <!-- /Search -->
        <ul class="navbar-nav flex-row align-items-center ms-auto" style="padding-right: 2%">
      
          
          <button type="button" class="btn btn-primary crear" id="create-button" data-bs-toggle="modal" data-bs-target="#modalregistro">
            <span class="tf-icons bx bx-add-to-queue"></span>&nbsp; Agregar Propiedad
          </button>
           
          <!--/ User -->
        </ul>
      </div>
    <!-- FILTRO -->
    <div class="card-body" style="overflow-x:scroll">
<div class="row mb-5" style="padding-left: 2%">
<div class="demo-inline-spacing">
</div>
<table id="example" class="celled table nowrap table-bordered" style="width:100% ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Imagen</th>
      <th>Titulo</th>
      <th>Tipo de contrato</th>
      <th>Tipo de inmueble</th>
      <th>Precio</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($propiedades as $propiedad)
    <tr>
      <td>{{$propiedad->id}}</td>
      <td class="columna-tamano"><img class="img-tabla" src="{{ asset('assets/img/propiedades/' . $propiedad->imagen) }}" alt="Card image cap" /></td>
      <td>{{$propiedad->titulo}}</td>
      <td>J-{{$propiedad->contrato}}</td>
      <td>{{$propiedad->tipo}}</td>
      <td><?= number_format($propiedad->precio, 2, ',', '.'); ?></td>
      <td>
        <center>
          <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaldetalle{{$propiedad->id}}" data-id="{{$propiedad->id}}">
            <span class="tf-icons bx bx-detail"></span>
          </button>
          <button type="button" class="btn btn-icon btn-primary editar" data-bs-toggle="modal" data-bs-target="#modaleditar{{$propiedad->id}}" data-id="{{$propiedad->id}}">
            <span class="tf-icons bx bx-edit"></span>
          </button>
          <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalborrar{{$propiedad->id}}" data-id="{{$propiedad->id}}">
            <span class="tf-icons bx bx-trash"></span>
          </button>
        </center>
        @include('content.tables.modalinmu')
        </td>
      </tr>
    
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th>ID</th>
      <th>Imagen</th>
      <th>Titulo</th>
      <th>Tipo de contrato</th>
      <th>Tipo de inmueble</th>
      <th>Precio</th>
      <th>Acciones</th>
    </tr>
  </tfoot>
</table>
</div>

</div>
</div>
</div>
</div>
  
@endsection
