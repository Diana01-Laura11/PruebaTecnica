<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Departures  
{
    public function index(Request $request)
    {
       
        $query = Product::orderBy('idProducto', 'asc')
        ->where('estatus', 1);

        $productos = $query->get();

        $totalProductos =count($productos);

        return view('inventory.ViewDepartures', compact('productos', 'totalProductos'));
    }
    public function show($id)
    {
        $producto = Product::where('idProducto', $id)
                    ->where('estatus', 1) 
                    ->firstOrFail();
        return view('inventario.show', compact('producto'));
    }
    public function departuresproduct($id)
    {   
        $producto = Product::findOrFail($id);
        
        return view('inventory.DepartureInventory', compact('producto'));
    }

    public function store(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        
        $validated = $request->validate([
            'cantidad' => "required|numeric|min:1|max:{$producto->cantidad}"
        ]);
        
        // Actualizar el stock

        $producto->cantidad -= $request->cantidad;
        $cantidad= $request->cantidad;
        $producto->save();

        $userId = Auth::id();

        // Registrar el movimiento
        History::create([
            'idUsuario' => $userId,
            'tipo_movimiento' => "Salida",
            'accion' => "Salida de stock ".$cantidad." del producto ".$id,
            'fecha' => date('Y-m-d H:i:s'),
        ]);
        
        return redirect()->route('inventory.ViewDepartures')
                        ->with('success', 'Salida registrada correctamente');
    }

}
