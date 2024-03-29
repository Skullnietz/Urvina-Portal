<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReportesController extends Controller
{
    //////////////////////// Grafica Consumos ///////////////////
    public function viewConsumos(){
        session_start();
        $departamentos = DB::select(
            "EXEC spDepartamentosApp :id",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
            ]
        );
        if(isset($_SESSION['usuario'])){
            return view('reportes.consumos')->with('departamentos',$departamentos);
        }else {
            return redirect()->route('login', app()->getLocale());
        }
    }
    ///////////////////////////////////////////////////////////
}
