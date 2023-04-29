@extends('layouts.app')

@section('content')
    <div class="row">
        <h2 class="col-12">Turnos </h2>


        <form class="row col-12" method="GET" action="{{ route('adminVista') }}">
            {{-- @csrf --}}
            <div class="col-6">
                <input class="form-control" type="date" name="filtroFecha">

                <button type="submit" class=" btn btn-primary">Filtrar</button>
            </div>
            <div class="col-6 alert alert-warning" role="alert">
                {{ $filtroTexto }}
            </div>
        </form>

        <div class="row col-12">
            @foreach ($turnos as $turno)
                {{-- cada turno de todos los turnos. --}}
                <form class="card col-6" method="POST" action="{{ route('admin-guardar-turno') }}">
                    @csrf
                    <div class="card-body">
                        <h5 class="card-title">
                            TURNO N° {{ $turno->id }} -
                        </h5>
                        <p class="card-text">
                            Cliente: {{ $turno->user->name }} -
                            Horario: {{ $turno->horario }} -
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Dia: {{ $turno->dia }} </li>
                        @if ($turno->user->telefono != null)
                            <li class="list-group-item">
                                Telefono : {{ $turno->user->telefono }}
                            </li>
                        @endif
                        <li class="list-group-item">
                            Comentarios:
                            <input type="text" class="form-control" name="comentario" value="234">
                            <input type="hidden" class="form-control" name="turno_id" value="{{ $turno->id }}">
                        </li>
                        <li class="list-group-item">
                            Estado:
                            <select class="form-control" name="estado">
                                <option value="finalizado">Super Finalizado</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </li>
                    </ul>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary col-12">Guardar</button>
                    </div>
                </form>
            @endforeach
        </div>

    </div>
@endsection
