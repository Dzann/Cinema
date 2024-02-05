<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - SiPalingCinema😜</title>
    <link href={{ asset('css/bootstrap.css') }} rel="stylesheet">
    <link href={{ asset('css/style.css') }} rel="stylesheet">
    <style>
        
    </style>
</head>
<body>
    @yield('body')
    <script src={{ asset('js/jquery.js') }}></script>
    <script src={{ asset('js/bootstrap.js') }}></script>

    
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
</body>
</html>
