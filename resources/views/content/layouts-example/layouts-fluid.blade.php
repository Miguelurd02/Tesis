@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Tabla inmobiliaria - Administrador')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.semanticui.min.css">
@endsection

@section('content')

<!--<div class="modal fade" id="modalregistro" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-lg" role="document">
    <form class="modal-content" action="{{route('empresa.registrar')}}" method="POST">
      @csrf
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Registrar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group">
        <div class="row g-2">
          <div class="col mb-0">
            <label for="nombre" class="form-label">Nombre de la organización</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre de la inmobiliaria...">
          </div>
          <div class="col mb-0">
            <label for="dobLarge" class="form-label">DOB</label>
            <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY">
          </div>
          <div class="col mb-0">
            <label for="dobLarge" class="form-label">DOB</label>
            <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY">
          </div>
        </div> <br>
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailLarge" class="form-label">Email</label>
            <input type="text" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx">
          </div>
          <div class="col mb-0">
            <label for="dobLarge" class="form-label">DOB</label>
            <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY">
          </div>
          <div class="col mb-0">
            <label for="dobLarge" class="form-label">DOB</label>
            <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </form>
  </div>
</div>
-->
<br>
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
    <div class="card-body">
<div class="row mb-5" style="padding-left: 2%">
<div class="demo-inline-spacing">
</div>
<table id="example" class="ui celled table" style="width:100% ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Logo</th>
      <th>Nombre</th>
      <th>Rif</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($inmobiliarias as $inmobiliaria)
    <tr>
      <td>{{$inmobiliaria->id}}</td>
      <td><img class="card-img-top" src="{{ asset('assets/img/propiedades/' . $inmobiliaria->imagen) }}" alt="Card image cap" /></td>
      <td>{{$inmobiliaria->nombre}}</td>
      <td>{{$inmobiliaria->rif}}</td>
      <td>
        <center>
          <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaleditar{{$inmobiliaria->id}}" data-id="{{$inmobiliaria->id}}">
            <span class="tf-icons bx bx-edit"></span>
          </button>
          <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalborrar{{$inmobiliaria->id}}" data-id="{{$inmobiliaria->id}}">
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
      <th>Logo</th>
      <th>Nombre</th>
      <th>Rif</th>
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
