@section('page-script')
<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
@endsection

<!--Modal Detalles -->
<div class="modal fade" id="modaldetalle{{ $inmobiliaria->id }}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Detalles</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-3">
            <label for="nombre" class="form-label">Logo</label>
            <img class="img-fluid rounded" src="{{ asset('assets/img/inmobiliarias/' . $inmobiliaria->imagen) }}" alt="Card image cap" />
            <br><br>
            <label for="nombre" class="form-label">Nombre de la empresa</label>
            <input type="text" id="nombre" style="width: 85%" name="nombre" class="form-control" value="{{ $inmobiliaria->nombre }}" readonly>
          </div>
          <div class="col-8" style="padding-left: 2%">
            <div class="row g-2">
              <div class="col mb-0" style="padding-right: 6%">
                <label for="nombre" class="form-label">Nombre de usuario</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $inmobiliaria->user->username }}" readonly>
              </div>
              <div class="col mb-0">
                <label for="nombre" class="form-label">Correo Electrónico</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $inmobiliaria->user->email }}" readonly>
              </div>
            </div>
            <div class="row" style="padding-top: 1.5%">
              <div class="col mb-0" style="padding-right: 2%">
                <label for="nombre" class="form-label">Rif</label>
                <div class="input-group" bis_skin_checked="1" style="width: 112%">
                  <span class="input-group-text" id="basic-addon11">J-</span>
                  <input type="text" class="form-control" value="{{$inmobiliaria->rif}}" aria-label="Username" aria-describedby="basic-addon11" readonly>
                </div>
              </div>
              <div class="col mb-0" style="padding-left: 4.5%">
                <label for="nombre" class="form-label">teléfono</label>
                <div class="input-group" bis_skin_checked="1" style="width: 112%">
                  <span class="input-group-text" id="basic-addon11">+58</span>
                  <input type="text" class="form-control" value="{{$inmobiliaria->telefono}}" aria-label="Username" aria-describedby="basic-addon11" readonly>
                </div>
              </div>
            </div>
            <div class="row" style="padding-top: 6.5%">
              <div class="col mb-0">
                <label for="nombre" class="form-label">Localización</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $inmobiliaria->direccion }}" readonly>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row g-2">
          <div bis_skin_checked="1" style="width: 94%">
            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{$inmobiliaria->descripcion}}</textarea>
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
  <div class="modal-dialog modal-lg">
    <form class="modal-content" action="{{ route('empresa.editar', $inmobiliaria->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group" style="padding-left: 5%">
        <div class="row">
          <div class="col mb-0">
            <label for="usuario" class="form-label">Nombre de usuario</label>
            <input type="text" id="usuario" name="usuario" style="width: 93.5%" class="form-control" value="{{ $inmobiliaria->user->username }}" readonly>
          </div>
        </div>
        <div class="row g-2">
          <div class="col-12">
            <div class="row" style="padding-top: 2%">
              <div class="col-5" style="padding-right: 4.5%">
                <label for="imagen" class="form-label">Logo</label>
                <input class="form-control" name="imagen" type="file" id="formFile">
              </div>
              <div class="col-5">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $inmobiliaria->user->email }}">
              </div>
            </div>
            <div class="row" style="padding-top: 1.5%">
              <div class="col-3" style="padding-right: 5%">
                <label for="nombre" class="form-label">Nombre de la empresa</label>
                <input type="text" id="nombre" style="width: 105%" name="nombre" class="form-control" value="{{ $inmobiliaria->nombre }}">
              </div>
              <div class="col-3" style="padding-right: 5%">
                <label for="rif" class="form-label">Rif</label>
                <div class="input-group" bis_skin_checked="1" style="width: 120%">
                  <span class="input-group-text" id="basic-addon11">J-</span>
                  <input type="text" name="rif" class="form-control" value="{{$inmobiliaria->rif}}" aria-label="Username" aria-describedby="basic-addon11">
                </div>
              </div>
              <div class="col-3 ">
                <label for="telefono" class="form-label">teléfono</label>
                <div class="input-group" bis_skin_checked="1" style="width: 120%">
                  <span class="input-group-text" id="basic-addon11">+58</span>
                  <input type="text" name="telefono" class="form-control" value="{{$inmobiliaria->telefono}}" aria-label="Username" aria-describedby="basic-addon11">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="padding-top: 1.5%">
          <div class="col mb-0">
            <label for="direccion" class="form-label">Localización</label>
            <input type="text" id="direccion" name="direccion" style="width: 93.5%" class="form-control" value="{{ $inmobiliaria->direccion }}">
          </div>
        </div>
        <div class="row g-2" style="padding-top: 1.5%">
          <div bis_skin_checked="1" style="width: 92.5%">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{$inmobiliaria->descripcion}}</textarea>
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