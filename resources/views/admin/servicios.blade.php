@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 row text-center">
            <h3 class="col-12">Servicios</h3>
            <p class="col-12"> lalalalala </p>
        </div>

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
            Nuevo Registro
        </button>

        <form action="{{ route('admin-servicios-guardar') }}" method="POST">
            @csrf
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Nuevo Servicio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <p>Titulo: </p><input class="form-control" type="text" name="titulo">

                            <p>Descripcion: </p><input class="form-control" type="text" name="descripcion">

                            <p>Costo: </p><input class="form-control" type="text" name="costo">

                            <p>Tipo: </p><input class="form-control" type="text" name="tipo">

                            <p>Duracion: </p><input class="form-control" type="text" name="duracion">

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
                <thead class="thead-dark">
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
                        @foreach ($servicios as $servicio)
                            <tr>
                                <td>
                                    {{ $servicio->id }}
                                </td>
                                <td>
                                    {{ $servicio->titulo }}
                                </td>
                                <td>
                                    {{ $servicio->descripcion }}
                                </td>
                                <td>
                                    {{ $servicio->costo }}
                                </td>
                                <td>
                                    {{ $servicio->tipo }}
                                </td>
                                <td>
                                    {{ $servicio->duracion }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#{{ 'modaleliminar' . $servicio->id }}">Eliminar Servicio </button>

                                    <form action="{{ route('admin-servicios-eliminar') }}" method="POST">
                                        @csrf
                                        <input class="form-control " type="hidden" name="servicio_id"
                                            value="{{ $servicio->id }}">

                                        <div class="modal fade" id="{{ 'modaleliminar' . $servicio->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Servicio {{$servicio->titulo}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark">
                                                        ¿Desea eliminar el servicio?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#{{ 'modal' . $servicio->id }}">
                                        Modificar Servicio</button>

                                    <form action="{{ route('admin-servicios-modificar') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="{{ 'modal' . $servicio->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">

                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content text-dark">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title " id="{{ 'modal' . $servicio->id }}Title">
                                                            Modificar
                                                            Servicio {{ $servicio->titulo }}</h2>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <input class="form-control" type="hidden" name="id"
                                                            value={{ $servicio->id }}>

                                                        <p>Titulo: </p><input class="form-control" type="text"
                                                            name="titulo" value="{{ $servicio->titulo }}">

                                                        <p>Descripcion: </p><input class="form-control" type="text"
                                                            name="descripcion" value="{{ $servicio->descripcion }}">

                                                        <p>Costo: </p><input class="form-control" type="text"
                                                            name="costo" value="{{ $servicio->costo }}">

                                                        <p>Tipo: </p><input class="form-control" type="text"
                                                            name="tipo" value="{{ $servicio->tipo }}">

                                                        <p>Duracion: </p><input class="form-control" type="text"
                                                            name="duracion" value="{{ $servicio->duracion }}">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-success">Modificar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        {{-- aca iria el foreach recorriendo los servicios y mostrandolos en un tr  --}}
                        {{-- tambien en la columna de acciones , tendria que haber un boton que sea para eliminar un servicio  --}}





                        {{-- y alguna forma de actualizar el servicio  --}}
                        {{-- posiblemente para lo que seria la actualizacion se viene la parte HEAVY MAGINGUN. --}}
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
