
@section('page-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<!-- Include Styles -->
@include('layouts/sections/styles')

<!-- Include Scripts for customizer, helper, analytics, config -->
@include('layouts/sections/scriptsIncludes')
@endsection

<!-- Modal Detalle-->
<div class="modal fade" id="modaldetalle{{$suscriptor->id}}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Detalles</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de Usuario</label>
            <input class="form-control"  type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->user->username}}" readonly />
          </div>
        </div>
        <div class="row g-2">
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column ">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre</label>
            <input class="form-control"  type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->nombre}}" readonly />
          </div>
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column ">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Apellido</label>
            <input class="form-control"  type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->apellido}}" readonly />
          </div>
        </div>
        <div class="row g-2">
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column ">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Email</label>
            <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->user->email}}" readonly />
          </div>
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column ">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Teléfono</label>
            <div class="input-group">
              <span class="input-group-text"  id="basic-addon11">+58</span>
              <input type="text" class="form-control"  value="{{$suscriptor->telefono}}" aria-label="Username" readonly />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </form>
  </div>
</div>
<!-- Modal Editar-->
<div class="modal fade" id="modaleditar{{$suscriptor->id}}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" action="{{route('usuario.editar',$suscriptor->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group">
        <div class="row">
          <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de Usuario</label>
            <input class="form-control" type="text" id="nombre_usuario" value="{{$suscriptor->user->username}}" readonly />
          </div>
        </div>
        <div class="row g-2">
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$suscriptor->nombre}}" aria-describedby="defaultFormControlHelp" />
          </div>
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
            <label for="apellido" class="form-label">Apellido</label>
            <input class="form-control" type="text" id="apellido" name="apellido" value="{{$suscriptor->apellido}}" aria-describedby="defaultFormControlHelp" />
          </div>
        </div>
        <div class="row g-2">
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="text" id="email" name="email" value="{{$suscriptor->user->email}}" aria-describedby="defaultFormControlHelp" />
          </div>
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
            <label for="telefono" class="form-label">Teléfono</label>
            <div class="input-group">
              <span class="input-group-text"  id="basic-addon11">+58</span>
              <input type="text" class="form-control" name="telefono" value="{{$suscriptor->telefono}}" aria-label="Username" aria-describedby="basic-addon11" />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalborrar{{$suscriptor->id}}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="modal-content" action="{{route('usuario.borrar',$suscriptor->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-header justify-content-center">
          <h2 class="modal-title" id="exampleModalLabel2">¿Está seguro de eliminar el usuario?</h2>
        </div>
        <div class="modal-body">
          <center>
            <button type="submit" class="btn btn-primary">
              Confirmar
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancelar
            </button>
        </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>
</div>
</div>