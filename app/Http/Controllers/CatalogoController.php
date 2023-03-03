<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    ////////// Vista Catalogo /////////////
    public function index(){
        session_start();
        if(isset($_SESSION['usuario'])){
            $catalogo = DB::select(
            "EXEC spCategoriasApp :id",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp
            ]

        );
            return view('catalogo')->with('catalogo',$catalogo);
        }else {
            return redirect()->route('login', app()->getLocale());
        }

    }
    ///////////////////////////////////////
    ////////// Vista Categoria //////////
    public function indexCategoria($language,$categoria){
        session_start();
        if(isset($_SESSION['usuario'])){
            $category = DB::select(
                "EXEC SpCategoriasArtApp :id,:categoria",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                    "categoria" => $categoria,
                ]
            );
            return view('categoria')->with('category',$category)->with('categoria',$categoria);
        }else {
            return redirect()->route('login', app()->getLocale());
        }

    }
    /////////////////////////////////////////
    /////////// Vista Articulo//////////////
    public function showItem($language,$item){
        session_start();
        if(isset($_SESSION['usuario'])){
            $articulo = DB::select(
                "EXEC spArticuloApp :id,:articulo",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                    "articulo" => $item,
                ]

            );
            $desc = DB::table('Art')->select('Articulo'
            ,'Rama'
            ,'Descripcion1'
            ,'Descripcion2'
            ,'NombreCorto'
            ,'Grupo'
            ,'Categoria'
            ,'Codigo')->where('Articulo', '=' , $item)->first();

            $codigo = DB::table('ArtIdioma')->select('Articulo','Codigo')->where('Articulo', '=' , $item)->first();

            return view('item')->with('articulo',$articulo)->with('desc',$desc)->with('codigo',$codigo);
        }else {
            return redirect()->route('login', app()->getLocale());
        }

    }
    ///////////////////////////////////////
}
