@extends('layouts.app')

@section('content')
    <h2>EJEMPLO DE FOREACH O UN FOR</h2>

    <table class="table">
        <thead>
            <tr>
                <th>columna1</th>
                <th>columna2</th>
                <th>columna3</th>
            </tr>
        </thead>
        <tbody>
            @for ($contador = 0; $contador < 5; $contador++)
                <tr>
                    <td scope="row">POSICION DE FOR : {{ $contador }}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endfor
        </tbody>
    </table>

    <div class="row">
        {{-- el row es el 100% de la pantalla omitiendo margenes y distancia lala lindo --}}
        {{-- PARA QUE UN COL-ALGO FUNCIONE, TIENE QUE ESTAR DENTRO DE UN ROW. --}}
        {{-- dicho 100%  = a un maximo de 12 columnas -  --}}
        @for ($contador = 0; $contador < 3; $contador++)
            <div class="card col-4">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">Content</p>
                </div>
                <div class="card-footer">
                    {{$contador}}
                </div>
            </div>
        @endfor
        @if (true ==false)
            puto el que lee
        @endif
    </div>
@endsection
