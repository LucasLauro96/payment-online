<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">

    <title>Pagamentos Online</title>
</head>

<body>
    
    
    @yield('content')
    
    
    <!-- JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</body>

</html>
