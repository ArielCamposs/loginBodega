<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class EntregasController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'departamento' => 'required|string',
            'solicitante' => 'required|string',
            'encargado' => 'required|string',
            'fecha' => 'required|date',
            'observacion' => 'required|string',
            'productos' => 'required|json',
        ]);

        
        $productos = json_decode($request->productos, true);

        
        $entrega = Entrega::create($request->only(['departamento', 'solicitante', 'encargado', 'fecha', 'observacion']));

        
        foreach ($productos as $producto) {
            $productoId = $producto['id'];
            $cantidadEntregada = $producto['cantidad'];

            $entrega->productos()->attach($productoId, ['cantidad' => $cantidadEntregada]);
            $productoDB = Producto::find($productoId);

            if ($productoDB && $productoDB->cantidad >= $cantidadEntregada) {
                $productoDB->cantidad -= $cantidadEntregada;
                $productoDB->save();
            } else {
                return redirect()->back()->withErrors(['error' => 'Cantidad solicitada excede el inventario disponible para el producto ' . $producto['nombre']]);
            }
        }
  
        return redirect()->route('entregas')->with('success', 'Entrega registrada con éxito.');
    }

    public function index()
    {
        $entregas = Entrega::with('productos')->get();
        return view('entregas', ['entregas' => $entregas]);
    }

    public function guardarYGenerarPDF(Request $request)
    {
        $request->validate([
            'departamento' => 'required|string',
            'solicitante' => 'required|string',
            'encargado' => 'required|string',
            'fecha' => 'required|date',
            'observacion' => 'required|string',
            'productos' => 'required|json',
        ]);

        
        $productos = json_decode($request->productos, true);
        $entrega = Entrega::create($request->only(['departamento', 'solicitante', 'encargado', 'fecha', 'observacion']));

        foreach ($productos as $producto) {
            $entrega->productos()->attach($producto['id'], ['cantidad' => $producto['cantidad']]);
            $productoDB = Producto::find($producto['id']);
            if ($productoDB && $productoDB->cantidad >= $producto['cantidad']) {
                $productoDB->cantidad -= $producto['cantidad'];
                $productoDB->save();
            }
        }

       
        Session::put('datos_entrega', $request->all());

        return response()->json(['success' => true]);
    }

    public function vistaPreviaPDF()
    {
        
        $datos = Session::get('datos_entrega');

        if (!$datos) {
            return redirect()->route('entregas')->with('error', 'No hay datos para la vista previa.');
        }

        $datos['productos'] = json_decode($datos['productos'], true);
        $pdf = Pdf::loadView('pdf.entrega', $datos);

        return $pdf->stream('entrega.pdf');
    }

    
}
