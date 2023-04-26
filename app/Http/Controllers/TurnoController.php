<?php

namespace App\Http\Controllers;

use App\Models\Turno;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TurnoController extends Controller
{
    public function tablaestado()
    {

        if (Auth::user()->paid == null) {
            Session::put("err", "CAPO QUE HACES?");
            return redirect()->route("test");
        }
        //necesito mostrar turnos estado y comentarios
        //necesito que en el estado muestre 2 botones (cancelar o finalizar), en caso de que ya se hayan utilizado mostrar el estado
        //necesito que en la comuna de comentarios ingresar comenario y un boton para guardar

        $id = Auth::user()->id;

        $turnos = Turno::with("user")->get();

        // dd($turnos[0]);
        //mostras todos los turnos guardados en pantalla

        return view("admin.turnos")->with("turnos", $turnos);

        //
    }

    public function guardarestado(Request $re)
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
