<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TurnoController extends Controller
{
    public function guardar(Request $re){

        $data =$re->all();
        // dd($data);

        $turno = Turno::find($re->turno_id);

        // $turno = 123;s
        $turno->comentario = $re->comentario;
        $turno->estado = $re->estado;
        $turno->save();
        // dd($turno);

        Session::put("msj", "Se ha guardado correctamente su turno");



        // dd($re->all());
        return redirect()->route("adminVista");
    }
    public function adminVista(Request $re)
    {

        if(Auth::user()->paid==null){
            Session::put("err","CAPO QUE HACES?");
            return redirect()->route("test");
        }


        // dd(Carbon::now());

        //necesito mostrar turnos estado y comentarios
        //necesito que en el estado muestre 2 botones (cancelar o finalizar), en caso de que ya se hayan utilizado mostrar el estado
        //necesito que en la comuna de comentarios ingresar comenario y un boton para guardar
        $filtroTexto="";

        if($re->filtroFecha!=null){
            $turnos = Turno::with("user")
            ->where("dia",">=",$re->filtroFecha)
            ->get();

            $filtroTexto="Se esta filtrando por la fecha ".$re->filtroFecha;
        }else{
            $turnos = Turno::with("user")
            ->where("dia",">=",Carbon::now())
            ->get();
            $filtroTexto="Se esta filtrando por la fecha ".Carbon::now();

        }

        //mostras todos los turnos guardados en pantalla
        // dd($filtroTexto);
        return view("admin.turnos")->with("turnos", $turnos)->with("filtroTexto", $filtroTexto);

        //
    }
}
