<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function impresion(){
        session_start();
        //////////////////// Vista Pedidos /////////////////
        if(isset($_SESSION['usuario'])){
            return view('impresionpedido');
        }else {
            return redirect()->route('login', app()->getLocale());
        }
        //////////////////////////////////////////////////

    }
    public function PedidoReciente(){
        session_start();
        //////////////////// Vista Pedidos /////////////////
        if(isset($_SESSION['usuario'])){
            return view('pedidosRecientes');
        }else {
            return redirect()->route('login', app()->getLocale());
        }
        //////////////////////////////////////////////////

    }
}
