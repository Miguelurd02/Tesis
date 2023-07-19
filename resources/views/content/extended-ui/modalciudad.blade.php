
@section('page-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<!-- Include Styles -->
@include('layouts/sections/styles')

<!-- Include Scripts for customizer, helper, analytics, config -->
@include('layouts/sections/scriptsIncludes')
@endsection

<!-- Modal Editar-->
<div class="modal fade" id="modaleditar{{$ciudad->id}}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" action="{{route('ciudad.editar',$ciudad->id)}}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="ciudad_id" value="{{ $ciudad->id}}">
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group">
        <div class="row">
          <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de la ciudad</label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="{{old('nombre',$ciudad->nombre)}}" aria-describedby="defaultFormControlHelp" />
            @error('nombre')
                      @if(old('ciudad_id') == $ciudad->id)
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

@if($errors->hasAny('nombre') && old('ciudad_id') == $ciudad->id)
  {{-- Se genera un input hidden para tener una referencia a cual botón apuntar para reabrir el modal en caso de error --}}
  <input type='hidden' id="error-handler" value="{{$ciudad->id}}">

  <script type="application/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Se busca el value contenido en el input hidden (el id del inmobiliaria)
      const target = document.querySelector('#error-handler');

      // Se busca el botón con la clase "editar" y el atributo data-id con el id del inmobiliaria y se aprieta
      document.querySelector(`button.editar[data-id="${target.value}"]`).click();
    });
  </script>
@endif

<div class="modal fade" id="modalborrar{{$ciudad->id}}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="modal-content" action="{{route('ciudad.borrar',$ciudad->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-header col-12 col-sm-12 mb-3 d-flex flex-column">
          <h2 class="modal-title" id="exampleModalLabel2">¿Está seguro de eliminar la ciudad?</h2>
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