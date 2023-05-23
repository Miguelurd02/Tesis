@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic   - UI elements')

@section('vendor-script')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/css/propiedades/cards.css') }}" />
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menú /</span> Propiedades</h4>


<!-- Grid Card -->

<!-- Estilo para ajustar el tamaño de las fotos -->
<style>
  .card-img-top {
    object-fit: cover;
    height: 300px; /* Ajusta la altura deseada para las imágenes */
  }

  .card {
    height: 100%;
  }
</style>

<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
  <div class="col">
    <a href="">
    <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
      <img class="card-img-top" src="{{asset('assets/img/propiedades/casa-con-vista-al-mar.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Casa con vista a la playa</h5>
        <p class="card-direccion">Maracaibo, El Milagro</p>
        <p class="card-construccion">300m² de construcción</p>
        <p class="card-description">Encantadora casa de playa ubicada en un pintoresco destino costero. Disfruta de vistas impresionantes al océano desde cada habitación. La casa cuenta con amplias áreas de estar, terraza privada frente al mar y acceso directo a la playa de arena blanca. Ideal para relajarse, disfrutar del sol y escuchar el sonido de las olas rompiendo en la orilla.</p>
        <div class="property-details">
          <div class="property-detail">
            <span class="material-icons">bathtub</span> 3
          </div>
          <div class="property-detail">
            <span class="material-icons">bed</span> 4
          </div>
          <div class="property-detail">
            <span class="material-icons">apartment</span> 2
          </div>
          <div class="property-detail">
            <span class="material-icons">local_parking</span> 2
          </div>
        </div>
        <div class="price">$250,000</div>
      </div>
    </div>
  </a>
  </div>
  <div class="col">
    <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
      <img class="card-img-top" src="{{asset('assets/img/propiedades/casa-suburbio.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Casa en los suburbios</h5>
        <p class="card-direccion">Maracaibo, El Milagro</p>
        <p class="card-text">100m² de construcción</p>
        <p class="card-description">Encantadora casa ubicada en un tranquilo vecindario de los suburbios. Esta casa familiar ofrece comodidad y funcionalidad con amplios espacios interiores y exteriores. Cuenta con un hermoso jardín, una terraza cubierta para disfrutar de barbacoas al aire libre y una zona de juegos para los niños. A pocos minutos de tiendas, parques y escuelas, esta propiedad es perfecta para una vida familiar cómoda y conveniente en los suburbios.</p>
        <div class="property-details">
          <div class="property-detail">
            <span class="material-icons">bathtub</span> 3
          </div>
          <div class="property-detail">
            <span class="material-icons">bed</span> 4
          </div>
          <div class="property-detail">
            <span class="material-icons">apartment</span> 2
          </div>
          <div class="property-detail">
            <span class="material-icons">local_parking</span> 2
          </div>
        </div>
        <div class="price">$250,000</div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
      <img class="card-img-top" src="{{asset('assets/img/propiedades/casa-de-campo.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Casa de Campo</h5>
        <p class="card-direccion">Maracaibo, El Milagro</p>
        <p class="card-text">400m² de construcción</p>
        <p class="card-description">Bienvenido a esta encantadora casa de campo rodeada de exuberante vegetación y paisajes serenos. La propiedad ofrece un ambiente tranquilo y relajante, perfecto para escapar del bullicio de la ciudad. Disfruta de amplios jardines, una acogedora chimenea y una terraza privada con vistas panorámicas al campo. Ideal para aquellos que buscan paz y tranquilidad en medio de la naturaleza.</p>
        <div class="property-details">
          <div class="property-detail">
            <span class="material-icons">bathtub</span> 3
          </div>
          <div class="property-detail">
            <span class="material-icons">bed</span> 4
          </div>
          <div class="property-detail">
            <span class="material-icons">apartment</span> 2
          </div>
          <div class="property-detail">
            <span class="material-icons">local_parking</span> 2
          </div>
        </div>
        <div class="price">$250,000</div>
      </div>
    </div>
  </div>
  
  <div class="col">
    <div class="card h-100" onmouseover="addShadow(this)" onmouseout="removeShadow(this)">
      <img class="card-img-top" src="{{asset('assets/img/propiedades/casa-con-vista-al-mar.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Casa con vista a la playa</h5>
        <p class="card-direccion">Maracaibo, El Milagro</p>
        <p class="card-text">300m² de construcción</p>
        <p class="card-description">Encantadora casa de playa ubicada en un pintoresco destino costero. Disfruta de vistas impresionantes al océano desde cada habitación. La casa cuenta con amplias áreas de estar, terraza privada frente al mar y acceso directo a la playa de arena blanca. Ideal para relajarse, disfrutar del sol y escuchar el sonido de las olas rompiendo en la orilla.</p>
        <div class="property-details">
          <div class="property-detail">
            <span class="material-icons">bathtub</span> 3
          </div>
          <div class="property-detail">
            <span class="material-icons">bed</span> 4
          </div>
          <div class="property-detail">
            <span class="material-icons">apartment</span> 2
          </div>
          <div class="property-detail">
            <span class="material-icons">local_parking</span> 2
          </div>
        </div>
        <div class="price">$250,000</div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/18.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/19.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="{{asset('assets/img/elements/20.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
</div>


<!--/ Card layout -->
@endsection
<script>
  function addShadow(element) {
  element.classList.add("shadow-effect");
}

function removeShadow(element) {
  element.classList.remove("shadow-effect");
}

</script>
