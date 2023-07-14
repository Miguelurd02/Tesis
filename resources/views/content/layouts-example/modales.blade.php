@section('page-script')
    <link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
    <script src="{{ asset('assets/js/ui-modals.js') }}"></script>
    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')
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
                    <div class="col-12 col-sm-3 mb-3 d-flex flex-column">
                        <label for="nombre" class="form-label">Logo</label>
                        <img class="modal-inmo rounded"
                            src="{{ asset('assets/img/inmobiliarias/' . $inmobiliaria->imagen) }}"
                            alt="Card image cap" />
                        <br>
                        <label for="nombre" class="form-label">Nombre de la empresa</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                            value="{{ $inmobiliaria->nombre }}" readonly>
                    </div>
                    <div class="col-12 col-sm-9 mb-2 d-flex flex-column" style="padding-left: 2%">
                        <div class="row g-2">
                            <div class="col-12 col-sm-6 mb-2 d-flex flex-column">
                                <label for="nombre" class="form-label">Nombre de usuario</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    value="{{ $inmobiliaria->user->username }}" readonly>

                                <label for="nombre" class="form-label" style="padding-top: 3%">Rif</label>
                                <div class="input-group" bis_skin_checked="1">
                                    <span class="input-group-text" id="basic-addon11">J-</span>
                                    <input type="text" class="form-control" value="{{ $inmobiliaria->rif }}"
                                        aria-label="Username" aria-describedby="basic-addon11" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mb-2 d-flex flex-column">
                                <label for="nombre" class="form-label">Correo Electrónico</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    value="{{ $inmobiliaria->user->email }}" readonly>

                                <label for="nombre" class="form-label" style="padding-top: 3%">teléfono</label>
                                <div class="input-group" bis_skin_checked="1">
                                    <span class="input-group-text" id="basic-addon11">+58</span>
                                    <input type="text" class="form-control" value="{{ $inmobiliaria->telefono }}"
                                        aria-label="Username" aria-describedby="basic-addon11" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
                                <label for="nombre" class="form-label">Localización</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    value="{{ $inmobiliaria->direccion }}" readonly>

                                <label for="exampleFormControlTextarea1" class="form-label"
                                    style="padding-top: 3%">Descripción</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{ $inmobiliaria->descripcion }}</textarea>
                            </div>
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
<div class="modal fade" id="modaleditar{{ $inmobiliaria->id }}" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" action="{{ route('empresa.editar', $inmobiliaria->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h2 class="modal-title" id="backDropModalTitle">Editar</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body form-group">
                <div class="row">
                    <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
                        <label for="usuario" class="form-label">Nombre de usuario</label>
                        <input type="text" id="usuario" name="usuario" class="form-control"
                            value="{{ $inmobiliaria->user->username }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
                        <label for="imagen" class="form-label">Logo</label>
                        <input class="form-control" name="imagen" type="file" id="formFile">
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex flex-column">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="text" id="email" name="email" class="form-control"
                            value="{{ $inmobiliaria->user->email }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                        <label for="nombre" class="form-label">Nombre de la empresa</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                            value="{{ $inmobiliaria->nombre }}">
                    </div>
                    <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                        <label for="rif" class="form-label">Rif</label>
                        <div class="input-group" bis_skin_checked="1">
                            <span class="input-group-text" id="basic-addon11">J-</span>
                            <input type="text" name="rif" class="form-control"
                                value="{{ $inmobiliaria->rif }}" aria-label="Username"
                                aria-describedby="basic-addon11">
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 mb-3 d-flex flex-column">
                        <label for="telefono" class="form-label">teléfono</label>
                        <div class="input-group" bis_skin_checked="1">
                            <span class="input-group-text" id="basic-addon11">+58</span>
                            <input type="text" name="telefono" class="form-control"
                                value="{{ $inmobiliaria->telefono }}" aria-label="Username"
                                aria-describedby="basic-addon11">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 mb-3 d-flex flex-column">
                        <label for="direccion" class="form-label">Localización</label>
                        <input type="text" id="direccion" name="direccion" class="form-control"
                            value="{{ $inmobiliaria->direccion }}">
                    </div>
                </div>
                <div class="row">
                    <div bis_skin_checked="1">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ $inmobiliaria->descripcion }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalborrar{{ $inmobiliaria->id }}" data-bs-backdrop="static" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="modal-content" action="{{ route('empresa.borrar', $inmobiliaria->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header col-12 col-sm-12 mb-3 d-flex flex-column">
                    <h2 class="modal-title" id="exampleModalLabel2">¿Está seguro de eliminar la empresa?</h2>
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
