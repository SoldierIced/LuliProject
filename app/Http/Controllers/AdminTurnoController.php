<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Turno;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminTurnoController extends Controller
{
    public function turnosView()
    {

        //necesito mostrar turnos estado y comentarios
        //necesito que en el estado muestre 2 botones (cancelar o finalizar), en caso de que ya se hayan utilizado mostrar el estado
        //necesito que en la comuna de comentarios ingresar comenario y un boton para guardar
        if (Auth::user()->paid == null) {
            Session::put("err", "Usted no es administrador.");
            return redirect()->route("home");
        }
        $turnos = Turno::with("user")->get();
        return view("admin.turnos")->with("turnos", $turnos);
    }
    public function turnosUpdate(Request $re)
    {
        //  dd($re->all());

        // recibimos la info del turno
        // en esa info tenemos comentario, estado y el id
        // si quiero actualizar un turno
        // primero lo tengo que buscar
        try {
            $turno = Turno::find($re->turno_id);
            $turno->comentario = $re->comentario;
            $turno->estado = $re->estado;
            $turno->save();
            Session::put("msj", "Se ha guardado correctamente su turno");
        } catch (\Throwable $th) {
            //throw $th;
            Session::put("err", "Se ha roto.");
        }

        return redirect()->route("admin-turnos");

        // dd($turno, $re->all());
    }
}
