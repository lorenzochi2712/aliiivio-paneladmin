<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{env('APP_NAME')}}</title>

  <link rel="shortcut icon" href="{{asset('img/ico.png')}}">

  <link rel="stylesheet" href="{{asset('adm/assets/vendor/fonts/boxicons.css')}}">

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{asset('adm/assets/vendor/css/core.css')}}" class="template-customizer-core-css">
  <link rel="stylesheet" href="{{asset('adm/assets/vendor/css/theme-default.css')}}"
        class="template-customizer-core-css">

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{asset('adm/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}">

  <!-- Page -->
  <link rel="stylesheet" href="{{asset('adm/assets/vendor/css/pages/page-auth.css')}}">

  <!-- Helpers -->
  <script src="{{asset('adm/assets/vendor/js/helpers.js')}}"></script>
  <script src="{{asset('adm/assets/js/config.js')}}"></script>

</head>
<body>

@yield('content')

<!-- Librerías JavaScript -->
<script src="{{asset('adm/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('adm/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('adm/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('adm/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('adm/assets/vendor/js/menu.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('adm/assets/js/main.js')}}"></script>

</body>
</html>
