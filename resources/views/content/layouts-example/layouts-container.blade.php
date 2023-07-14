@php
    $container = 'container-xxl';
    $containerNav = 'container-xxl';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Tabla Agentes - Administrador')

@section('vendor-script')
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/cards.css') }}" />
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
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('agente.registrar') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2 class="modal-title" id="backDropModalTitle">Registro</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="imagen" class="form-label">Foto de perfil</label>
                            <input class="form-control" name="imagen" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" />
                        </div>
                        <div class="col mb-0">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input class="form-control" type="text" name="apellido" id="apellido" />
                        </div>
                    </div>
                    <br>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="text" name="email" id="email" />
                        </div>
                        <div class="col mb-0">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">+58</span>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    aria-label="Username" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="inmobiliaria_id" class="form-label">Seleccione la inmobiliaria donde
                                pertenece</label>
                            <select id="inmobiliaria_id" class="select2 form-select" name="inmobiliaria_id">
                                <option value="">Seleccionar Inmobiliaria</option>
                                @foreach ($inmobiliarias as $inmobiliaria)
                                    <option value="{{ $inmobiliaria->id }}">{{ $inmobiliaria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <br>
    <div class="row ">
        <div class="col-md-12 ">
            <div class="card mb-4 ">
                <h1 class="card-header">Listado de Agentes</h1>
                <div class="navbar-nav-right d-flex align-items-center " id="navbar-collapse">
                    <!-- Search -->
                    <!-- /Search -->
                    <ul class="navbar-nav flex-row align-items-center ms-auto" style="padding-right: 4%">

                        <!-- Place this tag where you want the button to render. -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalregistro">
                            <span class="tf-icons bx bx-add-to-queue"></span>&nbsp; Agregar agente
                        </button>
                        <!-- User -->
                        <!--/ User -->
                    </ul>
                </div>
                <!-- FILTRO -->
                <div class="card-body " style="overflow-x:scroll">
                    <div class="row mb-5 " style="padding-left: 2%">
                        <table id="example" class=" celled table nowrap table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agentes as $agente)
                                    <tr>
                                        <td>{{ $agente->id }}</td>
                                        <td class="columna-tamano"><img
                                            class=" img-tabla" 
                                            src="{{ asset('assets/img/agentes/' . $agente->imagen) }}"
                                            alt="Card image cap" />
                                        </td>
                                        <td>{{ $agente->nombre }}</td>
                                        <td>{{ $agente->apellido }}</td>
                                        <td>
                                            <center>
                                                <button type="button" class="btn btn-icon btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modaldetalle{{ $agente->id }}"
                                                    data-id="{{ $agente->id }}">
                                                    <span class="tf-icons bx bx-detail"></span>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modaleditar{{ $agente->id }}"
                                                    data-id="{{ $agente->id }}">
                                                    <span class="tf-icons bx bx-edit"></span>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalborrar{{ $agente->id }}"
                                                    data-id="{{ $agente->id }}">
                                                    <span class="tf-icons bx bx-trash"></span>
                                                </button>
                                            </center>
                                            @include('content.layouts-example.modalagente')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
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
