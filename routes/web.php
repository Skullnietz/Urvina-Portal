<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ConsultasCController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', 'es/inicio');
Route::prefix('{language}')->group(function () {

    Route::get('/', function () {
        return view('login');
    });

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    // Login
    Route::post('/validar-registro', 'LoginController@login')->name('validar-registro');
    // Logout
    Route::get('/salir', 'LoginController@logout')->name('salir');
    // Inicio
    Route::get('/inicio', 'InicioController@Home')->name('home');



    //Catalogo

    Route::get('/catalogo', 'CatalogoController@index')->name('catalogo');
    Route::get('categoria/{category?}', 'CatalogoController@indexCategoria')->name('categoria');
    Route::get('/item/{articulo}', 'CatalogoController@showItem')->name('item');
    Route::get('/favoritos', 'CatalogoController@showfav')->name('favoritos');
    Route::match(['get', 'post'],'/buscar','CatalogoController@searchItem')->name('search');





    //Carrito

    Route::get('/cart','CarritoController@index')->name('carrito');
    Route::get('/postcompra','CarritoController@postcompra')->name('postcompra');
    Route::get('/additem','CarritoController@addCartItem')->name('additem');
    Route::get('/quititem','CarritoController@quitCartItem')->name('quititem');
    Route::get('/confirmaciondll','CarritoController@confCartDll')->name('confdll');
    Route::get('/confirmacionpes','CarritoController@confCartPes')->name('confpes');





    //Pedidos
    Route::get('/pedidosRe','PedidosController@PedidoReciente')->name('pedidore');
    Route::get('/impresion','PedidosController@impresion')->name('printpedido');
    Route::get('/datefilter','PedidosController@datefilter')->name('filterpedido');
    Route::get('/pedidos','PedidosController@index')->name('indexpedido');
    Route::get('/pedidos/{id}','PedidosController@show')->name('showpedido');



    //Reportes vistas

    Route::get('/vConsumos','ReportesController@viewConsumos')->name('vConsumos');



    //Reportes en Excel
    Route::get('/Ereport/{pID}/{pTipo}/{pDepartamento}/{pItem?}/{pReference?}/{pFrom}/{pTo}', 'ConsultasCController@ExcelReporteConsulta')->name('Ereporte');
    Route::get('/EreportI/{pID}/{pTipo}/{pDepartamento}/{pItem?}/{pFrom}/{pTo}', 'ConsultasCController@ExcelReporteConsultaI')->name('EreporteI');
    Route::get('/EreportR/{pID}/{pTipo}/{pDepartamento}/{pReference?}/{pFrom}/{pTo}', 'ConsultasCController@ExcelReporteConsultaR')->name('EreporteR');
    Route::get('/EreportD/{pID}/{pTipo}/{pDepartamento}/{pFrom}/{pTo}', 'ConsultasCController@ExcelReporteConsultaD')->name('EreporteD');

    //Consultas Clientes

    Route::get('/consultas', 'ConsultasCController@index')->name('consultasc');
    Route::get('/consultRep', 'ConsultasCController@ReporteConsulta')->name('reporteC');

    //Pruebas

    Route::get('/sesion', 'PruebasController@sesion')->name('testsesion');




});









