@php
$container = 'container-xxl';
$containerNav = 'container-xxl';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Container - Layouts')

@section('content')
<!-- Layout Demo -->
<div class="layout-demo-wrapper">
  <div class="layout-demo-placeholder">
    <img src="{{asset('assets/img/layouts/layout-container-light.png')}}" class="img-fluid" alt="Layout container">
  </div>
  <div class="layout-demo-info">
    <h4>Layout container</h4>
    <p>Container layout sets a <code>max-width</code> at each responsive breakpoint.</p>
  </div>
</div>

<div class="row mb-5">
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="../assets/img/elements/12.jpg" alt="Card image">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
            </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
            </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="col-md-4">
          <img class="card-img card-img-right" src="../assets/img/elements/17.jpg" alt="Card image">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mb-5">
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="../assets/img/elements/12.jpg" alt="Card image">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
            </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
            </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="col-md-4">
          <img class="card-img card-img-right" src="../assets/img/elements/17.jpg" alt="Card image">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mb-5">
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="../assets/img/elements/12.jpg" alt="Card image">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
            </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
            </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="col-md-4">
          <img class="card-img card-img-right" src="../assets/img/elements/17.jpg" alt="Card image">
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Layout Demo -->


@endsection
