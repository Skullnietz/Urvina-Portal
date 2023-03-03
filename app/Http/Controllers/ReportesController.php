<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    //////////////////////// Grafica Consumos ///////////////////
    public function viewConsumos(){
        session_start();
        if(isset($_SESSION['usuario'])){
            return view('reportes.consumos');
        }else {
            return redirect()->route('login', app()->getLocale());
        }
    }
    ///////////////////////////////////////////////////////////
}
