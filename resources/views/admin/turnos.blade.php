@extends('layouts.app')

@section('content')
    {{-- Columna turnos --}}

    <h2 class="col-12">Turnos </h2>
    {{-- {{dd($turnos)}} --}}
    {{-- @foreach ($turnos as $turno)
            <div class="col-12 col-md-4 card">
                <div class="card-body">
                    <h5 class="card-title"> TURNO N° {{ $turno->id }} -
                        Cliente: {{ $turno->user->name }} -
                        Horario: {{ $turno->horario }} -</h5>
                    <p class="card-text">Dia: {{ $turno->dia }} -
                        @if ($turno->user->telefono != null)
                            Telefono : {{ $turno->user->telefono }}
                        @endif.
                    </p>
                </div>
            </div>
        @endforeach --}}

    <h2>EJEMPLO DE FOREACH O UN FOR</h2>


    {{-- {{dd($turnos)}} --}}

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Turnos</th>
                <th scope="col">Estado</th>
                <th scope="col">Comentarios</th>
                <th scope="col">Acciones</th>

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
                                    Cliente: {{ $turno->user->name }}
                                </div>
                                <div class="col-12">
                                    Horario: {{ $turno->horario }}
                                </div>
                            </div>

                        </td>
                        <td>
                                <select id="my-select" class="form-control" name="estado">
                                    <option value="inicial" @if($turno->estado=="inicial") selected  @endif >Pendiente de turno</option>
                                    <option value="finalizado" @if($turno->estado=="finalizado") selected  @endif >Finalizado</option>
                                    <option value="cancelado" @if($turno->estado=="cancelado") selected  @endif >Cancelado</option>
                                </select>



                        </td>
                        <td>
                            <input class="form-control" type="text" name="comentario" value="{{ $turno->comentario }}">
                            <input class="form-control " type="hidden" name="turno_id" value="{{ $turno->id }}">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-info">guardar datos</button>
                        </td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
@endsection
