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
        $excedente = intval($request->excedente);
        $idItem = $request->articulo;
        $subcuenta = $request->subcuenta;

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
                $_SESSION["carritodll"][$articulo]["precio"] = floatval($precio);
                $_SESSION["carritodll"][$articulo]["unidad"] = $unidad;
                $_SESSION["carritodll"][$articulo]["fecha"] = $fecha;
                $_SESSION["carritodll"][$articulo]["autorizado"] = $autorizado;
                $_SESSION["carritodll"][$articulo]["requerido"] = $requerido;
                $_SESSION["carritodll"][$articulo]["restante"] = $restante;
                $_SESSION["carritodll"][$articulo]["desc"] = $desc;
                $_SESSION["carritodll"][$articulo]["codigo"] = $codigo;
                $_SESSION["carritodll"][$articulo]["item"] = $idItem;
                $_SESSION["carritodll"][$articulo]["excedente"] = $excedente;
                $_SESSION["carritodll"][$articulo]["subcuenta"] = "";
                // Insercion de subcuenta mediante array_search (Talla/Descripcion)
                if(isset($request->talla)){
                $_SESSION["carritodll"][$articulo]["talla"] = $talla;
                $articulos = DB::select(
                    "EXEC spArticuloApp :id,:articulo",
                    [
                        "id" => $_SESSION['usuario']->UsuarioCteCorp,
                        "articulo" => $idItem,
                    ]
                    );
                    for($i = 0; $i < count($articulos); $i++){
                    $articulos[$i]->Descripcion = trim($articulos[$i]->Descripcion);
                    }

                $Item = array_search($talla, array_column($articulos, 'Descripcion'));

                $_SESSION["carritodll"][$articulo]["subcuenta"] = $articulos[$Item]->Subcuenta;

                }else{
                    $_SESSION["carritodll"][$articulo]["subcuenta"] = "";
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
                $_SESSION["carritopes"][$articulo]["precio"] = floatval($precio);
                $_SESSION["carritopes"][$articulo]["unidad"] = $unidad;
                $_SESSION["carritopes"][$articulo]["fecha"] = $fecha;
                $_SESSION["carritopes"][$articulo]["autorizado"] = $autorizado;
                $_SESSION["carritopes"][$articulo]["requerido"] = $requerido;
                $_SESSION["carritopes"][$articulo]["restante"] = $restante;
                $_SESSION["carritopes"][$articulo]["desc"] = $desc;
                $_SESSION["carritopes"][$articulo]["codigo"] = $codigo;
                $_SESSION["carritopes"][$articulo]["item"] = $idItem;
                $_SESSION["carritopes"][$articulo]["excedente"] = $excedente;
                if(isset($request->talla)){
                    $_SESSION["carritopes"][$articulo]["talla"] = $talla;
                    $articulos = DB::select(
                        "EXEC spArticuloApp :id,:articulo",
                        [
                            "id" => $_SESSION['usuario']->UsuarioCteCorp,
                            "articulo" => $idItem,
                        ]
                        );
                        for($i = 0; $i < count($articulos); $i++){
                        $articulos[$i]->Descripcion = trim($articulos[$i]->Descripcion);
                        }

                    $Item = array_search($talla, array_column($articulos, 'Descripcion'));

                    $_SESSION["carritopes"][$articulo]["subcuenta"] = $articulos[$Item]->Subcuenta;

                }else{
                    $_SESSION["carritopes"][$articulo]["subcuenta"] = "";
                }
            }
        }



        return redirect()->route('carrito', app()->getLocale())->with('departamentos',$departamentos)->with('equipos',$equipos);
    }



    /////////////////////////////////////
    /// Confirmar Venta Dolares /////////
    public function confCartDll(Request $request){
        session_start();
        if(isset($_SESSION['carritodll'])){
            $venta = DB::select(
                "EXEC spInsertaVenta
                @UsuarioCteCorp=:userId,
                @PlantaCteCorp=:plant,
                @Moneda=:currency,
                @referencia=:reference,
                @observaciones=:observations,
                @Departamento=:department",
                [
                    "userId" => $_SESSION['usuario']->UsuarioCteCorp,
                    "plant" => $request->planta,
                    "currency" => $request->moneda,
                    "reference" => $request->referencia,
                    "observations" => $request->observaciones,
                    "department" => $request->departamento,
                ]
            );
            $IDV= $venta[0]->IdVenta;





             foreach($_SESSION["carritodll"] as $indice => $arreglo){
                if($arreglo['cantidad']>$arreglo['cantidad']){
                    Alert::error(__('No esta autorizada esta compra'), __('Ha excedido su limite, contacte a soporte'));
                    return redirect()->back();
                }
                 DB::statement(
                    "EXEC spInsertaDetalleVenta
                    @Planta=:plant,
                    @NuevoID=:idVenta,
                    @Articulo=:item,
                    @Opcion=:option,
                    @Cantidad=:quantity,
                    @Precio=:price",
                    [
                        "plant" => $request->planta,
                        "idVenta" => intval($IDV),
                        "item" => $arreglo['item'],
                        "option" => $arreglo['subcuenta'],
                        "quantity" => $arreglo['cantidad'],
                        "price" => $arreglo['precio'],
                    ]
                    );

             }

             $afectar = DB::select(
                 "SET NOCOUNT ON; EXEC spafectar
                 @Modulo=:module,
                 @ID=:idVenta,
                 @Accion=:action,
                 @Base=:case,
                 @GenerarMov=:genmov,
                 @Usuario=:user",
                 [
                     "module" => 'VTAS',
                     "idVenta" => intval($IDV),
                     "action" => 'AFECTAR',
                     "case" => 'TODO',
                     "genmov" => NULL,
                     "user" => 'CH2',
                 ]
                 );

                 $folio = DB::select(
                     "EXEC spFolioApp :idVenta",
                     [
                        "idVenta" => intval($IDV),
                     ]
                     );
             unset($_SESSION["carritodll"]);

            Alert::success(__('Confirmacion de compra'), __('Pedido realizado, ¡gracias!'));
            return view('pedidosRecientes')->with('folio',$folio);


        }else {
            return redirect()->route('inicio', app()->getLocale());
        }

    }
    ////////////////////////////////////
    /// Confirmar Venta Pesos /////////
    public function confCartPes(Request $request){
        session_start();
        if(isset($_SESSION['carritopes'])){
            $venta = DB::select(
                "EXEC spInsertaVenta
                @UsuarioCteCorp=:userId,
                @PlantaCteCorp=:plant,
                @Moneda=:currency,
                @referencia=:reference,
                @observaciones=:observations,
                @Departamento=:department",
                [
                    "userId" => $_SESSION['usuario']->UsuarioCteCorp,
                    "plant" => $request->planta,
                    "currency" => $request->moneda,
                    "reference" => $request->referencia,
                    "observations" => $request->observaciones,
                    "department" => $request->departamento,
                ]
            );
            $IDV= $venta[0]->IdVenta;





             foreach($_SESSION["carritopes"] as $indice => $arreglo){
                 DB::statement(
                    "EXEC spInsertaDetalleVenta
                    @Planta=:plant,
                    @NuevoID=:idVenta,
                    @Articulo=:item,
                    @Opcion=:option,
                    @Cantidad=:quantity,
                    @Precio=:price",
                    [
                        "plant" => $request->planta,
                        "idVenta" => intval($IDV),
                        "item" => $arreglo['item'],
                        "option" => $arreglo['subcuenta'],
                        "quantity" => $arreglo['cantidad'],
                        "price" => $arreglo['precio'],
                    ]
                    );

             }


             $afectar = DB::select(
                 "SET NOCOUNT ON; EXEC spafectar
                 @Modulo=:module,
                 @ID=:idVenta,
                 @Accion=:action,
                 @Base=:case,
                 @GenerarMov=:genmov,
                 @Usuario=:user",
                 [
                     "module" => 'VTAS',
                     "idVenta" => intval($IDV),
                     "action" => 'AFECTAR',
                     "case" => 'TODO',
                     "genmov" => NULL,
                     "user" => 'CH2',
                 ]
                 );

                 $folio = DB::select(
                     "EXEC spFolioApp :idVenta",
                     [
                        "idVenta" => intval($IDV),
                     ]
                     );
             unset($_SESSION["carritopes"]);

            Alert::success(__('Confirmacion de compra'), __('Pedido realizado, ¡gracias!'));
            return view('pedidosRecientes')->with('folio',$folio);


        }else {
            return redirect()->route('inicio', app()->getLocale());
        }

    }
    ////////////////////////////////////
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
