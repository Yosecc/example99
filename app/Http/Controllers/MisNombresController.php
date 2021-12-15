<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MisNombresController extends Controller
{
    public function mostrarNombres($nombre, $apellido){

        $nombresJuntos = $nombre.' '.$apellido;
        $edad = 15;

        return view('mostrarnombres', compact('nombresJuntos','edad'));
    }

    public function sumasNumeros($x, $y){
        $z = $x + $y;
        return $z;
    }
}
