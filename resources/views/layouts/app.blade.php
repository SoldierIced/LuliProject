<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="{{ asset('/') }}/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Pagina de laravel -</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark btn btn-outline-primary" href="{{ route('test') }}" role="button">Home</a>
            @guest
                @if (Route::has('login'))
                    <a class="p-2 text-dark btn btn-outline-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="p-2 text-dark btn btn-outline-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </form>
            @endguest
            <a class="p-2 text-dark btn btn-outline-primary" href="{{ route('test') }}" role="button">Nuevo
                turno</a>

            @if (Auth::user() != null && Auth::user()->paid != null)
                <a class="p-2 text-dark btn btn-outline-primary" href="{{ route('adminVista') }}"
                    role="button">admin</a>
            @endif
            <a class="p-2 text-dark btn btn-outline-primary" href="{{ route('mostrarturno') }}" role="button">mis
                turnos</a>
        </nav>
    </div>
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Si, aunque usted no lo crea</h1>
                <p class="lead text-muted">Nehuen les dejo la pagina funcionando con visual mas linda.</p>
                <p>
                    <a href="https://getbootstrap.com/docs/4.0/examples/album/" target="_blank"
                        class="btn btn-primary my-2"> para ver ejemplos clickme</a>
                    <a href="https://getbootstrap.com/docs/4.0/components/alerts/" target="_blank"
                        class="btn btn-secondary my-2">Para ver documentacion o componentes</a>
                </p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                @yield('content')

            </div>
        </div>

    </main>

    <script>
        @if (Session::has('err'))
            alert(" {{ Session::pull('err') }}")
        @endif
        @if (Session::has('msj'))
            alert(" {{ Session::pull('msj') }}")
        @endif
    </script>
    @yield('js')
</body>

</html>
