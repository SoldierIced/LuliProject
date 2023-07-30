@extends('layouts.app')

@section('content')
    <h2>Servicios</h2>


    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
        Nuevo Servicio
    </button>

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Turno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Titulo</span>
                            </div>
                            <input class="form-control" type="text" name="title" placeholder="titulo del servicio" required
                                aria-label="Recipient's text">
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descripcion</span>
                            </div>
                            <textarea class="form-control" name="description"cols="5" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-6 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Costo</span>
                            </div>
                            <input class="form-control" type="number" min="2000" step="100" value="2000"  name="cost"  required >
                        </div>
                    </div>
                    <div class="col-6 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Duracion(minutos)</span>
                            </div>
                            <input class="form-control" type="number" min="10" step="5" value="60"  name="minutes"   required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                    <button type="button" class="btn btn-primary">guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#modelId').modal()
    </script>
    <table class="table table-light">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Duracion</th>
                <th>Costo</th>
            </tr>
        </thead>
        <tbody>
            @if ($servicios->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">No hay servicios creados todavia.</td>
                </tr>
            @else
            @endif
        </tbody>
    </table>
@endsection
