<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>COS - Tableau de bord</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">
  @include('globals.css')
  @livewireStyles
  <link rel='shortcut icon' type='image/x-icon' href='' />
  <link rel="stylesheet" href="{{ mix("css/app.css") }}">
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      @include('dashboard.components.nav')

      @include('dashboard.components.sidebar')

      <!-- Main Content -->
      <div class="main-content">

        @yield('content')

        {{-- @include('dashboard.components.settings') --}}
      </div>
      @include('dashboard.components.footer')
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
  </script>
  @livewireScripts
  
  @include('globals.scripts')
  <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
  
   
  
</body>

</html>