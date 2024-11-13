<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Entrega</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .text-center { text-align: center; }
        .text-2xl { font-size: 1.5rem; font-weight: bold; }
        .font-bold { font-weight: bold; }
        .text-lg { font-size: 1.125rem; font-weight: 600; }
        .p-4 { padding: 1rem; }
        .bg-gray-200 { background-color: #e5e7eb; }
        .border-collapse { border-collapse: collapse; }
        .w-full { width: 100%; }
        .border { border: 1px solid #000; }
        .mt-8 { margin-top: 2rem; }
        .signature-line { border-top: 1px solid #000; width: 200px; margin: 0 auto; }
        .full-width-line { border-top: 1px solid #000; width: 100%; margin: 20px 0; } 
    </style>
</head>
<body>
    <h2 class="text-2xl text-center mb-4">ENTREGA DE MATERIALES</h2>

    <p><strong>Departamento/Oficina:</strong> {{ $departamento }}</p>
    <p><strong>Solicitante:</strong> {{ $solicitante }}</p>
    <p><strong>Entregado por:</strong> {{ $encargado }}</p>
    <p><strong>Fecha:</strong> {{ $fecha }}</p>
    <p><strong>Observación:</strong> {{ $observacion }}</p>
    <br><br>

    <table class="w-full border-collapse text-center border">
        <thead>
            <tr>
                <th colspan="2" class="p-4 bg-gray-200 text-lg">Datos de la solicitud</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td class="p-4 border">{{ $producto['cantidad'] }}</td>
                    <td class="p-4 border">{{ $producto['nombre'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    
    <table class="w-full mt-8">
        <tr>
            
            <td class="text-center">
                <div class="signature-line"></div>
                <p>{{ $solicitante }}</p>
                <p>OPERACIONES</p>
            </td>
            
            <td class="text-center">
                <div class="signature-line"></div>
                <p>{{ $encargado }}</p>
                <p>Personal Bodega</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>

    <div class="full-width-line"></div>
    <p>Nota: Este recibo es un documento que contiene los datos de entrega de productos al Funcionario/a
        señalado en la fecha indicada. Acredita la entrega de material de Bodega.
    </p>
</body>
</html>
