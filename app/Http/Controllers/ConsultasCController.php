<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasCController extends Controller
{
    public function index(){
        session_start();
        ////////////// Vista Consultas del Cliente /////////////
        if(isset($_SESSION['usuario'])){
            return view('consultasc');
        }else {
            return redirect()->route('login', app()->getLocale());
        }
        //////////////////////////////////////////////////////

    }
}
