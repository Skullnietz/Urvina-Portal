<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarritoController extends Controller
{   // Vista Carrito //////////////////////
    public function index(){
        session_start();
        if(isset($_SESSION['usuario'])){
            $departamentos = DB::select(
                "EXEC spDepartamentosApp :id",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                ]
            );
            $equipos = DB::select(
                "EXEC spEquiposApp :id",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                ]
            );
        return view('carrito')->with('departamentos',$departamentos)->with('equipos',$equipos);
    }else {
        return redirect()->route('login', app()->getLocale());
    }
    }
    //////////////////////////////////////
    // Compra de un Articulo ////////////
    public function addCartItem(Request $request){
        session_start();
            $departamentos = DB::select(
                "EXEC spDepartamentosApp :id",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                ]
            );
            $equipos = DB::select(
                "EXEC spEquiposApp :id",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                ]
            );

        $articulo = $request->articulo;
        $cantidad = intval($request->cantidad);
        $moneda = $request->moneda;
        $precio = $request->precio;
        $unidad = $request->unidad;
        $fecha = $request->fecha;
        $autorizado = intval($request->autorizado);
        $requerido = intval($request->requerido);
        $restante = intval($request->restante)-$cantidad;
        $codigo = $request->codigo;
        $desc = $request->desc;
        $idItem = $request->articulo;

        if(isset($request->talla)){
        $talla = $request->talla;
        $articulo = $request->articulo.' | '.$request->talla;  ;
        }



            if($moneda == "Dolares"){
            if(isset($_SESSION["carritodll"])){
                foreach($_SESSION["carritodll"] as $indice=>$arreglo){
                    if($arreglo["item"] == $idItem){
                        $restante = $restante-$arreglo["cantidad"];
                        if($restante<0){
                            if(0 == $restante){
                                Alert::error(__('No se puede agregar'), __('Ha llegado al limite de este articulo'));
                                return redirect()->route('carrito', app()->getLocale())->with('departamentos',$departamentos)->with('equipos',$equipos);
                            }
                            Alert::error(__('No se puede agregar'), __('Ha llegado al limite de este articulo'));
                            return redirect()->route('carrito', app()->getLocale())->with('departamentos',$departamentos)->with('equipos',$equipos);
                        }
                    }
                }
            }

            if(isset($_SESSION["carritodll"][$articulo])){





                if(intval($_SESSION["carritodll"][$articulo]["cantidad"]) < $autorizado ){





                    if(intval($_SESSION["carritodll"][$articulo]["cantidad"]) == $autorizado){

                        Alert::error(__('No se puede agregar'), __('Ha llegado al limite de este articulo'));


                    }else{
                            $res = $_SESSION["carritodll"][$articulo]["cantidad"]+$cantidad;
                            $_SESSION["carritodll"][$articulo]["cantidad"]=$res;
                         }
                }else{
                    Alert::error(__('No se puede agregar'), __('Ha llegado al limite de este articulo'));


                }

            }else{
                $_SESSION["carritodll"][$articulo]["articulo"] = $articulo;
                $_SESSION["carritodll"][$articulo]["cantidad"] = $cantidad;
                $_SESSION["carritodll"][$articulo]["moneda"] = $moneda;
                $_SESSION["carritodll"][$articulo]["precio"] = $precio;
                $_SESSION["carritodll"][$articulo]["unidad"] = $unidad;
                $_SESSION["carritodll"][$articulo]["fecha"] = $fecha;
                $_SESSION["carritodll"][$articulo]["autorizado"] = $autorizado;
                $_SESSION["carritodll"][$articulo]["requerido"] = $requerido;
                $_SESSION["carritodll"][$articulo]["restante"] = $restante;
                $_SESSION["carritodll"][$articulo]["desc"] = $desc;
                $_SESSION["carritodll"][$articulo]["codigo"] = $codigo;
                $_SESSION["carritodll"][$articulo]["item"] = $idItem;
                if(isset($request->talla)){
                $_SESSION["carritodll"][$articulo]["talla"] = $talla;
                }

            }
        }
        if($moneda == "Pesos"){
            if(isset($_SESSION["carritopes"])){
                foreach($_SESSION["carritopes"] as $indice=>$arreglo){
                    if($arreglo["item"] == $idItem){
                        $restante = $restante-$arreglo["cantidad"];
                        if($restante<0){
                            if(0 == $restante){
                                Alert::error(__('No se puede agregar'), __('Ha llegado al limite de este articulo'));
                                return redirect()->route('carrito', app()->getLocale())->with('departamentos',$departamentos)->with('equipos',$equipos);
                            }
                            Alert::error(__('No se puede agregar'), __('Ha llegado al limite de este articulo'));
                            return redirect()->route('carrito', app()->getLocale())->with('departamentos',$departamentos)->with('equipos',$equipos);
                        }
                    }
                }
            }
            if(isset($_SESSION["carritopes"][$articulo])){



                if(intval($_SESSION["carritopes"][$articulo]["cantidad"]) < $autorizado ){


                    if(intval($_SESSION["carritopes"][$articulo]["cantidad"]) == $autorizado){

                        Alert::error(__('No se puede agregar'), __('Ha llegado al limite de este articulo'));


                    }else{
                        $res = $_SESSION["carritopes"][$articulo]["cantidad"]+$cantidad;
                            $_SESSION["carritopes"][$articulo]["cantidad"]=$res;

                         }
                }else{
                    Alert::error(__('No se puede agregar'), __('Ha llegado al limite de este articulo'));

                }

            }else{
                $_SESSION["carritopes"][$articulo]["articulo"] = $articulo;
                $_SESSION["carritopes"][$articulo]["cantidad"] = $cantidad;
                $_SESSION["carritopes"][$articulo]["moneda"] = $moneda;
                $_SESSION["carritopes"][$articulo]["precio"] = $precio;
                $_SESSION["carritopes"][$articulo]["unidad"] = $unidad;
                $_SESSION["carritopes"][$articulo]["fecha"] = $fecha;
                $_SESSION["carritopes"][$articulo]["autorizado"] = $autorizado;
                $_SESSION["carritopes"][$articulo]["requerido"] = $requerido;
                $_SESSION["carritopes"][$articulo]["restante"] = $restante;
                $_SESSION["carritopes"][$articulo]["desc"] = $desc;
                $_SESSION["carritopes"][$articulo]["codigo"] = $codigo;
                $_SESSION["carritopes"][$articulo]["item"] = $idItem;
                if(isset($request->talla)){
                    $_SESSION["carritopes"][$articulo]["talla"] = $talla;
                }
            }
        }



        return redirect()->route('carrito', app()->getLocale())->with('departamentos',$departamentos)->with('equipos',$equipos);
    }



    /////////////////////////////////////
    // Quitar Articulo /////////////////
    public function quitCartItem(Request $request){
        session_start();
        $departamentos = DB::select(
            "EXEC spDepartamentosApp :id",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
            ]
        );
        $equipos = DB::select(
            "EXEC spEquiposApp :id",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
            ]
        );

        $articulo= $request->qarticulo;
        $tipo= $request->qtipo;
        if($tipo == "Dolares"){
            unset($_SESSION['carritodll'][$articulo]);
        }
        if($tipo == "Pesos"){
            unset($_SESSION['carritopes'][$articulo]);
        }
        //return $_SESSION;
        return redirect()->route('carrito', app()->getLocale())->with('departamentos',$departamentos)->with('equipos',$equipos);

    }
    ///////////////////////////////////

    // Vista Post Compra ////////////////
    public function postcompra(){
        session_start();
        if(isset($_SESSION['usuario'])){
        return view('pedidosRecientes');
    }else {
        return redirect()->route('login', app()->getLocale());
    }
    }
    //////////////////////////////////////
}
