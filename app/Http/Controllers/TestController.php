<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\User;
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
        // dd($request->all());

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

        return redirect()->route("home");
    }
    public function saveturno(Request $re)
    {
        $id = Auth::user()->id;  //guarda el id de user en id
        $user = User::find($id); //esta encontrando en el usuario en base al id
        //dd($re->all(),$id);
        try {
            Turno::create([
                "horario" => $re->Horariocompleto,
                "dia" => $re->Fechaturno,
                "user_id" => $id,
                "comentario"=>"",
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
