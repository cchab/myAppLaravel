<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmado;
use App\Models\Estado;

class ConfirmadoController extends Controller
{
    public function getCasosConfirmados(){
        $confirmados = Confirmado::all();
        //dd($confirmados);
        $totalCasos = $confirmados->sum('casos');
        echo "Casos confirmados: ".$totalCasos;
    }

    public function getCasosConfirmadosEstado($idEstado){
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->confirmados->sum('casos');
        echo "Casos confirmados de ".$estado->nombre.": ".$totalCasos;
    }

    public function getCasosDesglosados(){
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado){
            $casosE = $estado->confirmados->sum('casos');
            $totalCasos += $casosE;
            echo "Casos por el estado <B>".$estado->nombre."</B> :".$casosE."<br>";
        }
        echo "Casos totales confirmados: ".$totalCasos;
    }

    public function index(){
        self::getCasosDesglosados();
    }

    public function show($idEstado){
        self::getCasosConfirmadosEstado($idEstado);
    }
}
