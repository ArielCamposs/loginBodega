<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function storeEntrega(Request $request)
    {
        
        $entrega = new Entrega();
        $entrega->departamento = $request->input('departamento');
        $entrega->solicitante = $request->input('solicitante');
        $entrega->encargado = $request->input('encargado');
        $entrega->fecha = $request->input('fecha');
        $entrega->observacion = $request->input('observacion');
        $entrega->save();

        
        $productosSeleccionados = $request->input('productos'); 
        foreach ($productosSeleccionados as $producto) {
            $entrega->productos()->attach($producto['id'], [
                'cantidad' => $producto['cantidad']
            ]);
        }

        return redirect()->route('entregas');
    }

    public function index()
    {
        
        $entregas = Entrega::with('productos')->get();
        return view('entregas', compact('entregas'));
    }

    public function mostrarProductos()
{
    
    $productos = Producto::all();
    return view('stock', compact('productos'));
}

public function create()
{
    return view('agregarProducto'); 
}

public function storeProducto(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'cantidad' => 'required|integer|min:1',
    ]);
    $productoExistente = Producto::where('nombre', $request->nombre)->first();
    if ($productoExistente) {
        return redirect()->route('producto.create')->with('error', 'El producto ya existe, porfavor verifica el nombre.');
    }

    Producto::create([
        'nombre' => $request->nombre,
        'cantidad' => $request->cantidad,
    ]);

    return redirect()->route('producto.create')->with('success', 'Producto agregado con éxito');
}


public function edit($id)
{
    $producto = Producto::findOrFail($id);
    return view('productos.edit', compact('producto'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'cantidad' => 'required|integer|min:0',
    ]);

    $producto = Producto::findOrFail($id);
    $producto->update($request->only('nombre', 'cantidad'));

    return redirect()->route('productos.index')->with('success', 'El Producto ha sido actualizado correctamente');
}

public function destroy($id)
{
    $entrega = Entrega::findOrFail($id);

    $entrega->delete();

    return redirect()->route('entregas')->with('success', 'La entrega ha sido eliminada con éxito.');
}
}

