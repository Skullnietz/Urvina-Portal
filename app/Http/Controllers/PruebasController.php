<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function sesion(){
        dd($_SESSION);
    }
}
