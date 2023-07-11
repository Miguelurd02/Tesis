
@section('page-script')
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<!-- Include Styles -->
@include('layouts/sections/styles')

<!-- Include Scripts for customizer, helper, analytics, config -->
@include('layouts/sections/scriptsIncludes')
@endsection

<!-- Modal Editar-->
<div class="modal fade" id="modaleditar{{$sector->id}}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" action="{{route('sector.editar',$sector->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body form-group">
        <div class="row">
          <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre del sector</label>
            <input class="form-control" type="text" id="nombre" name="sector" value="{{$sector->nombre}}" aria-describedby="defaultFormControlHelp" />
          </div>
        </div>
        <div class="row g-2">
            <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Nombre de la ciudad</label>
                <input class="form-control" type="text" id="ciudad" name="ciudad" value="{{$sector->ciudad->nombre}}" readonly />
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
          <h2 class="modal-title" id="exampleModalLabel2">¿Está seguro de eliminar el sector?</h2>
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