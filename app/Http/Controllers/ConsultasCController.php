<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

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

    public function ReporteConsulta(Request $request){
        session_start();
        if(isset($request->desde) || isset($request->hasta)){
            $datefrom = $request->desde;
            $dateto = $request->desde;

        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department:item,:reference,:from,:to",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
                "type" => $request->tipo,
                "department" => $request->departamento,
                "item" => $request->articulo,
                "reference" => $request->equipo,
                "from" => $datefrom->format('Ymd'),
                "to" => $dateto->format('Ymd'),
            ]
        );
    }else{
        $datehasta = Carbon::now()->format('Ymd');
        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department:item,:reference,:from,:to",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
                "type" => $request->tipo,
                "department" => $request->departamento,
                "item" => $request->articulo,
                "reference" => $request->equipo,
                "from" => '20000101',
                "to" => $datehasta,
            ]
        );
    }


    }
}
