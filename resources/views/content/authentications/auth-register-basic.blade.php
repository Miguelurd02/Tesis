@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/css/administrador/admincc.css') }}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <img src="{{ asset('assets/img/img2/agente-inmobiliario.png')}}" width=30>
            <a href="{{url('/')}}" class="app-brand-link gap-2">
    
              <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Registrar nueva cuenta</h4>
          <p class="mb-4">Estás a un solo paso de unirtenos! Por favor rellena los campos para completar tu registro.</p>

          <form id="formAuthentication" class="mb-3" action="/auth/register-basic" method="POST">
            @csrf
            <input type="hidden" name="acceso" id="acceso" value="1">
            <div class="mb-3">
              <label for="email" class="form-label">Nombre de Usuario</label>
              <input type="text" class="form-control" id="username" value="{{old('username')}}" name="username" placeholder="Ingresa tu nombre de usuario">
              @error('username')
                <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="Ingresa tu correo electrónico">
              @error('email')
                <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Contraseña</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              @error('password')
                  <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Confirmar contraseña</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              @error('password_confirmation')
                <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
              @enderror
            </div>

            <div class="mb-3">
              <label for="rol" class="form-label">Rol</label>
              <select class="form-select" aria-label="Default select example"  id="rol" name="rol">
                <option value="">Seleccione un rol</option>
                <option value="inmobiliaria">Inmobiliaria</option>
                <option value="suscriptor">Suscriptor</option>
                
              </select>
              @error('rol')
                <label class="mensaje-error" style="color:darkred">{{ $message }}</label>
              @enderror
            </div>
        
            <input type="button" class="btn btn-primary d-grid w-100" onclick="actualizarAcceso()" value="Registrarse">
          </form>

          <script>
            function actualizarAcceso() {
                event.preventDefault();
                const selectRol = document.getElementById('rol');
                const inputAcceso = document.getElementById('acceso');
                
                if (selectRol.value === 'inmobiliaria') {
                    inputAcceso.value = '0'; // 0 para acceso desactivado
                } else {
                    inputAcceso.value = '1'; // 1 para acceso activado
                }
                // Verificamos que el valor se haya actualizado correctamente
                console.log(inputAcceso.value);
                // Enviamos el formulario manualmente después de actualizar el acceso
                document.getElementById('formAuthentication').submit();
            }
        </script>
          

          <p class="text-center">
            <span>¿Ya posee una cuenta?</span>
            <a href="{{url('auth/login-basic')}}">
              <span>Iniciar Sesión</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>
@endsection
