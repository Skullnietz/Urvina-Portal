<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\ConsultasExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DateTime;


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
        $departamentos = DB::select(
            "EXEC spDepartamentosApp :id",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
            ]
        );
        if(isset($request->desde) || isset($request->hasta) || isset($request->fechaRapida)){
            $defaultdate="2000-01-01";

            if ($request->fechaRapida==="Seleccion detallada"){
                $datefrom  = new \DateTime($defaultdate);
                $dateto  = new \DateTime($request->hasta);
            }
            if ($request->fechaRapida===""){
                $datefrom  = new \DateTime($defaultdate);
                $dateto  = new \DateTime($request->hasta);
            }
            if ($request->fechaRapida==="semana"){
                $datefrom  = new \DateTime($request->firstDayOfWeek);
                $dateto  = new \DateTime($request->lastDayOfWeek);
            }
            if ($request->fechaRapida==="mes"){
                $datefrom  = new \DateTime($request->firstDayOfMonth);
                $dateto  = new \DateTime($request->lastDayOfMonth);
            }
            if ($request->fechaRapida==="anio"){
                $datefrom  = new \DateTime($request->firstDayOfYear);
                $dateto  = new \DateTime($request->lastDayOfYear);
            }
            if ($request->fechaRapida==="enero"){
                $datefrom  = new \DateTime($request->firstDayOfJanuary);
                $dateto  = new \DateTime($request->lastDayOfJanuary);
            }
            if ($request->fechaRapida==="febrero"){
                $datefrom  = new \DateTime($request->firstDayOfFebruary);
                $dateto  = new \DateTime($request->lastDayOfFebruary);
            }
            if ($request->fechaRapida==="marzo"){
                $datefrom  = new \DateTime($request->firstDayOfMarch);
                $dateto  = new \DateTime($request->lastDayOfMarch);
            }
            if ($request->fechaRapida==="abril"){
                $datefrom  = new \DateTime($request->firstDayOfApril);
                $dateto  = new \DateTime($request->lastDayOfApril);
            }
            if ($request->fechaRapida==="mayo"){
                $datefrom  = new \DateTime($request->firstDayOfMay);
                $dateto  = new \DateTime($request->lastDayOfMay);
            }
            if ($request->fechaRapida==="junio"){
                $datefrom  = new \DateTime($request->firstDayOfJune);
                $dateto  = new \DateTime($request->lastDayOfJune);
            }
            if ($request->fechaRapida==="julio"){
                $datefrom  = new \DateTime($request->firstDayOfJuly);
                $dateto  = new \DateTime($request->lastDayOfJuly);
            }
            if ($request->fechaRapida==="agosto"){
                $datefrom  = new \DateTime($request->firstDayOfAugust);
                $dateto  = new \DateTime($request->lastDayOfAugust);
            }
            if ($request->fechaRapida==="septiembre"){
                $datefrom  = new \DateTime($request->firstDayOfSeptember);
                $dateto  = new \DateTime($request->lastDayOfSeptember);
            }
            if ($request->fechaRapida==="octubre"){
                $datefrom  = new \DateTime($request->firstDayOfOctober);
                $dateto  = new \DateTime($request->lastDayOfOctober);
            }
            if ($request->fechaRapida==="noviembre"){
                $datefrom  = new \DateTime($request->firstDayOfNovember);
                $dateto  = new \DateTime($request->lastDayOfNovember);
            }
            if ($request->fechaRapida==="diciembre"){
                $datefrom  = new \DateTime($request->firstDayOfDecember);
                $dateto  = new \DateTime($request->lastDayOfDecember);
            }




        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department,:item,:reference,:from,:to",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
                "type" => $request->tipo,
                "department" => $request->departamento,
                "item" => $request->articulo,
                "reference" => $request->equipo,
                "from" => date_format($datefrom, 'Ymd'),
                "to" => date_format($dateto,'Ymd'),
            ]

        );
        $pID = $_SESSION['usuario']->UsuarioCteCorp;
        $pTipo = $request->tipo;
        $pDepartamento = $request->departamento;
        $pItem = $request->articulo;
        $pReference = $request->equipo;
        $pDateFrom = date_format($datefrom, 'Ymd');
        $pTo = date_format($dateto,'Ymd');
        $pFrom = date_format($datefrom, 'Ymd');


        if($request->tipo == "Consumo"){
            return view('reportes.consumos')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
        if($request->tipo == "Departamento"){
            return view('reportes.departamento')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
        if($request->tipo == "Equipo"){
            return view('reportes.equipo')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
        if($request->tipo == "Anual"){
            return view('reportes.anual')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
    }else{
        $datehasta = Carbon::now()->format('Ymd');
        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department,:item,:reference,:from,:to",
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
        $pID = $_SESSION['usuario']->UsuarioCteCorp;
        $pTipo = $request->tipo;
        $pDepartamento = $request->departamento;
        $pItem = $request->articulo;
        $pReference = $request->equipo;
        $pDateFrom = date_format($datefrom, 'Ymd');
        $pTo = date_format($dateto,'Ymd');
        $pFrom = date_format($datefrom, 'Ymd');

        if($request->tipo == "Consumo"){
            return view('reportes.consumos')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);
        }
        if($request->tipo == "Departamento"){
            return view('reportes.departamento')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
        if($request->tipo == "Equipo"){
            return view('reportes.equipo')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
        if($request->tipo == "Anual"){
            return view('reportes.anual')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }

    }
    }

    public function ExcelReporteConsulta($lang,$pID,$pTipo,$pDepartamento,$pItem,$pReference,$pFrom,$pTo){
        session_start();
        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department,:item,:reference,:from,:to",
            [
                "id" => $pID,
                "type" => $pTipo,
                "department" => $pDepartamento,
                "item" => $pItem,
                "reference" => $pReference,
                "from" => $pFrom,
                "to" => $pTo,
            ]
        );
        if($request->tipo == "Consumo"){
            return view('reportes.consumos')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);
        }
        if($request->tipo == "Departamento"){
            return view('reportes.departamento')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
        if($request->tipo == "Equipo"){
            return view('reportes.equipo')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
        if($request->tipo == "Anual"){
            return view('reportes.anual')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos)->with('pID',$pID)->with('pTipo',$pTipo)->with('pDepartamento',$pDepartamento)->with('pItem',$pItem)->with('pReference',$pReference)->with('pDateFrom ',$pDateFrom )->with('pTo',$pTo)->with('pFrom',$pFrom);;
        }
    }

    public function ExcelReporteConsultaI($lang,$pID,$pTipo,$pDepartamento,$pItem,$pFrom,$pTo){
        session_start();
        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department,:item,:reference,:from,:to",
            [
                "id" => $pID,
                "type" => $pTipo,
                "department" => $pDepartamento,
                "item" => $pItem,
                "reference" => "",
                "from" => $pFrom,
                "to" => $pTo,
            ]
        );
        if($pTipo == "Consumo"){
            return view('excel.generar-excelConsumo')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Departamento"){
            return view('excel.generar-excelDepartamento')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Equipo"){
            return view('excel.generar-excelEquipo')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Anual"){
            return view('excel.generar-excelAnual')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
    }

    public function ExcelReporteConsultaR($lang,$pID,$pTipo,$pDepartamento,$pReference,$pFrom,$pTo){
        session_start();
        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department,:item,:reference,:from,:to",
            [
                "id" => $pID,
                "type" => $pTipo,
                "department" => $pDepartamento,
                "item" => "",
                "reference" => $pReference,
                "from" => $pFrom,
                "to" => $pTo,
            ]
        );
        if($pTipo == "Consumo"){
            return view('excel.generar-excelConsumo')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Departamento"){
            return view('excel.generar-excelDepartamento')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Equipo"){
            return view('excel.generar-excelEquipo')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Anual"){
            return view('excel.generar-excelAnual')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
    }

    public function ExcelReporteConsultaD($lang,$pID,$pTipo,$pDepartamento,$pFrom,$pTo){
        session_start();

        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department,:item,:reference,:from,:to",
            [
                "id" => number_format($pID),
                "type" => $pTipo,
                "department" => $pDepartamento,
                "item" => "",
                "reference" => "",
                "from" => $pFrom,
                "to" => $pTo,
            ]
        );
        if($pTipo == "Consumo"){
            return view('excel.generar-Consumo')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Departamento"){
            return view('excel.generar-Departamento')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Equipo"){
            return view('excel.generar-Equipo')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
        if($pTipo == "Anual"){
            return view('excel.generar-CAnual')->with('dataConsulta',$dataConsulta)->with('pFrom',$pFrom)->with('pTo',$pTo);
        }
    }
}
