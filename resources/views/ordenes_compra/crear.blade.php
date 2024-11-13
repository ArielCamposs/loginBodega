@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4 text-center">Crear Orden de Compra</h2>
    
    <form action="{{ route('ordenes_compra.guardar') }}" method="POST">
        @csrf
        
        <!-- Seleccionar Producto -->
        <div class="mb-4">
            <label for="producto" class="block text-gray-700 font-semibold mb-2">Producto</label>
            <select id="producto" name="producto_id" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected>Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Cantidad -->
        <div class="mb-4">
            <label for="cantidad" class="block text-gray-700 font-semibold mb-2">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" min="1" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Proveedor -->
        <div class="mb-4">
            <label for="proveedor" class="block text-gray-700 font-semibold mb-2">Proveedor</label>
            <input type="text" id="proveedor" name="proveedor" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Botón para enviar -->
        <div class="text-center">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Guardar Orden de Compra</button>
        </div>
    </form>
</div>
@endsection