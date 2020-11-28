<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Ecommerce | @yield('title', '')</title>

        <!--fonts-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&family=Roboto&display=swap" rel="stylesheet">
        <!--styles-->
      <link rel="stylesheet" href="{{secure_asset('css/main.css')}}">
      <link rel="stylesheet" href="{{secure_asset('css/responsive.css')}}">


      @yield('extra-css')

    </head>
    <body>
       <header>
         @include('partials.header')
       </header>



         @yield('page-content')


         @if( Route::is('confirmation.index') )
           @include('partials.stickyfooter')

         @else
           @include('partials.footer')
         @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

         @yield('scripts')
    </body>
</html>
