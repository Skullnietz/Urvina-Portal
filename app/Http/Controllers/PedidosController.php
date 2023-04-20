<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class PedidosController extends Controller
{
    public function index(){
        session_start();
        $datehasta = Carbon::now()->format('Y-m-d');
        //////////////////// Vista Pedidos /////////////////
        $data = array();
        if(isset($_SESSION['usuario'])){
            $pedidos = DB::select(
                "EXEC spPedidosApp :id, :from, :to",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                    "from" => '2000-01-01',
                    "to" => $datehasta,
                ]
            );
            foreach($pedidos as $pedido){
                $descpedido = DB::select(
                    "EXEC spPedidosDetalleApp :id, :idP",
                    [
                        "id" => $_SESSION['usuario']->UsuarioCteCorp,
                        "idP" => $pedido->ID,
                    ]
                );
                $CFecha = Date::parse($pedido->Fecha);
                $pedido->CFecha = $CFecha;
                $pedido->desc = $descpedido;
                foreach($pedido->desc as $p){
                    $artdesc = DB::table('Art')->select('Articulo'
                    ,'Rama'
                    ,'Descripcion1'
                    ,'Descripcion2'
                    ,'NombreCorto'
                    ,'Grupo'
                    ,'Categoria'
                    ,'Codigo')->where('Articulo', '=' , $p->Articulo)->first();
                    $p->art = $artdesc;
                }
                array_push($data, $pedido);
            }

            return view('pedidosIndex')->with('data',$data);
        }else {
            return redirect()->route('login', app()->getLocale());
        }
        //////////////////////////////////////////////////

    }
    public function show($lang,$id){
        session_start();
        //////////////////// Vista Pedidos /////////////////
        $data = array();
        if(isset($_SESSION['usuario'])){
            $pedidos = DB::select(
                "EXEC spPedidosDetalleApp :id, :idP",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                    "idP" => $id,
                ]
            );

            foreach($pedidos as $pedido){
                $art=trim($pedido->Articulo);



                $artdesc = DB::select(
                    "EXEC spArticuloApp :idu, :item",
                    [
                        "idu" => $_SESSION['usuario']->UsuarioCteCorp,
                        "item" => $art,
                    ]
                );



                $CFecha = Date::parse($pedido->Fecha);
                $pedido->CFecha = $CFecha;
                $pedido->articulo = $artdesc;
                array_push($data, $pedido);
            }

            return redirect()->route('showpedido', app()->getLocale())->with('data',$data)->with('id',$id);
        }else {
            return redirect()->route('login', app()->getLocale());
        }
        //////////////////////////////////////////////////
    }
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
