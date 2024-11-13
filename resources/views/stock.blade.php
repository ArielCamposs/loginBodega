<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        #alerta-exito {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 50; 
            background-color: rgba(72, 187, 120, 0.9); 
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
            color: white;
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
            opacity: 0; 
            transition: opacity 0.5s ease-in-out; 
        }

        
        #alerta-exito.show {
            opacity: 3;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-4xl font-bold mb-6 text-center flex">Stock en bodega<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 16 16"><path fill="black" d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2l-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504L1.508 9.071l2.742 1.567l2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134l2.75 1.571v-3.134L8.5 9.933zm.508-3.996l2.742 1.567l2.742-1.567l-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643L8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z"/></svg></h1>
    @if(session('success'))
        <div id="alerta-exito" class="show">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full bg-gray-200">
                    <th class="py-3 px-4 text-center">ID PRODUCTO</th>
                    <th class="py-3 px-4 text-center">PRODUCTO</th>
                    <th class="py-3 px-4 text-center">CANTIDAD EN BODEGA</th>
                    <th class="py-3 px-4 text-center">EDITAR PRODUCTO</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($productos) && $productos->isNotEmpty())
                @foreach($productos as $producto)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4 text-center">{{ $producto->id }}</td>
                        <td class="py-3 px-4 text-center">{{ $producto->nombre }}</td>
                        <td class="py-3 px-4 text-center">{{ $producto->cantidad }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('productos.edit', $producto->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="py-3 px-4 text-center">No hay productos disponibles.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    
    <div class="mt-6">
        <a href="{{ route('dashboard') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Volver atrás
        </a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertaExito = document.getElementById('alerta-exito');
            if (alertaExito) {
                setTimeout(() => {
                    alertaExito.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>
