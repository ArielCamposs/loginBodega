<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-6">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Si has olvidado alguno de tus datos, debes contactarte con el departamento de informática.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        
            <a href="#" onclick="history.back()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out"> 
                {{ __('Volver atrás') }}
            </a>
            
        </div>
    </div>
</div>
