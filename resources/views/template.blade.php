<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>PBK {{ !(empty($halaman)) ? '| ' . ucwords($halaman) : '' }}</title>
  
  {{-- Panggil link css --}}
  @include('include.css-link')
  @yield('css-add')

</head>

{{-- @if(Auth::check()) --}}
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('include.header')
    @include('include.sidebar')
    @yield('content')
    @include('include.footer')
  </div>
  {{--
@else
  <body class="layout-top-nav no-aut login-page">
    @yield('content')
@endif
--}}
{{-- Panggil link css --}}
<!-- JQuery -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<!-- Data Tables -->
<script src="{{asset ('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/laravelapp.js') }}"></script>

@yield('js-add')
</body>
</html>