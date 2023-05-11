@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">¡Bienvenido administrador! 🎉</h5>
            <p class="mb-4">Recuerda ser sumamente <span class="fw-bold">CUIDADOSO</span> con la información presente en las bases de dato y realizar las respectivas copias de seguridad.</p>

          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Total Revenue -->
  <!--/ Total Revenue -->
</div>
<div class="row">
  <!-- Order Statistics -->
  <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
            <div class="card-title">
              <h5 class="text-nowrap mb-2">Usuarios</h5>
              <span class="badge bg-label-warning rounded-pill">Year 2021</span>
            </div>
            <div class="mt-sm-auto">
              <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small>
              <h3 class="mb-0">$84,686k</h3>
            </div>
          </div>
          <div id="profileReportChart"></div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Order Statistics -->

  <!-- Expense Overview -->
  <div class="col-md-6 col-lg-4 order-1 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
            <div class="card-title">
              <h5 class="text-nowrap mb-2">Empresas</h5>
              <span class="badge bg-label-warning rounded-pill">Year 2021</span>
            </div>
            <div class="mt-sm-auto">
              <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small>
              <h3 class="mb-0">$84,686k</h3>
            </div>
          </div>
          <div id="profileReportChart"></div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Expense Overview -->

  <!-- Transactions -->
  <div class="col-md-6 col-lg-4 order-2 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
            <div class="card-title">
              <h5 class="text-nowrap mb-2">Agentes</h5>
              <span class="badge bg-label-warning rounded-pill">Year 2021</span>
            </div>
            <div class="mt-sm-auto">
              <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small>
              <h3 class="mb-0">$84,686k</h3>
            </div>
          </div>
          <div id="profileReportChart"></div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Transactions -->
</div>
<div class="row">
  <!-- Order Statistics -->
  <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
            <div class="card-title">
              <h5 class="text-nowrap mb-2">Ciudades</h5>
              <span class="badge bg-label-warning rounded-pill">Year 2021</span>
            </div>
            <div class="mt-sm-auto">
              <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small>
              <h3 class="mb-0">$84,686k</h3>
            </div>
          </div>
          <div id="profileReportChart"></div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Order Statistics -->

  <!-- Expense Overview -->
  <div class="col-md-6 col-lg-4 order-1 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
            <div class="card-title">
              <h5 class="text-nowrap mb-2">Sectores</h5>
              <span class="badge bg-label-warning rounded-pill">Year 2021</span>
            </div>
            <div class="mt-sm-auto">
              <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small>
              <h3 class="mb-0">$84,686k</h3>
            </div>
          </div>
          <div id="profileReportChart"></div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Expense Overview -->

  <!-- Transactions -->
  <div class="col-md-6 col-lg-4 order-2 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
            <div class="card-title">
              <h5 class="text-nowrap mb-2">Propiedades</h5>
              <span class="badge bg-label-warning rounded-pill">Year 2021</span>
            </div>
            <div class="mt-sm-auto">
              <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small>
              <h3 class="mb-0">$84,686k</h3>
            </div>
          </div>
          <div id="profileReportChart"></div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Transactions -->
</div>
@endsection
