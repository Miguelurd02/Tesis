@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('vendor-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable(
      {
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
          <div class="modal-header">
              <h2 class="modal-title" id="backDropModalTitle">Registro</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
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
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
      </form>
  </div>
</div>

<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <h1 class="card-header">Listado de Inmobiliarias</h1>
      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <!-- /Search -->
        <ul class="navbar-nav flex-row align-items-center ms-auto" style="padding-right: 4%">
      
          
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalregistro">
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
      <th>Logo</th>
      <th>Nombre</th>
      <th>Rif</th>
      <th>Correo Electrónico</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($propiedades as $propiedad)
    <tr>
      <td>{{$propiedad->id}}</td>
      <td class="columna-tamano"><img class="img-tabla" src="{{ asset('assets/img/propiedades/' . $propiedad->imagen) }}" alt="Card image cap" /></td>
      <td>{{$propiedad->titulo}}</td>
      <td>J-{{$propiedad->tipo}}</td>
      <td>{{$propiedad->precio}}</td>
      <td>
        <center>
          <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaldetalle{{$propiedad->id}}" data-id="{{$propiedad->id}}">
            <span class="tf-icons bx bx-detail"></span>
          </button>
          <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaleditar{{$propiedad->id}}" data-id="{{$propiedad->id}}">
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
      <th>Logo</th>
      <th>Nombre</th>
      <th>Rif</th>
      <th>Correo Electrónico</th>
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
