<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class TurnoController extends Controller
{

    public function turnosView()
    {
        //necesitamos traer la informacion de los turnos
        //obtener el id del usuario
        if (Auth::user() == null) {
            Session::put("err", "Para poder entrar aca , tiene que estar logueado en su cuenta.");
            return redirect()->route("home");
        }
        $id = Auth::user()->id;
        //buscar en el modelo los turnos por id del usuario
        $turnos = Turno::where("user_id", $id)->get();
        $turnos = Auth::user()->turnos; // traigo los turnos del modelo segun la relacion declara en User::turnos
        return view("misturnos")->with("turnos", $turnos);
    }

    public function turnosNewView(Request $re){
        $data = [
            "something" => "show me the money",
            "algo" => "tete"
        ];
        return view("test")->with("data", $data);
    }
    public function turnoSave(Request $re)
    {
        $id = Auth::user()->id;  //guarda el id de user en id
        $user = User::find($id); //esta encontrando en el usuario en base al id
        //dd($re->all(),$id);
        try {
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
        return redirect()->route("home");
    }
}
