
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
{{-- <div
  class="modal fade {{ $errors->hasAny('nombre', 'apellido', 'email', 'telefono') && old('suscriptor_id') == $suscriptor->id ? 'show' : '' }}"
  id="modaleditar{{$suscriptor->id}}"
  data-bs-backdrop="static"
  tabindex="-1"
  style="display: @if($errors->hasAny('nombre', 'apellido', 'email', 'telefono') && old('suscriptor_id') == $suscriptor->id) block @else none @endif"
  @if($errors->hasAny('nombre', 'apellido', 'email', 'telefono') && old('suscriptor_id') == $suscriptor->id) role="dialog" @endif
  > --}}
<div class="modal fade" id="modaleditar{{$suscriptor->id}}" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" id="editarForm" action="{{route('usuario.editar',$suscriptor->id)}}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="suscriptor_id" value="{{ $suscriptor->id}}">
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
            @error('nombre')
              @if(old('suscriptor_id') == $suscriptor->id)
                <label class="mensaje-error">{{ $message }}</label>
              @endif
            @enderror
          </div>
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
            <label for="apellido" class="form-label">Apellido</label>
            <input class="form-control" type="text" id="apellido" name="apellido" value="{{$suscriptor->apellido}}" aria-describedby="defaultFormControlHelp" />
            @error('apellido')
              @if(old('suscriptor_id') == $suscriptor->id)
                <label class="mensaje-error">{{ $message }}</label>
              @endif
            @enderror
          </div>
        </div>
        <div class="row g-2">
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="{{$suscriptor->user->email}}" aria-describedby="defaultFormControlHelp" />
            @error('email')
              @if(old('suscriptor_id') == $suscriptor->id)
                <label class="mensaje-error">{{ $message }}</label>
              @endif
            @enderror
          </div>
          <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
            <label for="telefono" class="form-label">Teléfono</label>
            <div class="input-group">
              <span class="input-group-text"  id="basic-addon11">+58</span>
              <input type="text" class="form-control" name="telefono" value="{{$suscriptor->telefono}}" aria-label="Username" aria-describedby="basic-addon11" />
              @error('telefono')
                @if(old('suscriptor_id') == $suscriptor->id)
                  <label class="mensaje-error">{{ $message }}</label>
                @endif
              @enderror
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

@if($errors->hasAny('nombre', 'apellido', 'email', 'telefono') && old('suscriptor_id') == $suscriptor->id)
  {{-- Se genera un input hidden para tener una referencia a cual botón apuntar para reabrir el modal en caso de error --}}
  <input type='hidden' id="error-handler" value="{{$suscriptor->id}}">

  <script type="application/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Se busca el value contenido en el input hidden (el id del suscriptor)
      const target = document.querySelector('#error-handler');

      // Se busca el botón con la clase "editar" y el atributo data-id con el id del suscriptor y se aprieta
      document.querySelector(`button.editar[data-id="${target.value}"]`).click();
    });
  </script>
@endif

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

<script>
  function guardarCambios() {
    $('#editarForm').submit(function(e) {
        e.preventDefault(); // Evita el comportamiento predeterminado del formulario

        var form = $(this); // Obtiene el formulario actual
        var formData = new FormData(form[0]); // Crea un objeto FormData con los datos del formulario

        $.ajax({
            url: form.attr('action'), // Obtiene la URL del formulario
            type: form.attr('method'), // Obtiene el método del formulario (PUT en este caso)
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response); // Maneja la respuesta exitosa del servidor

                // Cierra el modal si es necesario
                $('#modaleditar{{$suscriptor->id}}').modal('hide');
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Maneja el error de la solicitud Ajax

                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    // Muestra los mensajes de error en el formulario
                    for (var field in errors) {
                        var errorMessages = errors[field].join(', ');
                        form.find('#' + field).after('<span class="mensaje-error">' + errorMessages + '</span>');
                    }
                }
            }
        });
    });
  }
</script>