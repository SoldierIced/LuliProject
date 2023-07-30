<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    //

    public function view()
    {

        $servicios = Servicio::get();

        return view("admin.servicios.index")->with("servicios", $servicios);
    }
}
