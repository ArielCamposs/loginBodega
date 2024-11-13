<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertaExito = document.getElementById('alerta-exito');
            const alertaError = document.getElementById('alerta-error');

            if (alertaExito) {
                setTimeout(() => {
                    alertaExito.style.display = 'none';
                }, 3000);
            }

            if (alertaError) {
                setTimeout(() => {
                    alertaError.style.display = 'none';
                }, 3000);
            }
        });
    </script>

    <div class="bg-white shadow-md rounded-lg p-8 max-w-lg w-full item-center">
        <h1 class="text-2xl font-semibold mb-6 text-gray-700 flex">Agregar producto a bodega
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                <path fill="black" d="M13 15.6c.3.2.7.2 1 0l5-2.9v.3c.7 0 1.4.1 2 .4v-1.8l1-.6c.5-.3.6-.9.4-1.4l-1.5-2.5c-.1-.2-.2-.4-.4-.5l-7.9-4.4c-.2-.1-.4-.2-.6-.2s-.4.1-.6.2L3.6 6.6c-.2.1-.4.2-.5.4L1.6 9.6c-.3.5-.1 1.1.4 1.4c.3.2.7.2 1 0v5.5c0 .4.2.7.5.9l7.9 4.4c.2.1.4.2.6.2s.4-.1.6-.2l.9-.5c-.3-.6-.4-1.3-.5-2m-2 0l-6-3.4V9.2l6 3.4zm9.1-9.6l-6.3 3.6l-.6-1l6.3-3.6zM12 10.8V4.2l6 3.3zm8 4.2v3h3v2h-3v3h-2v-3h-3v-2h3v-3z"/>
            </svg>
        </h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div id="alerta-error" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 w-96">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <form action="{{ route('producto.storeProducto') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nombre" class="block text-gray-600 font-medium">Nombre del Producto:</label>
                <input type="text" name="nombre" id="nombre" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="cantidad" class="block text-gray-600 font-medium">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Producto</button>
            <div class="mt-6">
                <a href="{{ route('dashboard') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Volver atrás
                </a>
            </div>
        </form>
    </div>
    
    <script>
        
        setTimeout(() => {
            const alertaError = document.getElementById('alerta-error');
            if (alertaError) {
                alertaError.style.display = 'none';
            }
        }, 3000);
    </script>
</body>
</html>
