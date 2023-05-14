@extends('layouts.app')

@section('content')
    <h2 class="col-12">Historial de Servicios </h2>

    {{-- Aca tendria que ir un general para mostrar cantidad total de servicios, tal vez que pueda seleccionar, ultima semana o ultimo mes, tambien podria poner una ganancia total o parcial y abajo si pondria la tabla para saber valores individuales --}}



    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Turno</th>
                <th scope="col">Tipo de Servicio</th>
                <th scope="col">Ganancia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turnos as $turno)
                <form action="{{ route('admin-turnos-guardar') }}" method="POST">
                    @csrf
                    <tr>
                        {{-- {{ dd($turno) }} --}}

                        <td>
                            <div class="row">

                                <div class="col-12">
                                    TURNO N° {{ $turno->id }}
                                </div>
                                <div class="col-12">
                                    Cliente: {{ $turno->name }}
                                </div>

                            </div>

                        </td>

                        <td>
                            <div class="col-12">
                            {{ $turno->titulo }}
                            </div>

                        </td>

                        <td>
                            ${{$turno->costo}}

                        </td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
@endsection
