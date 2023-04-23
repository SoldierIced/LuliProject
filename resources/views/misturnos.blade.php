@extends('layouts.app')

@section('content')


    {{-- {{dd($turnos->count())}} --}}

    <div class="row " style="width:100%;margin-top:20px">
        <h2 class="col-12">Turnos</h2>
        <p class="col-12">Tienes {{ $turnos->count() }} turnos agendados con luleeee</p>
        @foreach ($turnos as $turno)
            <div class="col-12 col-md-4 card">
                <div class="card-body">
                    <h5 class="card-title">El turno {{ $turno->id }} sera el dia {{ $turno->dia }}</h5>
                    <p class="card-text">en el horario {{ $turno->horario }}.</p>
                </div>
            </div>
            {{-- {{    dd($turno)}} --}}
        @endforeach

    </div>



    <div class="row w-full" style="width:100%;margin-top:20px">

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
