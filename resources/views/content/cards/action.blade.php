@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection
    <!-- Modal Detalle-->
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
                <input class="form-control" style="width: 95%" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->user->username}}" readonly />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre</label>
                <input class="form-control" style="width: 89%" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->nombre}}" readonly />
              </div>
              <div class="col mb-0">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Apellido</label>
                <input class="form-control" style="width: 89%" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->apellido}}" readonly />
              </div>
            </div>
            <br>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Email</label>
                <input class="form-control" style="width: 89%" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->user->email}}" readonly />
              </div>
              <div class="col mb-0">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Teléfono</label>
                <input class="form-control" style="width: 89%" type="text" id="exampleFormControlReadOnlyInput1" value="{{$suscriptor->telefono}}" readonly />
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
            <h5 class="modal-title" id="backDropModalTitle">Editar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body form-group">
            <div class="row">
              <div class="col mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de Usuario</label>
                <input class="form-control" style="width: 95%" type="text" id="nombre_usuario" value="{{$suscriptor->user->username}}" readonly />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$suscriptor->nombre}}" aria-describedby="defaultFormControlHelp" />
              </div>
              <div class="col mb-0">
                <label for="apellido" class="form-label">Apellido</label>
                <input class="form-control" type="text" id="apellido" name="apellido" value="{{$suscriptor->apellido}}"  aria-describedby="defaultFormControlHelp" />
              </div>
            </div>
            <br>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="{{$suscriptor->user->email}}" readonly />
              </div>
              <div class="col mb-0">
                <label for="telefono" class="form-label">Teléfono</label>
                <input class="form-control" type="text" id="telefono" name="telefono" value="{{$suscriptor->telefono}}" readonly />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  