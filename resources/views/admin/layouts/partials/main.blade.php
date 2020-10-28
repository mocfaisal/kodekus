<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('meta-content')

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
  <livewire:styles />
  @stack('styles')

</head>

<body>
  <div class="" id="app">
    @yield('master')
  </div>
  <livewire:scripts />
  @include('admin.layouts.partials.scripts')
</body>

</html>