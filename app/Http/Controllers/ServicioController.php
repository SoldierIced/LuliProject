<?php

namespace App\Http\Controllers;

use App\Models\Servicio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServicioController extends Controller
{
    public function agregarnuevoservicio(Request $re)
    {
        $servicios = Servicio::get();
        // ruta de la vista.
        return view('admin.servicios')->with('servicios', $servicios);
    }


    public function guardar(Request $re)
    {
        try {

            $servicio = new Servicio();
            $servicio->titulo = $re->titulo;
            $servicio->descripcion = $re->descripcion;
            $servicio->costo = $re->costo;
            $servicio->duracion = $re->duracion;
            $servicio->tipo = $re->tipo;

            // dd($servicio);
            $servicio->save();
            Session::put("msj", "Se ha guardado correctamente su nuevo servicio");
        } catch (\Throwable $th) {
            //throw $th;
            Session::put("err", "Se ha roto.");
        }
        return redirect()->route("admin-servicios");
    }

    public function eliminar(request $re)
    {
        //necesito que me elimine un servicio buscandolo por id

        $servicio = Servicio::find($re->servicio_id);
        // dd($re->all());
        $servicio->delete();
        Session::put("msj", "Se ha eliminado correctamente su servicio.");

        return redirect()->route("admin-servicios");
    }


    public function modificar(Request $re)
    {
        try {
            // dd($re->all());
            $servicio = Servicio::find($re->servicio_id);
            $servicio->titulo = $re->input('titulo');
            $servicio->descripcion = $re->input('descripcion');
            $servicio->costo = $re->input('costo');
            $servicio->duracion = $re->input('duracion');
            $servicio->tipo = $re->input('tipo');

            $servicio->update();

            // dd($servicio);
            Session::put("msj", "Se ha modificado correctamente su nuevo servicio");
        } catch (\Throwable $th) {
            //throw $th;
            Session::put("err", "Se ha roto.");
        }
        return redirect()->route("admin-servicios");
    }
}
