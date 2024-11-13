<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<br>
<br>
<br>
<x-auth-session-status class="mb-4 text-sm text-gray-600" :status="session('status')" />


<form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg transition-transform transform">
    @csrf
    
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">{{ __('Bodega') }}</h1> 
    <div class="mb-4">
        <x-input-label for="email" :value="__('Usuario')" class="block mb-2 text-sm text-gray-700" />
        <x-text-input id="email" class="w-full p-3 border border-green-500 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent text-gray-800" type="email" name="email" :value="old('email')" autofocus autocomplete="username" placeholder="Tu correo..."/>
    </div>
    
    <div class="mb-4">
        <x-input-label for="password" :value="__('Contraseña')" class="block mb-2 text-sm text-gray-700" />
        <x-text-input id="password" class="w-full p-3 border border-green-500 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent text-gray-800" type="password" name="password" autocomplete="current-password" />
    </div>

    <div class="flex items-center justify-between mb-6">
        @if (Route::has('password.request'))
            <a class="text-sm text-gray-600 hover:text-orange-500" href="{{ route('password.request') }}">
                {{ __('Olvidaste tus datos?') }}
            </a>
        @endif

        <x-primary-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md transition duration-200 ease-in-out">
            {{ __('Ingresar') }}
        </x-primary-button>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
      <h5 class="text-red-400">{{ __('¡ERROR AL INTENTAR INICIAR SESIÓN!') }}</h5>
      <ul>
          @foreach ($errors->all() as $error)
              @if (strpos($error, 'email') !== false)
                  <li>{{ __('Porfavor ingrese su correo.') }}</li>
              @elseif (strpos($error, 'password') !== false)
                  <li>{{ __('Porfavor ingrese su contraseña.') }}</li>
              @else
                  <li>{{ 'Correo o contraseña incorrectos.'}}</li>
              @endif
          @endforeach
      </ul>
    </div>
  @endif 
</form>
<style>
    body {
        background-color: #f9fafb; 
    }
</style>
