<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Main</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="{{asset('js/app.js')}}" defer></script>
</head>

<body class="antialiased">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @if (Route::has('login'))

                @auth
                <a class="nav-item nav-link" href="{{ url('/home') }}">User account</a>
                @else
                <a class="nav-item nav-link" href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                @endif
                @endauth
                @endif
                <a class="nav-item nav-link" href="{{ url('admin') }}">Admin</a>
            </div>
        </div>
    </nav>


    <div id="app">
        <user-component></user-component>
    </div>

</body>

</html>