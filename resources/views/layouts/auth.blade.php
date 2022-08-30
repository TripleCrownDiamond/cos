<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>COS - Connexion/Inscription</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    @include('globals.css')
    @livewireStyles
    <link rel='shortcut icon' type='image/x-icon' href='' />
    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
</head>

<body>
  {{-- <div class="loader"></div> --}}
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="mx-auto text-center d-block">
            <img @class(['']) style="width: 22%" src="{{ asset('canal-plus-logo.png') }}" alt="" /> 
            <h3 >OPERATOR SYSTEM</h3>
            <p class="pb-1 p—3" >Gestion des opérations Canal+</p>

            @if (  app('request')->input('agency_id'))
                   
            @else
                {{-- <h4 class="pb-2 p—3">L'Affairiste Store</h4> --}}
            @endif
           
           
        </div>
        @yield('content')
      </div>
    </section>
  </div>
    <!-- General JS Scripts -->
    @livewireScripts

    @include('globals.scripts')
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
   
    <script>
      window.addEventListener('error', event => {
          swal('Oups', event.detail.content, 'error', {
            buttons: false,
            timer: 3000,
          });
      });
      window.addEventListener('success', event => {
          swal('Bien joué', event.detail.content, 'success', {
            buttons: false,
            timer: 3000,
          });
      });
  </script>
</body>
<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>