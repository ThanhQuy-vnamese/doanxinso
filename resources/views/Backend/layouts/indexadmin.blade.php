<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| Trang quản lý của bạn</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/css/fontawesome/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/css/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/css/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/css/adminlte.min.css')}}">
   <link rel="stylesheet" href="{{asset('public/css/adminlte1.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/css/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/css/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('public/css/bootstrap-colorpicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/css/select2-bootstrap4.min.css')}}">2332
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('public/css/bootstrap-duallistbox.min.css')}}">231
  <!--trình soạn thảo-->
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('public/css/ekko-lightbox.css')}}">
  <!-- sweet alert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
  @include('Backend.layouts.header')
  @yield('content')
  @include('Backend.layouts.footer')
  @include('sweet::alert')
  @yield('script')
</div>

<script src="{{asset('public/js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/js/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/js/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/js/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/js/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/js/moment.min.js')}}"></script>
<script src="{{asset('public/js/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/js/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/js/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/js/demo.js')}}"></script>
<!-- Filterizr-->
<script src="{{asset('public/css/jquery.filterizr.min.js')}}"></script>
<!-- Ekko Lightbox -->
<script src="{{asset('public/css/ekko-lightbox.min.js')}}"></script>


<script src="{{asset('public/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('public/js/raphael.min.js')}}"></script>
<script src="{{asset('public/js/jquery.mapael.min.js')}}"></script>
<script src="{{asset('public/js/usa_states.min.js')}}"></script>

<script src="{{asset('public/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/js/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{asset('public/js/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('public/js/adminlte.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('public/js/dashboard2.js')}}"></script>
</body>
</html>