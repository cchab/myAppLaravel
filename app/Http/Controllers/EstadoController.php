<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    public function show(string $id)
    {
        echo "<B>".Estado::find($id)->nombre."</B><br>";
    }

    public function index()
    {
        return view('casos.index');
    }

    public function getEstados(){
        return response()->json(Estado::get());
    }
}
