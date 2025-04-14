<!DOCTYPE html>
<html
  lang="es"
  class="light-style layout-menu-fixed">
<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Panel de control - {{env('APP_NAME')}}</title>

  <meta name="description" content="">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('img/logo.png')}}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{asset('adm/assets/vendor/fonts/boxicons.css')}}">

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{asset('adm/assets/vendor/css/core.css')}}" class="template-customizer-core-css">
  <link rel="stylesheet" href="{{asset('adm/assets/vendor/css/theme-default.css')}}"
        class="template-customizer-theme-css">
  <link rel="stylesheet" href="{{asset('adm/assets/css/demo.css')}}">

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{asset('adm/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}">

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{asset('adm/assets/vendor/js/helpers.js')}}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{asset('adm/assets/js/config.js')}}"></script>
</head>

<body>


@yield('menu')


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('adm/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('adm/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('adm/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('adm/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('adm/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Main JS -->
<script src="{{asset('adm/assets/js/main.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Scripts propios del sistema -->
<script src="{{asset('adm/js/general.js')}}"></script>
<script src="{{asset('adm/js/usuarios.js')}}"></script>
<script src="{{asset('adm/js/repositorio.js')}}"></script>
</body>

</html>
