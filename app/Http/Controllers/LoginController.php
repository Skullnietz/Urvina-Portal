<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function login(Request $request){
        //Validar Datos
        $msg = "";
        $user = DB::select(
            "EXEC spAccesoApp :user, :password",
            [
                "user" => $request->usuario,
                "password" => $request->password ,
            ]
        );

        if($user[0]->Nombre == "Usuario o Contraseña Incorrecta"){
            $msg = "Usuario o Contraseña Incorrecta";
            return view('login')->with('msg', $msg);
        }
        if($user[0]->Nombre == "Acceso Incorrecto"){
            $msg = "Contraseña Incorrecta";
            return view('login')->with('msg', $msg);
        }
        else{
            session_start();
            $_SESSION['usuario'] = $user[0];
            return redirect()->route('home', app()->getLocale())->with('usuario', $user[0]);
        }

        //$user[0]->Nombre
    }

    public function logout(Request $request){
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        return redirect()->route('login', app()->getLocale());
    }

}
