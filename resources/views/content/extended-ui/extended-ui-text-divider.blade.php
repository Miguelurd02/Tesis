@extends('layouts/contentNavbarLayout')

@section('title', 'Tabla Sector - Administrador')

@section('vendor-script')
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
    <div class="modal-dialog">
      <form class="modal-content" action="{{route('sector.registrar')}}" method="POST">
        @csrf
        <input type="hidden" name="crear_sector" value="1">
        <div class="modal-header">
          <h2 class="modal-title" id="backDropModalTitle">Registrar</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body form-group">
          <div class="row">
            <div class="col mb-3">
              <label for="nombre" class="form-label">Nombre del sector</label>
              <input class="form-control" style="width: 100%" type="text" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Introduzca el sector..." aria-describedby="defaultFormControlHelp" />
              @error('nombre')
                      @if(old('crear_sector'))
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
            <label for="ciudad_id" class="form-label">Seleccione la ciudad donde pertenece</label>
            <select id="ciudad_id" class="select2 form-select" name="ciudad_id">
                <option value="">Seleccionar Ciudad</option>
                @foreach ($ciudads as $ciudad)
                <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                @endforeach
              </select>
              @error('ciudad_id')
                      @if(old('crear_sector'))
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

  @if($errors->hasAny('nombre','ciudad_id') && old('crear_sector'))
  {{-- Se genera un input hidden para tener una referencia a cual botón apuntar para reabrir el modal en caso de error --}}
  <script type="application/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Se busca el botón con el id "create-button" para volver a abrir el modal
      document.querySelector('#create-button').click();
    });
  </script>
@endif

<br>
<div class="row " >
  <div class="col-md-12 ">
    <div class="card mb-4 ">
      <h1 class="card-header">Listado de Sectores</h1>
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
          <!-- Search -->
          <!-- /Search -->
          <ul class="navbar-nav flex-row align-items-center ms-auto" style="padding-right: 4%">
        
            <!-- Place this tag where you want the button to render. -->
            <button type="button" class="btn btn-primary crear" id="create-button" data-bs-toggle="modal" data-bs-target="#modalregistro">
              <span class="tf-icons bx bx-add-to-queue"></span>&nbsp; Agregar sector
            </button>
            <!-- User -->
            <!--/ User -->
          </ul>
        </div>
      <!-- FILTRO -->
      <div class="card-body"  style="overflow-x:scroll">
<div class="row mb-5" style="padding-left: 2%">
  <div class="demo-inline-spacing">
  </div>
  <table id="example" class="celled table nowrap table-bordered" style="width:100% ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Sector</th>
        <th>Ciudad</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sectors as $sector)
      <tr>
        <td>{{$sector->id}}</td>
        <td>{{$sector->nombre}}</td>
        <td>{{$sector->ciudad->nombre}}</td>
        <td>
          <center>
            <button type="button" class="btn btn-icon btn-primary editar" data-bs-toggle="modal" data-bs-target="#modaleditar{{$sector->id}}" data-id="{{$sector->id}}">
              <span class="tf-icons bx bx-edit"></span>
            </button>
            <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalborrar{{$sector->id}}" data-id="{{$sector->id}}">
              <span class="tf-icons bx bx-trash"></span>
            </button>
          </center>
          @include('content.extended-ui.modal')
          </td>
        </tr>
      
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Sector</th>
        <th>Ciudad</th>
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
