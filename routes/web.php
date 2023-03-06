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
Route::redirect('/', 'es/login');
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
    Route::get('/buscar', 'CatalogoController@searchItem')->name('search');





    //Carrito

    Route::get('/cart','CarritoController@index')->name('carrito');
    Route::get('/postcompra','CarritoController@postcompra')->name('postcompra');
    Route::get('/additem','CarritoController@addCartItem')->name('additem');
    Route::get('/quititem','CarritoController@quitCartItem')->name('quititem');




    //Pedidos

    Route::get('/impresion','PedidosController@impresion')->name('printpedido');



    //Reportes vistas

    Route::get('/vConsumos','ReportesController@viewConsumos')->name('vConsumos');



    //Reportes en Excel

    //Consultas Clientes

    Route::get('/consultas', 'ConsultasCController@index')->name('consultasc');

});









