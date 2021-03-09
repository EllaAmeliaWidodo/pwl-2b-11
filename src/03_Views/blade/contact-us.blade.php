<html>

<head>
    <title> contact-us @yield('title')</title>
</head>

<body>
    @section('sidebar')
    Ini adalah Halaman contact-us.
    @show
    <div class="container">
        @yield('content')
    <p >more information : {{$name}}</p>
    </div>
    
</body>

</html>