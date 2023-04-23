@extends('layouts.app')

@section('content')
    {{-- Columna turnos --}}
    <form class="row w-full" method="POST" action="{{ route('guardar-turno') }}">
        @csrf
        <h2 class="col-12">Turnos </h2>
        {{-- {{dd($turnos)}} --}}
        @foreach ($turnos as $turno)
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
            {{-- {{dd($turnos)}} --}}
        @endforeach

    </form>
@endsection
