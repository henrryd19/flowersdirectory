<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web\css\all.min.css')}}">
</head>

<body>
    @include('layouts.header')
    @yield('main')

    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    @yield('scripts')
  
</body>

</html>