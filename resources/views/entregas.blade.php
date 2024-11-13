<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entregas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
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
    @if(session('success'))
    <div id="success-message" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-30">
        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded text-center max-w-md mx-auto">
            {{ session('success') }}
        </div>
    </div>
@endif
<script>
    if (document.getElementById('success-message')) {
        setTimeout(function() {
            
            document.getElementById('success-message').style.display = 'none';
        }, 3000);
    }
</script>
    <h1 class="text-4xl font-bold mb-6 flex">Entregas<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="black"><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/><path d="M5 17.972c-1.097-.054-1.78-.217-2.268-.704s-.65-1.171-.704-2.268M9 18h6m4-.028c1.097-.054 1.78-.217 2.268-.704C22 16.535 22 15.357 22 13v-2h-4.7c-.745 0-1.117 0-1.418-.098a2 2 0 0 1-1.284-1.284C14.5 9.317 14.5 8.945 14.5 8.2c0-1.117 0-1.675-.147-2.127a3 3 0 0 0-1.926-1.926C11.975 4 11.417 4 10.3 4H2m0 4h6m-6 3h4"/><path d="M14.5 6h1.821c1.456 0 2.183 0 2.775.354c.593.353.938.994 1.628 2.276L22 11"/></g></svg></h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full bg-gray-200">
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">DEPARTAMENTO</th>
                    <th class="py-3 px-4 text-left">SOLICITANTE</th>
                    <th class="py-3 px-4 text-left">ENCARGADO DE BODEGA</th>
                    <th class="py-3 px-4 text-left">FECHA DEL PEDIDO</th>
                    <th class="py-3 px-4 text-left">OBSERVACIONES</th>
                    <th class="py-3 px-4 text-left">PRODUCTOS SOLICITADOS</th> 
                    <th class="py-3 px-4 text-left">ACCIONES</th>              
                </tr>
            </thead>
            <tbody>
                @foreach($entregas as $entrega)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $entrega->id }}</td>
                        <td class="py-3 px-4">{{ $entrega->departamento }}</td>
                        <td class="py-3 px-4">{{ $entrega->solicitante }}</td>
                        <td class="py-3 px-4">{{ $entrega->encargado }}</td>
                        <td class="py-3 px-4">{{ $entrega->fecha }}</td>
                        <td class="py-3 px-4">{{ $entrega->observacion }}</td>
                        <td class="py-3 px-4">
                            <ul class="list-disc pl-6">
                                @foreach($entrega->productos as $producto)
                                    <li>{{ $producto->nombre }} - Cantidad: {{ $producto->pivot->cantidad }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="py-3 px-4">
                            <form action="{{ route('entregas.destroy', $entrega->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta entrega? Esta acción es IRREVERSIBLE y NO se puede deshacer.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <br>
    <p class="text-center">
        <span class="font-bold">Nota:</span> Eliminar solo entregas ya realizadas.
    </p> 
    <br>
    <div class="mt-6">
        <a href="{{ route('dashboard') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Volver atrás
        </a>
    </div>

    
</body>
</html>



