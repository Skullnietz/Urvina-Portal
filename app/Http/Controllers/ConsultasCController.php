<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ConsultasCController extends Controller
{
    public function index(){
        session_start();
        $departamentos = DB::select(
            "EXEC spDepartamentosApp :id",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
            ]
        );
        ////////////// Vista Consultas del Cliente /////////////
        if(isset($_SESSION['usuario'])){
            return view('consultasc')->with('departamentos',$departamentos);
        }else {
            return redirect()->route('login', app()->getLocale());
        }
        //////////////////////////////////////////////////////

    }
}
