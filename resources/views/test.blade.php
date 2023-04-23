@extends('layouts.app')

@section('content')




    <div class="row w-full" style="width:100%;margin-top:20px">
        <form method="POST" action="{{ route('guardar-turno') }}">
            @csrf
            <h2>Turno Completo </h2>
            <p>horario: </p>
            <input class="form-control" type="number" name="Horariocompleto">
            <p>fecha: </p>

            <input class="form-control" type="date" name="Fechaturno">
            <button id="321" type="submit" class="btn btn-primary" style="background-color:aquamarine">Seleccionar
                Completo</button>
        </form>
    </div>



    <div class="row w-full" style="width:100%;margin-top:20px">
        <h2>Turno Simple </h2>
        <button id="123" type="submit" class="btn btn-primary">Seleccionar Simple</button>


    </div>



    {{-- <form method="POST" action="{{ route("guardar-telfono-usuario-post")}}" >
    @csrf
    <h2 style="width: 25%;margin: 20px;background-color: white;">Actualizar telefono - {{ Auth::user()->name }}</h2>
    <input class="form-control" type="text" name="telefono">
    <input class="form-control" type="text" >
    <button id="lala" type="submit"
     class="btn btn-primary">Guardar telefono</button>


     <h4>{{$data["something"]}} </h4>
</form> --}}
@stop


@section('js')
    <script type="text/javascript">
        // alert(123);
        console.log(231);
        // alert(123);
        let element = document.getElementById("lala");
        // element.onclick = function (ev){
        //     console.log("clickme")
        // }
        let obje = {
            name: "nehuen"
        }
        // alert(JSON.stringify(obje));
        function testing(event) {
            console.log("clickme2", event)
        }

        // $("#lala").onClick(function(ev){
        //     console.log(ev);
        // })
        // element.onClick(function(){
        //     console.log(123123)
        // })
        // let element2 = $("#lala");
        // console.log(element2);
    </script>
@stop
