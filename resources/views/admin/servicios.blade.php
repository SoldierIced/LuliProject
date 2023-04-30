@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 row text-center">
            <h3 class="col-12">Servicios</h3>
            <p class="col-12"> Esta tabla es para cargar, visualizar, modificar y eliminar los servicios para ofrecer al cliente.  </p>
        </div>

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
            Nuevo registro
        </button>

        <form action="{{ route('admin-guardar-servicio') }}" method="POST">
            @csrf
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- ACA INSERTEN SUS INPUTS . PARA COMPLETAR EL MODELO --}}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Titulo</span>
                                </div>
                                <input name="titulo" type="text" class="form-control" placeholder="Escriba aqui...">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Descripcion</span>
                                </div>
                                <input name="descripcion" type="text" class="form-control" placeholder="Escriba aqui...">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Costo</span>
                                </div>
                                <input name="costo" type="text" class="form-control" placeholder="Escriba aqui...">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Tipo</span>
                                </div>
                                <input name="tipo" type="text" class="form-control" placeholder="Escriba aqui...">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Duracion</span>
                                </div>
                                <input name="duracion" type="text" class="form-control" placeholder="Escriba aqui...">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                    @else
                        {{-- aca iria el foreach recorriendo los servicios y mostrandolos en un tr  --}}
                        @foreach ($servicios as $servicio)
                            <tr>

                                <td>{{ $servicio->id }}</td>
                                <td>{{ $servicio->titulo }}</td>
                                <td>{{ $servicio->descripcion }}</td>
                                <td>{{ $servicio->costo }}</td>
                                <td>{{ $servicio->tipo }}</td>
                                <td>{{ $servicio->duracion }}</td>
                                {{-- tambien en la columna de acciones , tendria que haber un boton que sea para eliminar un servicio  --}}
                                <td>
                                    <button type="button" class="btn btn-warning">Actualizar</button>
                                    <form action="{{ route('admin-eliminar-servicio') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        <input name="id" type="hidden" class="form-control"
                                            value="{{ $servicio->id }}">
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        {{-- y alguna forma de actualizar el servicio  --}}

                        {{-- posiblemente para lo que seria la actualizacion se viene la parte HEAVY MAGINGUN. --}}
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
