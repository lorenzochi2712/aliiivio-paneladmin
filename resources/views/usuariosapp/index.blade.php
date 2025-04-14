@extends('_layout.menuAdmin')
@section('content')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"> Usuarios /</span> Lista de usuarios administradores
      </h4>

      <hr>

      <!-- Responsive Table -->
      <div class="card">
        @if ($message = Session::get('data'))
          <div class="alert alert-{{$message['class']}} alert-dismissible fade show" role="alert">
            <strong>¡Notificación!</strong>
            <br>
            {{$message['message']}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <h3 class="card-header text-center">Lista de usuarios registrados</h3>

        <div class="text-center">
          <a type="button" class="btn btn-primary text-white" href="{{url('admin/usuario/create')}}">
            <span class="tf-icons bx bx-user"></span>&nbsp; Registrar usuario
          </a>
        </div>
        <br><br>


        <div class="table-responsive ">
          <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Rol</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @if(count($usuarios) > 0)
              @foreach($usuarios as $usuario)
                <tr class="text-center">
                  <th scope="row" class="text-center">{{$loop->index + 1}}</th>
                  <td>
                    {{$usuario->nombre}} {{$usuario->apellido1}} {{$usuario->apellido2}}
                  </td>
                  <td>{{$usuario->correo}}</td>
                  <td>{{$usuario->rol->nombre}}</td>
                  <td class="text-center">
                    <a type="button" class="btn btn-icon btn-sm btn-outline-warning"
                       href="{{url('admin/usuario/show/' . $usuario->token)}}">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </a>
                    <button type="button" class="btn btn-icon btn-sm btn-outline-danger"
                            onclick="eliminaUsuario('{{$usuario->token}}')">
                      <span class="tf-icons bx bx-trash-alt"></span>
                    </button>
                  </td>
                </tr>
              @endforeach
            @else
              <tr class="text-center">
                <td colspan="6">
                  No hay registros disponibles
                </td>
              </tr>
            @endif
            </tbody>
          </table>
        </div>

      </div>
      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->

@endsection
