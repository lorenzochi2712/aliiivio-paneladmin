@extends('_layout.menuAdmin')
@section('content')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-lg-12 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-md-7">
                <div class="card-body">
                  <h3 class="card-title text-primary">¡Bienvenido al sistema de administración!</h3>
                  <p class="mb-4">
                    Has iniciado sesión como <u>{{auth()->user()->nombre}} {{auth()->user()->apellido1}}</u>.
                  </p>
                </div>
              </div>
              <div class="col-md-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img
                    src="{{asset('adm/assets/img/illustrations/man-with-laptop-light.png')}}"
                    height="140"
                    alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 mb-4 order-0">
          <div class="card">
            <div class="row">
              <div class="col-md-12">
                <br>
                <h3 class="text-info text-center">Avisos</h3>
              </div>
              <div class="card-body">
                <div class="row">


                </div>
              </div>
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
