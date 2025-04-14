@extends('_layout.menuAdmin')
@section('content')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"> Usuarios /</span> Editar un usuario
      </h4>

      <hr>

      <div class="row">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h3 class="mb-0">Actualice la información del usuario</h3>
            </div>
            <div class="card-body">
              <form method="post" action="{{url('admin/usuario/edit')}}">
                @csrf
                <input type="hidden" id="token" name="token" value="{{$usuario->token}}">

                <h4 class="mb-0">Datos personales</h4>
                <div class="row mb-3">
                  <div class="form-group col">
                    <label for="nombre" class="col-form-label">Nombre</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-user"></i>
                      </span>
                      <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                             name="nombre" value="{{(old('nombre') != null) ? old('nombre') : $usuario->nombre}}"
                             required>
                    </div>
                    @error('nombre')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                  <div class="form-group col">
                    <label class="col-form-label" for="apellido1">Apellido 1</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-user"></i>
                      </span>
                      <input type="text" class="form-control @error('apellido1') is-invalid @enderror"
                             id="apellido1" name="apellido1"
                             value="{{(old('apellido1') != null) ? old('apellido1') : $usuario->apellido1}}"
                             required>
                    </div>
                    @error('apellido1')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                  <div class="form-group col">
                    <label class="col-form-label" for="apellido2">Apellido 2</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-user"></i>
                      </span>
                      <input type="text" class="form-control @error('apellido2') is-invalid @enderror"
                             id="apellido2" name="apellido2"
                             value="{{(old('apellido2') != null) ? old('apellido2') : $usuario->apellido1}}"
                             required>
                    </div>
                    @error('apellido2')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="form-group col">
                    <label class="col-form-label" for="correo">Correo</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-envelope"></i>
                      </span>
                      <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com"
                             required
                             value="{{(old('correo') != null) ? old('correo') : $usuario->correo}}"
                             class="form-control  @error('correo') is-invalid @enderror">
                    </div>
                    <div class="form-text">Puedes utilizar letras, números y puntos</div>
                    @error('correo')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>

                  <div class="form-group col">
                    <label class="col-form-label" for="contrasenia">Contraseña</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-envelope"></i>
                      </span>
                      <input type="text" id="contrasenia" name="contrasenia"
                             placeholder="**********"
                             class="form-control  @error('contrasenia') is-invalid @enderror">
                    </div>
                    <div class="form-text">Puedes utilizar letras, números y puntos</div>
                    @error('contrasenia')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                  <div class="form-group col">
                    <label class="form-label" for="rol">Rol</label>
                    <select id="rol" name="rol" required class="form-select @error('rol') is-invalid @enderror">
                      <option value="">- Seleccione el rol</option>
                      @foreach($roles as $rol)
                        @php($selected = ($rol->pkRol == $usuario->fkRol) ? 'selected':'')
                        <option value="{{$rol->pkRol}}" {{$selected}}>{{$rol->nombre}}</option>
                      @endforeach
                    </select>
                    @error('rol')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                </div>


                <div class="row mb-3">
                  <div class="form-group col text-center">
                    <button type="submit" class="btn btn-primary">
                      Guardar cambios
                    </button>
                    <a type="button" class="btn btn-warning text-white" href="{{url('admin/usuario')}}">
                      Cancelar
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->

@endsection
