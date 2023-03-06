<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
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
    ///////////////////////////////////////
    ////////// Vista Categoria //////////
    public function showfav($language){
        session_start();
        if(isset($_SESSION['usuario'])){
            $favoritos = DB::select(
                "EXEC spFavoritosApp :id",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                ]
            );
            return view('favoritos')->with('favoritos',$favoritos);
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
    ////////// Vista Busqueda Articulo /////////////////
    public function SearchItem(Request $request){
        session_start();
        if(isset($_SESSION['usuario'])){
            $articulos = DB::select(
                "EXEC spSearchArticulosApp :id,:articulo",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,
                    "articulo" => $request->item,
                ]
            );
            $Icounter= count($articulos);
            if($Icounter==0){
                Alert::info(__('No hay articulos'), __('No hay articulos que coincidan con la busqueda'));
            }

            return view('search')->with('articulos', $articulos);
        }

    }

    ///////////////////////////////////////
}
