@section('page-script')
<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
@endsection

<!--Modal Detalles -->
<div class="modal fade" id="modaldetalle{{ $agente->id }}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Detalles</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
          <label for="nombre" class="form-label">Perfil</label>
            <img class="img-fluid rounded" style="border-color: darkred; border: 10px darkred;" src="{{ asset('assets/img/agentes/' . $agente->imagen) }}" alt="Card image cap" />
          </div>
          <div class="col mb-3">
            <br>
          <label for="nombre" class="form-label">Nombre</label>
            <input class="form-control" type="text" style="width: 87.5%;" name="nombre" id="nombre" value="{{$agente->nombre}}" readonly/>
            <br>
            <label for="apellido" class="form-label">Apellido</label>
            <input class="form-control" type="text" style="width: 87.5%;" name="apellido" id="apellido" value="{{$agente->apellido}}" readonly/>
            <br>
            <label for="telefono" class="form-label">Teléfono</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon11">+58</span>
              <input type="text" class="form-control" name="telefono" id="telefono" aria-label="Username" value="{{$agente->telefono}}" readonly/>
            </div>
          </div>
        </div>
        <div class="row g-2">
          <div class="col mb-0" style="padding-right: 4.5%;">
            <label for="inmobiliaria" class="form-label">Inmobiliaria</label>
            <input class="form-control" type="text" name="inmobiliaria" style="width: 85%;" id="inmobiliaria" value="{{$agente->inmobiliaria->nombre}}"/>
          </div>
          <div class="col mb-0">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="text" name="email" style="width: 87.5%;" id="email" value="{{$agente->email}}" readonly/>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </form>
  </div>
</div>

<!-- Modal Editar-->
<div class="modal fade" id="modaleditar{{ $inmobiliaria->id }}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" action="{{ route('empresa.editar', $inmobiliaria->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group">
        <div class="row" style="width: 95%;">
          <div class="col mb-3">
            <label for="imagen" class="form-label">Foto de perfil</label>
            <input class="form-control" name="imagen"  type="file" id="formFile">
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
              <input type="text" class="form-control" name="telefono" id="telefono" aria-label="Username"  />
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col mb-3">
            <label for="inmobiliaria_id" class="form-label">Seleccione la inmobiliaria donde pertenece</label>
            <select id="inmobiliaria_id" class="select2 form-select" name="inmobiliaria_id">
              <option value="">Seleccionar Ciudad</option>
              @foreach ($inmobiliarias as $inmobiliaria)
              <option value="{{$inmobiliaria->id}}">{{$inmobiliaria->nombre}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalborrar{{ $inmobiliaria->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="modal-content" action="{{ route('empresa.borrar', $inmobiliaria->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-header">
          <h1 class="modal-title" id="exampleModalLabel2">¿Está seguro de eliminar la inmobiliaria?</h1>
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