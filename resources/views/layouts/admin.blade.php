<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}


    <!-- Styles -->
    
    {{-- <link href="{{ asset('css/argon/nucleo/css/nucleo.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="admin">
      <div class="container-fluid">
        <div class="row">
          @include('admin.sidebar')
          <main class="py-4 col-md-9 ml-sm-auto col-lg-10 px-md-4">
              @yield('content')
          </main>
        </div>
      </div>
      
    </div>
  {{-- <script src="{{ asset('js/argon/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('js/argon/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/argon/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('js/argon/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/argon/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script> --}}
</body>
</html>
