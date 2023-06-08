@extends('layouts/contentNavbarLayout')

@section('title', 'Tabla Usuarios - Administrador')

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
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tabla /</span> Usuario
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h1 class="card-header">Tabla de Usuarios</h1>
      <!-- FILTRO -->
      <div class="card-body">
<div class="row mb-5" style="padding-left: 2%">
  <div class="demo-inline-spacing">
  </div>
  <table id="example" class="ui celled table" style="width:100% ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre de usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($suscriptors as $suscriptor)
      <tr>
        <td>{{$suscriptor->id}}</td>
        <td>{{$suscriptor->user->username}}</td>
        <td>{{$suscriptor->nombre}}</td>
        <td>{{$suscriptor->apellido}}</td>
        <td>{{$suscriptor->user->email}}</td>
        <td>
          <center>
            <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaldetalle{{$suscriptor->id}}" data-id="{{$suscriptor->id}}">
              <span class="tf-icons bx bx-detail"></span>
            </button>
            <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaleditar{{$suscriptor->id}}" data-id="{{$suscriptor->id}}">
              <span class="tf-icons bx bx-edit"></span>
            </button>
            <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalborrar{{$suscriptor->id}}" data-id="{{$suscriptor->id}}">
              <span class="tf-icons bx bx-trash"></span>
            </button>
          </center>
          @include('content.cards.action')
          </td>
        </tr>
      
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Nombre de usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Acciones</th>
      </tr>
    </tfoot>
  </table>
</div>
</div>
</div>
</div>
</div>
</div>





@endsection 