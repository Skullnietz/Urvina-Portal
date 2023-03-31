<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Jenssegers\Date\Date;

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
            Date::setLocale(app()->getLocale());
            $desc = DB::table('Art')->select('Articulo'
            ,'Rama'
            ,'Descripcion1'
            ,'Descripcion2'
            ,'NombreCorto'
            ,'Grupo'
            ,'Categoria'
            ,'Codigo')->where('Articulo', '=' , $item)->first();

            $codigo = DB::table('ArtIdioma')->select('Articulo','Codigo')->where('Articulo', '=' , $item)->first();
                                        $year = date('Y');
                                        $month = date('m');
                                        $day = date('d');
                                        # Obtenemos el numero de la semana
                                        $semana = date('W', mktime(0, 0, 0, $month, $day, $year));
                                        # Obtenemos el día de la semana de la fecha dada
                                        $diaSemana = date('w', mktime(0, 0, 0, $month, $day, $year));
                                        # el 0 equivale al domingo...
                                        if ($diaSemana == 0) {
                                            $diaSemana = 7;
                                        }
                                        # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
                                        $primerDia = date('l, d M Y', mktime(0, 0, 0, $month, $day - $diaSemana + 1, $year));
                                        # A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
                                        $ultimoDia = date('l, d M Y', mktime(0, 0, 0, $month, $day + (7 - $diaSemana), $year));
                                        $date1 = Date::parse($primerDia); // now date is a carbon instance
                                        $date2 = Date::parse($ultimoDia); // now date is a carbon instance

            return view('item')->with('articulo',$articulo)->with('desc',$desc)->with('codigo',$codigo)->with('date1',$date1)->with('date2',$date2);
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
                    "articulo" => '%'.$request->item.'%',
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
