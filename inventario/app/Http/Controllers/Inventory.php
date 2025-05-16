<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Inventory  
{
    
    public function index(Request $request)
    {

        $query = Product::orderBy('idProducto', 'asc');

        $productos = $query->get();

        $totalProductos = Product::count();
        
        $Rol = (Auth::user()->idRol == 1)?1:2;
        

        return view('inventory.ViewInventory', compact('productos', 'totalProductos','Rol'));
    }
    public function show($id)
    {
        $producto = Product::findOrFail($id);
        return view('inventario.show', compact('producto'));
    }
    public function create()
    {
        return view('inventory.CreateInventory');
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);
        
        // Crear el nuevo producto
        Product::create([
            'nombre' => $request->nombre,
            'cantidad' => 0,
            'estatus' => 1,
        ]);


        $userId = Auth::id();
        // Registrar el movimiento
        History::create([
            'idUsuario' => $userId,
            'tipo_movimiento' => "Entrada",
            'accion' => "Registrar nuevo producto",
            'fecha' => date('Y-m-d H:i:s'),
        ]);
        
        return redirect()->route('inventory.ViewInventory')
            ->with('success', 'Producto creado correctamente');
    }
    public function update(Request $request, $id)
    {
        // Buscar el producto por su ID
        $producto = Product::findOrFail($id);

        // Incrementar la cantidad en 1
        $producto->cantidad += 1;
        
        // Guardar el producto actualizado
        $producto->save();

        $userId = Auth::id();

        // Registrar el movimiento
        History::create([
            'idUsuario' => $userId,
            'tipo_movimiento' => "Entrada",
            'accion' => "Aumento de stock del producto ".$id,
            'fecha' => date('Y-m-d H:i:s'),
        ]);

        // Redirigir a la vista de inventario con el producto actualizado
        return redirect()->route('inventory.ViewInventory')
            ->with('success', 'Cantidad actualizada correctamente');
    }
    public function destroy($id)
    {
        // Eliminar el producto
        $producto = Product::findOrFail($id);
        
        // Desabilitar producto
        $producto->estatus = $producto->estatus == 1 ? 0 : 1;
        
        // Guardar el producto actualizado
        $producto->save();
        
        return redirect()->route('inventory.ViewInventory')
            ->with('success', 'Producto eliminado correctamente');
    }

}
