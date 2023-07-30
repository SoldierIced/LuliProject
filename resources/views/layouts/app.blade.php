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
   @include("layouts.navbar")

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


            @if (Session::has('err'))
                <div class="col-12 alert alert-danger text-center alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {{ Session::pull('err') }}
                    </strong>

                </div>
            @endif
            @if (Session::has('msj'))
                <div class="col-12 alert alert-success text-center alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {{ Session::pull('msj') }}
                    </strong>
                </div>
            @endif


            <script>
                $(".alert").alert();
            </script>
            <div class="container">
                @yield('content')

            </div>
        </div>

    </main>

    <script></script>
    @yield('js')
</body>

</html>
