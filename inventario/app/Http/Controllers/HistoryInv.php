<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class HistoryInv  
{
    public function index(Request $request)
    {

        $registros = History::join('usuarios', 'historicos.idUsuario', '=', 'usuarios.idUsuario')
        ->orderBy('historicos.idHistorico', 'asc')
        ->get(['historicos.*', 'usuarios.nombre as nombre']);

        
        $totalregistros = count($registros);

        return view('inventory.ViewHistory', compact('registros', 'totalregistros'));
    }
    public function show($id)
    {
        $producto = History::findOrFail($id);
        return view('histosy.show', compact('producto'));
    }
}