
@section('page-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<!-- Include Styles -->
@include('layouts/sections/styles')

<!-- Include Scripts for customizer, helper, analytics, config -->
@include('layouts/sections/scriptsIncludes')
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
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column ">
          <label for="nombre" class="form-label">Perfil</label>
            <img class="rounded img-modal" src="{{ asset('assets/img/agentes/' . $agente->imagen) }}" alt="Card image cap" />
            <br>
            <label for="inmobiliaria" class="form-label">Inmobiliaria</label>
            <input class="form-control" type="text" name="inmobiliaria" id="inmobiliaria" value="{{$agente->inmobiliaria->nombre}}" readonly/>
          </div>
          <div class="col-12 col-sm-6 mb-3">
            
          <label for="nombre" class="form-label">Nombre</label>
            <input class="form-control" type="text"  name="nombre" id="nombre" value="{{$agente->nombre}}" readonly/>
            <br>
            <label for="apellido" class="form-label">Apellido</label>
            <input class="form-control" type="text"  name="apellido" id="apellido" value="{{$agente->apellido}}" readonly/>
            <br>
            <label for="telefono" class="form-label">Teléfono</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon11">+58</span>
              <input type="text" class="form-control" name="telefono" id="telefono" aria-label="Username" value="{{$agente->telefono}}" readonly/>
            </div>
            <br>
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="text" name="email" id="email" value="{{$agente->email}}" readonly/>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </form>
  </div>
</div>

<!-- Modal Editar-->
<div class="modal fade" id="modaleditar{{ $agente->id }}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" action="{{ route('agente.editar', $agente->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="agente_id" value="{{ $agente->id}}">
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group">
        <div class="row" >
          <div class="col mb-3">
            <label for="imagen" class="form-label">Foto de perfil</label>
            <input class="form-control" name="imagen"  type="file" id="imagen">
            @error('imagen')
                      @if(old('agente_id') == $agente->id)
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
          </div>
        </div>
        <div class="row g-2">
          <div class="col mb-0" >
            <label for="nombre" class="form-label">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{old('nombre',$agente->nombre)}}"/>
            @error('nombre')
                      @if(old('agente_id') == $agente->id)
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
          </div>
          <div class="col mb-0">
            <label for="apellido" class="form-label">Apellido</label>
            <input class="form-control" type="text" name="apellido" id="apellido" value="{{old('apellido',$agente->apellido)}}" />
            @error('apellido')
                      @if(old('agente_id') == $agente->id)
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
          </div>
        </div>
        <br>
        <div class="row g-2">
          <div class="col mb-0">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="text" name="email" id="email"  value="{{old('email',$agente->email)}}"/>
            @error('email')
                      @if(old('agente_id') == $agente->id)
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
          </div>
          <div class="col mb-0">
            <label for="telefono" class="form-label">Teléfono</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon11">+58</span>
              <input type="text" class="form-control" name="telefono" id="telefono" aria-label="Username" value="{{old('telefono',$agente->telefono)}}"/>
              @error('telefono')
                      @if(old('agente_id') == $agente->id)
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col mb-3">
            <label for="inmobiliaria_id" class="form-label">Seleccione la inmobiliaria donde pertenece</label>
            <select id="inmobiliaria_id" class="select2 form-select" name="inmobiliaria_id" >
              <option value="">Seleccionar Inmobiliaria</option>
              @foreach ($inmobiliarias as $inmobiliaria)
              <option value="{{$inmobiliaria->id}}">{{$inmobiliaria->nombre}}</option>
              @endforeach
            </select>
            @error('inmobiliaria_id')
                      @if(old('agente_id') == $agente->id)
                        <label class="mensaje-error">{{ $message }}</label>
                      @endif
                    @enderror
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>

@if($errors->hasAny('nombre', 'imagen','apellido', 'email', 'telefono', 'inmobiliaria_id') && old('agente_id') == $agente->id)
  {{-- Se genera un input hidden para tener una referencia a cual botón apuntar para reabrir el modal en caso de error --}}
  <input type='hidden' id="error-handler" value="{{$agente->id}}">

  <script type="application/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Se busca el value contenido en el input hidden (el id del inmobiliaria)
      const target = document.querySelector('#error-handler');

      // Se busca el botón con la clase "editar" y el atributo data-id con el id del inmobiliaria y se aprieta
      document.querySelector(`button.editar[data-id="${target.value}"]`).click();
    });
  </script>
@endif

<div class="modal fade" id="modalborrar{{ $agente->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="modal-content" action="{{ route('agente.borrar', $agente->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-header justify-content-center col-12 col-sm-12 mb-3 d-flex flex-column">
          <h2 class="modal-title" id="exampleModalLabel2">¿Está seguro de eliminar el agente?</h2>
        </div>
        <div class="modal-body">
          <center>
            <button type="submit" class="btn btn-primary">
              Confirmar
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancelar
            </button>
          </center>
        </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>
</div>