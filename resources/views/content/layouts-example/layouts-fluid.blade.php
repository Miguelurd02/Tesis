@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Tabla inmobiliaria - Administrador')

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


<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <h1 class="card-header">Listado de Inmobiliarias</h1>
      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <!-- /Search 
        <ul class="navbar-nav flex-row align-items-center ms-auto" style="padding-right: 4%">
      
          Place this tag where you want the button to render.
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalregistro">
            <span class="tf-icons bx bx-add-to-queue"></span>&nbsp; Agregar Inmobiliaria
          </button>
           User -->
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
    @foreach ($inmobiliarias as $inmobiliaria)
    <tr>
      <td>{{$inmobiliaria->id}}</td>
      <td class="columna-tamano"><img class="img-tabla" src="{{ asset('assets/img/inmobiliarias/' . $inmobiliaria->imagen) }}" alt="Card image cap" /></td>
      <td>{{$inmobiliaria->nombre}}</td>
      <td>J-{{$inmobiliaria->rif}}</td>
      <td>{{$inmobiliaria->user->email}}</td>
      <td>
        <center>
          <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaldetalle{{$inmobiliaria->id}}" data-id="{{$inmobiliaria->id}}">
            <span class="tf-icons bx bx-detail"></span>
          </button>
          <button type="button" class="btn btn-icon btn-primary editar" data-bs-toggle="modal" data-bs-target="#modaleditar{{$inmobiliaria->id}}" data-id="{{$inmobiliaria->id}}">
            <span class="tf-icons bx bx-edit"></span>
          </button>
          <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalborrar{{$inmobiliaria->id}}" data-id="{{$inmobiliaria->id}}">
            <span class="tf-icons bx bx-trash"></span>
          </button>
        </center>
        @include('content.layouts-example.modales')
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
