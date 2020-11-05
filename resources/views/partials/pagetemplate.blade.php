<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Ecommerce</title>

        <!--fonts-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&family=Roboto&display=swap" rel="stylesheet"
        <!--styles-->
      <link rel="stylesheet" href="{{asset('css/main.css')}}">
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    </head>
    <body>
        @include('partials.header')


         @yield('page-content')



         @if( Route::is('confirmation.index') || Route::is('register') ||  Route::is('login'))
           @include('partials.stickyfooter')

         @else
           @include('partials.footer')
         @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

         @yield('scripts')
    </body>
</html>
