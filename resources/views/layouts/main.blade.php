<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token">
    <title>SGX | {{$titulo}}</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/dtb5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/b5dt.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="shortcut icon" href="{{asset('icons/xanna.ico')}}" type="image/x-icon">
</head>
<body>
    @include('sweetalert::alert')
    @auth
        @include('shared/nav')
        @include('shared/footer')
    @endauth
    @yield('contenido')
    <script src="{{asset('js/jq.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{asset('js/jq.dt.min.js')}}"></script>
    <script src="{{asset('js/dt.b5.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('scripts')
</body>
</html> 