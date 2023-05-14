@extends('layouts.app')

@section('content')



    <div class="row w-full" style="width:100%;margin-top:20px">
        <form method="POST" action="{{ route('guardar-turno') }}">
            @csrf
            <h2>Seleccion de Servicios </h2>



            <div class="row input-group mb-3">


                <select class="col-12 form-select" id="selecciondeservicios" onChange="cambioElServicio(this)"
                    name="selecciondeservicios">
                    <option selected value="0">Selecionar</option>

                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->titulo }}</option>
                    @endforeach
                </select>
                <div class="col-12 row " id="divServicios">
                </div>

            </div>


            <p>horario: </p>

            <input class="form-control" type="number" name="Horariocompleto">

            <p>fecha: </p>

            <input class="form-control" type="date" name="Fechaturno">

            <button id="321" type="submit" class="btn btn-primary" style="background-color:aquamarine">Seleccionar
                Completo</button>
        </form>
    </div>


@endsection


@section('js')
    <script type="text/javascript">
        let servicios = JSON.parse('{!! $servicios !!}'); // pasamos la info de laravel a un objeto en javascript .
        console.log(servicios);

        let div = document.getElementById("divServicios"); // ?

        function cambioElServicio(element) {
            console.log(element.value);

            if (element.value != 0) {
                let servicio = servicios.find(x => x.id == element.value);
                {{-- `  ` --}}
                div.innerHTML = "<span class='col-12' >titulo " + servicio.titulo +
                    "</span> <span class='col-12'>descripcion: " + servicio.descripcion + "</span>";
            } else {
                div.innerHTML = "";
            }

            console.log(div);
        }
    </script>
@stop
