@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection

<!--Modal Detalles -->
<div class="modal fade" id="modaldetalle{{$inmobiliaria->id}}" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <form class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="backDropModalTitle">Detalles</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
              <div class="input-group">
                <span class="input-group-text" style="width: 10%" id="basic-addon11">+58</span>
                <input type="text" class="form-control" style="width: 51%" value="{{$suscriptor->telefono}}" aria-label="Username" readonly />
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
<div class="modal fade" id="modaleditar{{$inmobiliaria->id}}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form class="modal-content" action="{{route('empresa.editar',$inmobiliaria->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group">
        <div class="row">
          <div class="col mb-3">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de la organización</label>
            <input class="form-control" style="width: 95%" type="text" id="nombre" name="sector" value="{{$inmobiliaria->nombre}}" aria-describedby="defaultFormControlHelp" />
          </div>
        </div>
        <div class="row g-2">
            <div class="col mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de la ciudad</label>
                <input class="form-control" style="width: 95%" type="text" id="ciudad" name="ciudad" value="{{$sector->ciudad->nombre}}" readonly />
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalborrar{{$sector->id}}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="modal-content" action="{{route('sector.borrar',$sector->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-header">
          <h1 class="modal-title" id="exampleModalLabel2">¿Está seguro de eliminar el usuario?</h1>
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