<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session_start();
        if(isset($_SESSION['usuario'])){
            $articulos = DB::select(
                "EXEC spPresupuestoApp :id",
                [
                    "id" => $_SESSION['usuario']->UsuarioCteCorp,

                ]
            );

        return view('home')->with('articulos',$articulos);
    }else {
        return redirect()->route('login', app()->getLocale());
    }
    }

}
