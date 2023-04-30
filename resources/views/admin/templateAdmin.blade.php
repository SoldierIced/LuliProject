@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 row text-center">
            <h3 class="col-12">Servicios</h3>
            <p class="col-12"> lalalalala </p>
        </div>


        <div class="col-12">
            <table class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Costo</th>
                        <th>Tipo</th>
                        <th>Duracion (minutos)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($servicios->count() == 0)
                        <tr>
                            <td colspan="7" class="text-center"> No se encontraron servicios.</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
