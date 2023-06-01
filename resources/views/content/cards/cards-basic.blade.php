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



<div class="row mb-5">
  <div class="demo-inline-spacing">
    <button type="button" class="btn btn-primary">
      <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Primary
    </button>
  </div>
  <table id="example" class="ui celled table" style="width:100%">
    <h1>{{$suscriptors[0]->user->username}}</h1>
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
            <button type="button" class="btn btn-icon btn-primary">
              <span class="tf-icons bx bx-trash"></span>
            </button>
          </center>
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
@foreach ($suscriptors as $suscriptor)
<div class="col-lg-4 col-md-3">
  <!-- Modal -->
  <div class="modal fade" id="modaldetalle{{$suscriptor->id}}" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
      <form class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="backDropModalTitle">Detalles</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de Usuario</label>
              <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->user->username}}" readonly />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre</label>
              <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->nombre}}" readonly />
            </div>
            <div class="col mb-0">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Apellido</label>
              <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->apellido}}" readonly />
            </div>
          </div>
          <br>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Email</label>
              <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->user->email}}" readonly />
            </div>
            <div class="col mb-0">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Teléfono</label>
              <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->telefono}}" readonly />
            </div>
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="modaleditar{{$suscriptor->id}}" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
      <form class="modal-content" id="editform" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="backDropModalTitle">Editar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body form-group">
          <div class="row">
            <div class="col mb-3">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de Usuario</label>
              <input class="form-control" type="text" id="nombre_usuario" value="{{$suscriptor->user->username}}" readonly />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="defaultFormControlInput" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="{{$suscriptor->nombre}}" aria-describedby="defaultFormControlHelp" />
            </div>
            <div class="col mb-0">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Apellido</label>
              <input class="form-control" type="text" id="apellido" name="apellido" value="{{$suscriptor->apellido}}" readonly />
            </div>
          </div>
          <br>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Email</label>
              <input class="form-control" type="text" id="correo" name="correo" value="{{$suscriptor->user->email}}" readonly />
            </div>
            <div class="col mb-0">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Teléfono</label>
              <input class="form-control" type="text" id="telefono" name="telefono" value="{{$suscriptor->telefono}}" readonly />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" form="editform" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
</div>





@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#modaleditar{{$suscriptor->id}}').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nombre = button.data('nombre');
            var apellido = button.data('apellido');
            var correo = button.data('correo');
            var telefono = button.data('telefono');

            var modal = $(this);
            modal.find('#modaleditar{{$suscriptor->id}}').attr('action', '/listado/' + id);
            modal.find('#nombre').val(nombre);
            modal.find('#apellido').val(apellido);
            modal.find('#correo').val(correo);
            modal.find('#telefono').val(telefono);
        });

        $('#modaleditar{{$suscriptor->id}}').on('submit', function (event) {
            event.preventDefault();
            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: 'PUT',
                url: url,
                data: form.serialize(),
                success: function (response) {
                    location.reload();
                },
                error: function (response) {
                    var errors = response.responseJSON.errors;
                    if (errors.nombre) {
                        $('#nombreError').text(errors.nombre[0]);
                    }
                    if (errors.apellido) {
                        $('#apellidoError').text(errors.apellido[0]);
                    }
                    if (errors.correo) {
                        $('#correoError').text(errors.correo[0]);
                    }
                    if (errors.telefono) {
                        $('#telefonoError').text(errors.telefono[0]);
                    }
                }
            });
        });
    });
</script>
@endpush  