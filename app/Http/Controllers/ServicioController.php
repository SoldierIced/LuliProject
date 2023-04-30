<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServicioController extends Controller
{
    public function vistaservicios(){


        $servicios = Servicio::get();
        return view("admin.servicios")->with("servicios",$servicios);
    }

    public function guardar(Request $re){

        $servicio = new Servicio();
        // dd($re->all());
        $servicio->titulo = $re->titulo;
        $servicio->descripcion= $re->descripcion;
        $servicio->costo= $re->costo;
        $servicio->duracion= $re->duracion;
        if($re->tipo)
        $servicio->tipo= $re->tipo;

        $servicio->save();

        Session::put("msj", "Se ha guardado correctamente su servicio");


        return redirect()->route("admin-servicios");
    }

    public function eliminar(Request $re){

        // dd($re->all());
        $servicio = servicio::find($re->id);
        // dd($servicio);
        $servicio->delete();

        Session::put("msj", "Se ha eliminado correctamente su servicio");

        return redirect()->route("admin-servicios");
    }

    public function modificar(Request $re){

        // dd($re->all());
        $servicio = servicio::find($re->id);

        if($re->titulo)
        $servicio->titulo = $re->titulo;
        if($re->descripcion)
        $servicio->descripcion= $re->descripcion;
        if($re->costo)
        $servicio->costo= $re->costo;
        if($re->duracion)
        $servicio->duracion= $re->duracion;
        if($re->tipo)
        $servicio->tipo= $re->tipo;

        $servicio->save();

        Session::put("msj", "Se ha modificado correctamente su servicio");


        return redirect()->route("admin-servicios");
    }

}
