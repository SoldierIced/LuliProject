<?php

namespace App\Http\Controllers;

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
        $data = [
            "something" => "show me the money",
            "algo" => "tete"
        ];

        // dd(Auth::user(),User::find(1));
        // dd($data);
        return view("test")->with("data", $data);
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
        // dd("mi variable : ",$re->all());
        try {


            //validamos que el horario este dentro del rango pedido
            if ($re->Horariocompleto < 1 || $re->Horariocompleto > 24) {
                Session::put("msj", "El horario cargado es incorrecto.");
                return redirect()->route("test");
            }
            //validamos que la fecha cargadad por el usuario sea mayor o igual a la actual
            $fechaActual = Carbon::now();
            $fechaTurno = Carbon::parse($re->Fechaturno);
            // dd();
            if ($fechaActual > $fechaTurno) {
                Session::put("msj", "La fecha cargada es incorrecta.");
                return redirect()->route("test");
            }
            //Validamos que no haya un turno existente
            $turnoOcupado = Turno::where("horario", $re->Horariocompleto)->where("dia", $re->Fechaturno)->first();
            // dd($turnoOcupado);
            if ($turnoOcupado) {
                Session::put("msj", "La fecha cargada esta en uso.");
                return redirect()->route("test");
            }
            //Validamos que el horario no este ocupado dentro del rango del turno
            $horarioOcupado = Turno::where("dia", $re->Fechaturno)->where("horario", ">", $re->Horariocompleto - 2)->where("horario", "<", $re->Horariocompleto+2)->first();
            //dd($horarioOcupado);
            if ($horarioOcupado) {
                Session::put("msj", "El horario esta ocupado.");
                return redirect()->route("test");
            }
            $id = Auth::user()->id;  //guarda el id de user en id

            Turno::create([
                "horario" => $re->Horariocompleto,
                "dia" => $re->Fechaturno,
                "user_id" => $id,
                "comentario" => "",
                "estado" => "inicial"
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
