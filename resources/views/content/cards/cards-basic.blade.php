@extends('layouts/contentNavbarLayout')

@section('title', 'Tabla Usuarios - Administrador')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>

<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.semanticui.min.css">
@endsection

@section('content')



<div class="row mb-5">
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
                            <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modaldetalle">
                            <span class="tf-icons bx bx-pie-chart-alt"></span>
                            </button>
                            <button type="button" class="btn btn-icon btn-secondary">
                                <span class="tf-icons bx bx-bell"></span>
                            </button>
                            <button type="button" class="btn btn-icon btn-secondary">
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

<div class="col-lg-4 col-md-3">
    <!-- Modal -->
    <div class="modal fade" id="modaldetalle" data-bs-backdrop="static" tabindex="-1">
      <div class="modal-dialog">
        <form class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="backDropModalTitle">Detalles</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label for="nameBackdrop" class="form-label">Name</label>
                <input type="text" id="nameBackdrop" class="form-control" placeholder="Enter Name">
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailBackdrop" class="form-label">Email</label>
                <input type="text" id="emailBackdrop" class="form-control" placeholder="xxxx@xxx.xx">
              </div>
              <div class="col mb-0">
                <label for="dobBackdrop" class="form-label">DOB</label>
                <input type="text" id="dobBackdrop" class="form-control" placeholder="DD / MM / YY">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
