@extends('_layout.menuAdmin')
@section('content')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"> Usuarios /</span> Registrar un usuario
      </h4>

      <hr>

      <div class="row">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="text-center">Ingrese los datos del nuevo usuario</h3>
            </div>
            <div class="card-body">
              <form method="post" action="{{url('admin/usuario/save')}}">
                @csrf
                <h4 class="mb-0">Datos personales</h4>
                <div class="row mb-3">
                  <div class="form-group col">
                    <label for="nombre" class="col-form-label">Nombres</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-user"></i>
                      </span>
                      <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                             name="nombre" value="{{old('nombre')}}" required>
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
                             id="apellido1" name="apellido1" value="{{old('apellido1')}}" required>
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
                             id="apellido2" name="apellido2" value="{{old('apellido2')}}" required>
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
                             value="{{old('correo')}}"
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
                             placeholder="***********"
                             value="{{old('contrasenia')}}"
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
                        <option value="{{$rol->pkRol}}">{{$rol->nombre}}</option>
                      @endforeach
                    </select>
                    @error('rol')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                </div>

                {{--
                <hr>

                <h4 class="mb-0">Datos laborales</h4>
                <div class="row mb-3">
                  <div class="form-group col">
                    <label for="areaFormUsuario" class="col-form-label">Área</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-selection"></i>
                      </span>
                      <select class="form-select @error('area') is-invalid @enderror" id="areaFormUsuario"
                              name="area" required>
                        <option value="">- Seleccione una opción</option>
                          <?php $selected = '' ?>
                        @foreach($areas as $area)
                          @if(old('area') && old('area') == $area->token)
                              <?php $selected = 'selected' ?>
                          @endif
                          <option value="{{$area->token}}" {{$selected}}>
                            {{$area->nombre}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    @error('area')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                  <div class="form-group col">
                    <label for="departamentoFormUsuario" class="col-form-label">Departamento</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-selection"></i>
                      </span>
                      <select id="departamentoFormUsuario" name="departamento" required
                              class="form-select @error('departamento') is-invalid @enderror">
                        <option value="">- Seleccione una opción</option>
                      </select>
                    </div>
                    @error('departamento')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                  <div class="form-group col">
                    <label for="puesto" class="col-form-label">Puesto</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-selection"></i>
                      </span>
                      <select class="form-select @error('puesto') is-invalid @enderror" id="puesto"
                              name="puesto" required>
                        <option value="">- Seleccione una opción</option>
                        @foreach($puestos as $puesto)
                            <?php $selected = '' ?>
                          @if(old('puesto') && old('puesto') == $puesto->token)
                              <?php $selected = 'selected' ?>
                          @endif
                          <option value="{{$puesto->token}}" {{$selected}}>
                            {{$puesto->nombre}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    @error('puesto')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="form-group col-md-4">
                    <label class="col-form-label" for="fechaIngreso">Fecha de ingreso al ITSP</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">
                        <i class="bx bx-calendar"></i>
                      </span>
                      <input type="date" class="form-control @error('fechaIngreso') is-invalid @enderror"
                             id="fechaIngreso" name="fechaIngreso" value="{{old('fechaIngreso')}}" required>
                    </div>
                    @error('fechaIngreso')
                    <p class="text-danger">
                      {{$message}}
                    </p>
                    @enderror
                  </div>
                </div>
                --}}

                <div class="row">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">
                      Registrar
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
