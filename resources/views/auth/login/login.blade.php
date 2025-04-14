@extends('_layout.app')
@section('content')

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card">
          <div class="card-body text-center">
            <h4 class="mb-2">
              <img src="{{asset('img/logo.png')}}" alt="Logotipo" class="img-fluid">
              <br><br>
              Nombre del sistema
            </h4>
            <hr>

            <form action="{{url('auth/login')}}" method="post">
              @csrf
              <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" id="correo" name="correo" autofocus value="{{ old('correo') }}"
                       required class="form-control @error('correo') is-invalid @enderror">
                @error('correo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="contrasenia">Contraseña</label>
                <input type="password" id="contrasenia" name="contrasenia" required
                       class="form-control @error('contrasenia') is-invalid @enderror">
                @error('contrasenia')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">
                  Iniciar sesión
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- / Content -->

@endsection
