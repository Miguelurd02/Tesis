@extends('layouts/contentNavbarLayout')

@section('title', 'Toasts - UI elements')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/vistaprop.css') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> <span class="text-muted fw-light">Inmobiliarias</span> / #{{$propiedades->id}}</h4>

<div class="row g-4 mb-5">
  <div class="col-md-8">
    <div class="card-container">
      <div class="carousel1">
      <div id="property-carousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores -->
        <ol class="carousel-indicators">
          @foreach($propiedades->imagenes as $key => $imagen)
            <li data-bs-target="#property-carousel" data-bs-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}"></li>
          @endforeach
        </ol>
      
        <!-- Slides -->
        <div class="carousel-inner">
          @foreach($propiedades->imagenes as $key => $imagen)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
              <a href="#modal-{{$key}}" data-bs-toggle="modal" data-bs-target="#modal-{{$key}}">
                <img class="d-block w-100" src="{{ asset('assets/img/propiedades/' . $imagen->nombre_foto) }}" alt="Imagen de la propiedad">
              </a>
            </div>
          @endforeach
        </div>
      
        <!-- Controles -->
        <a class="carousel-control-prev" href="#property-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#property-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
    </div>
     <!-- MODAL -->
      @foreach($propiedades->imagenes as $key => $imagen)
  <div class="modal fade modal-lg-custom" id="modal-{{$key}}" tabindex="-1" aria-labelledby="modal-{{$key}}-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="carousel2">
        <!-- Carousel -->
        <div id="modal-carousel-{{$key}}" class="carousel slide" data-bs-ride="carousel">
          <!-- Indicadores -->
          <ol class="carousel-indicators">
            @foreach($propiedades->imagenes as $i => $img)
              <li data-bs-target="#modal-carousel-{{$key}}" data-bs-slide-to="{{ $i }}" class="{{ $i === $key ? 'active' : '' }}"></li>
            @endforeach
          </ol>

          <!-- Slides -->
          <div class="carousel-inner">
            @foreach($propiedades->imagenes as $i => $img)
              <div class="carousel-item {{ $i === $key ? 'active' : '' }}">
                <img class="d-block w-100" src="{{ asset('assets/img/propiedades/' . $img->nombre_foto) }}" alt="Imagen de la propiedad">
              </div>
            @endforeach
          </div>

          <!-- Controles -->
          <a class="carousel-control-prev" href="#modal-carousel-{{$key}}" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#modal-carousel-{{$key}}" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
    </div>
    </div>
  </div>
@endforeach

      
    
        <div class="card-body">
          <h5 class="propierty-title">{{$propiedades->titulo}}</h5>
          <div class="price">{{$propiedades->precio}}</div>
          <br>
          <div class="descripcion" style="height: 200px; overflow-y: auto;">
            {!! nl2br($propiedades->descripcion) !!}
          </div>
        </div>
      </div>
     
    </div>
    <!--CONTENEDOR DE DETALLES DE AGENTE -->
    <div class="col-md-4 agente-container">
      <div class="card-body-profile text-center" bis_skin_checked="1">
        <img src="{{ asset('assets/img/agentes/' . $propiedades->agentes->imagen) }}" alt="agente imagen" class="card-img-top-agente">
        <h2 class="card-title-agente">{{$propiedades->agentes->nombre}} {{$propiedades->agentes->apellido}}</h2>
        <p class="mb-4 inmo-detail"><span class="material-symbols-outlined">apartment</span> {{$propiedades->agentes->inmobiliaria->nombre}}</p>
        <div class="d-flex flex-column align-items-center">
          <form action="{{ route('ui-toasts.send', ['id' => $propiedades->id]) }}" method="GET">
            <input type="hidden" name="propiedadId" value="{{ $propiedades->id }}">
            <div class="text-center">
              <label for="mensaje">Mensaje:</label>
            </div>
            <div class="d-flex flex-column align-items-center">
              <textarea id="mensaje" name="mensaje" rows="5" readonly>Hola! Estoy interesado en esta propiedad.</textarea>
              <button id="btnEnviar" type="submit" class="btn btn-primary mt-3">Enviar</button>
            </div>
          </form>
            <!--Mensaje de exito -->
          @if(session()->has('success'))
          <div class="alert alert-success">
        {{ session('success') }}
           </div>
        @endif

        </div>
      </div>
    </div>
<!--FIN DE CONTENEDOR DE DETALLES DE AGENTE -->   
  </div>
  <!--CONTENEDOR DE DETALLES DE PROPIEDAD -->
          <div class="row detalles g-4 mb-5">
           <div class="col-md-12">
            <div class="card-container-det">
            <div class="card-body-prop">
              <div class="row titulo">
                <div class="mb-3 col">
              <h3 class="card-title">DETALLES DE LA PROPIEDAD</h3>
              </div>
            </div>
              <div class="detalles-container">
              <div class="row detalles">
                <div class="mb-3 col-md-3">
                  <h3>Habitaciones</h3>
                  <span class="icon-label"><i class="material-icons">bed</i></span>
                  <span class="detail-label">{{$propiedades->habitaciones}}</span>
                </div>
                <div class="mb-3 col-md-4">
                  <h3>Estacionamientos</h3>
                  <span class="icon-label"><i class="material-icons">directions_car</i></span>
                  <span class="detail-label">{{$propiedades->estacionamiento}}</span>
                </div>
                <div class="mb-3 col-md-2">
                  <h3>Baños</h3>
                  <span class="icon-label"><i class="material-icons">bathtub</i></span>
                  <span class="detail-label">{{$propiedades->banos}}</span>
                </div>
                <div class="mb-3 col-md-2">
                  <h3>Plantas</h3>
                  <span class="icon-label"><i class="material-icons">apartment</i></span>
                  <span class="detail-label">{{$propiedades->plantas}}</span>
                </div>
              </div>
              <div class="row detalles">
                <div class="mb-3 col-md-3">
                  <h3>Dimension</h3>
                  <span class="detallesrow2">{{$propiedades->dimension}} m<sup>2</sup> de construcción</span>
                </div>
                <div class="mb-3 col-md-4">
                  <h3>Ubicación</h3>
                  <span class="detallesrow2">{{$propiedades->sector->nombre}}-{{$propiedades->sector->ciudad->nombre}}</span>
                </div>
                <div class="mb-3 col-md-2">
                  <h3>Contrato</h3>
                  <span class="detallesrow2">{{$propiedades->contrato}}</span>
                </div>
                <div class="mb-3 col-md-2">
                  <h3>Publicación</h3>
                  <span class="detalles-fecha">{{$propiedades->created_at->format('Y-m-d')}}</span>
                </div>
              </div>
             </div>
            </div>
          </div>
         </div>
        </div>
<!-- FIN DE CONTENEDOR DE DETALLES DE PROPIEDAD -->

  
   


@endsection

<!-- SCRIPTS UTILIZADOS -->


<script>
  $(document).ready(function() {
    var mensajePredeterminado = 'Hola! Estoy interesado en esta propiedad.';

    // Al hacer clic dentro del textarea, se remue el atributo readonly
    $('#mensaje').click(function() {
      $(this).removeAttr('readonly');
    });

    // Al perder el enfoque del textarea, si está vacío, se agrega el mensaje predeterminado y se vuelve readonly
    $('#mensaje').blur(function() {
      if ($(this).val().trim() === '') {
        $(this).val(mensajePredeterminado).attr('readonly', true);
      }
    });
  });

</script>

<!-- CAROUSEL -->
<script>
  $(document).ready(function () {
      $('#property-carousel').carousel();
  });
</script>

<!-- MODAL -->
<script>
  $(document).ready(function() {
      $('.image-link').on('click', function(event) {
          event.preventDefault();
          var target = $(this).attr('data-target');
          $(target).modal('show');
      });
  });
</script>

<script>
  $(window).on('resize', function() {
  var windowWidth = $(window).width();
  
  // Define el ancho máximo de la ventana en la que se mostrará el modal
  var maxWidth = 768; // Cambia este valor según tus necesidades
  
  // Comprueba si la ventana se ha vuelto más pequeña que el ancho máximo
  if (windowWidth < maxWidth) {
    $('#miModal').modal('hide'); // Oculta el modal
  }
});

</script>




