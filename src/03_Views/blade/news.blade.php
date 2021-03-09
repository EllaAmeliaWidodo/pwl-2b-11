<html>

<head>
    <title> News @yield('title')</title>
</head>

<body>
    @section('sidebar')
    Ini adalah Halaman News.
    @show
    <div class="container">
        @yield('content')
        <h1>Hello, This is news</h1>
    <p >Page news</p>
    </div>
    
</body>

</html>