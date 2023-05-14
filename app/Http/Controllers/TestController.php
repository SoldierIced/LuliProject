<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Turno;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function test(Request $request)
    {

        // dd($request->all());
        $servicios = Servicio::get();

        // dd(Auth::user(),User::find(1));
        // dd($data);
        // dd(json_encode($servicios));
        return view("test")->with("servicios", $servicios);
    }



    public function savephone(Request $re)
    {

        // dd(Auth::user());
        $id = Auth::user()->id;
        $user = User::find($id);
        // var_dump($user->telefono);
        $user->telefono = $re->telefono;
        $user->save();
        Session::put("msj", "Se ha guardado correctamente su telefono");
        // dd($re->all(),$user->telefono);

        return redirect()->route("test");
    }
    public function saveturno(Request $re)
    {
        $turnoocupado = Turno::where("dia", $re->Fechaturno)->where("horario", '<', $re->Horariocompleto + 2)->where("horario", '>', $re->Horariocompleto - 2)->first();

        $horaactual = Carbon::now();
        $fechaturno = Carbon::parse($re->Fechaturno);

        //    dd($horaactual, $fechaturno);
        $id = Auth::user()->id;  //guarda el id de user en id
        // dd($re->all(),$re->selecciondeservicios,$re->selecciondeservicios== "0");
        try {

            if($re->selecciondeservicios == "0" ) {     //verifico que haya seleccionado un servicio
                Session::put("err", "Debe seleccionar un servicio");
                return redirect()->route("test");
            }

            if ($re->Horariocompleto > 24 || $re->Horariocompleto < 0) {     //verifico que la hora sea en un formato valido
                Session::put("err", "Horario invalido");
                return redirect()->route("test");
            }

            if ($fechaturno < $horaactual) {       //verifico que la hora no sea anterior al horario actual
                Session::put("err", "Fecha invalida");
                return redirect()->route("test");
            }
// dd($turnoocupado);
            if ($turnoocupado != null) {      //verifico que el horario no este en uso actualmente
                Session::put("err", "Horario Ocupado");
                return redirect()->route("test");
            }

            Turno::create([
                "horario" => $re->Horariocompleto,
                "dia" => $re->Fechaturno,
                "user_id" => $id,
                "comentario" => "",
                "estado" => "inicial",
                "servicio_id"=>$re->selecciondeservicios

            ]);
            Session::put("msj", "Se ha guardado correctamente su turno");
        } catch (\Throwable $th) {
            dd($th);
            Session::put("msj", "Se ha rompido todo arre xd");
        }


        // dd($re->all());
        return redirect()->route("test");
    }

    public function mostrarturno()
    {
        //necesitamos traer la informacion de los turnos
        //obtener el id del usuario
        if (Auth::user() == null) {
            Session::put("err", "Para poder entrar aca , tiene que estar logueado en su cuenta.");

            return redirect()->route("home");
        }
        $id = Auth::user()->id;
        //buscar en el modelo los turnos por id del usuario
        $turnos = Turno::where("user_id", $id)
            // ->where("id",1)
            ->get();

        // dd();

        $turnos = Auth::user()->turnos; // traigo los turnos del modelo segun la relacion declara en User::turnos

        // //mostras los turnos guardados en pantalla
        // for ($i = 0; $i < $turnos->count(); $i++) {
        //     // var_dump($turnos[$i]->id);
        // }
        // dd($turnos);
        return view("misturnos")->with("turnos", $turnos);

        //
    }

}
