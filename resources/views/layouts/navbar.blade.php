<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('turnos-new-view') }}">Nuevo Turno</a>
            </li>
            @if (Auth::user() != null)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('turnos') }}">Mis Turnos</a>
                </li>
            @endif
            @if (Auth::user() != null && Auth::user()->paid != null)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administrador
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin-turnos') }}">Turnos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Dias Bloqueados</a>
                        <a class="dropdown-item" href="{{route("servicios-view")}}">Servicios</a>
                        <a class="dropdown-item" href="#">Estadisticas</a>
                    </div>
                </li>
            @endif


        </ul>
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}">Login</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('logout') }}">Cerrar sesion</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
