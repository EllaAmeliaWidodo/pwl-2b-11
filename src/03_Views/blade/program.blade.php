<html>

<head>
    <title> Product @yield('title')</title>
</head>

<body>
    @section('sidebar')
    Ini adalah Halaman Program.
    @show
    <div class="container">
        @yield('content')
        <h1>Hello, we have any program</h1>
    <p >this is example of my program {{$karir}}</p>
    </div>
    
</body>

</html>