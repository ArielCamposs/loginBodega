<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Bodega</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.authUserName = @json(Auth::user()->name);
    </script>
    
    

</head>
<body>
<header>
  <nav class="flex flex-wrap justify-start items-center  bg-gray-100 border-gray-200 dark:bg-gray-900 dark:border-gray-700 mx-auto">
    <div class="flex items-center">
      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z" clip-rule="evenodd"/>
      </svg>
      <a href="#" class="flex text-lg font-bold  text-gray-900 dark:text-white">Bodega</a>
    </div>
      <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar
          <span class="sr-only">Abrir Menú</span>
          <svg class="w-5 h-5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul class="flex flex-col font-medium p-2 md:p-0 mt-2 border border-gray-200 rounded-lg bg-gray-50 md:space-x-3 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-gray-100 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <svg class="w-6 h-6 text-gray-800 dark:text-white mr-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5"/>
              </svg>              
            <li class=" bg-gray-100" >
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Inventario |</a>
              </li>
              <svg class="w-[20px] h-[18px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 20">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
              </svg>              
          <li class=" bg-gray-100">
            <a href="/agregarProducto" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Agregar Producto |</a>
          </li>
          <svg class="w-[26px] h-[26px] text-green-400 bg-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M5 4a2 2 0 0 0-2 2v1h10.968l-1.9-2.28A2 2 0 0 0 10.532 4H5ZM3 19V9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm9-8.5a1 1 0 0 1 1 1V13h1.5a1 1 0 1 1 0 2H13v1.5a1 1 0 1 1-2 0V15H9.5a1 1 0 1 1 0-2H11v-1.5a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
          </svg>          
          <li class=" bg-gray-100">
              <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Ord. Compra<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg></button>
              <!-- Dropdown menu -->
              <div id="dropdownNavbar" class="absolute z-10 hidden font-normal bg-gray-100 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li class=" bg-gray-100">
                      <a href="/ordenes" class="block px-4 py-2 hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white">Realizar orden</a>
                    </li>
                    <li class=" bg-gray-100">
                      <a href="#" class="block px-4 py-2 hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white">Ver ordenes</a>
                    </li>
                  </ul>
              </div>
          </li>
          <li class=" bg-gray-100">
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">|</a>
          </li>
          <svg class="w-[20px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 20">
            <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.293l-2-2a1 1 0 0 0-1.414 1.414l.293.293h-6.586a1 1 0 1 0 0 2h6.586l-.293.293A1 1 0 0 0 18 16.707l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
          </svg>
          <li class=" bg-gray-100">
            <a href="/entregas" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Entregas |</a>
          </li>
          <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.5em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M2.97 12.92A2 2 0 0 0 2 14.63v3.24a2 2 0 0 0 .97 1.71l3 1.8a2 2 0 0 0 2.06 0L12 19v-5.5l-5-3zM7 16.5l-4.74-2.85M7 16.5l5-3m-5 3v5.17m5-8.17V19l3.97 2.38a2 2 0 0 0 2.06 0l3-1.8a2 2 0 0 0 .97-1.71v-3.24a2 2 0 0 0-.97-1.71L17 10.5zm5 3l-5-3m5 3l4.74-2.85M17 16.5v5.17"/><path d="M7.97 4.42A2 2 0 0 0 7 6.13v4.37l5 3l5-3V6.13a2 2 0 0 0-.97-1.71l-3-1.8a2 2 0 0 0-2.06 0zM12 8L7.26 5.15M12 8l4.74-2.85M12 13.5V8"/></g></svg>
          <li class=" bg-gray-100"> 
            <a href="/stock" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Stock |</a>
          </li>
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
          </svg>          
          <li class=" bg-gray-100">
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Listados |</a>
          </li>
          <svg class="h-6 w-5 text-neutral-900"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" /></svg>
          <li class=" bg-gray-100">
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Mantenedor |</a>
          </li>
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
          </svg>          
          <li class=" bg-gray-100">
            <a href="#" id="registrarusuario" name="registrarusuario" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Registrar usuario |</a>
          </li>
          <li class="flex items-end">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 25 25" id="Person-Fill--Streamline-Rounded-Fill---Material-Symbols" height="25" width="25"><path fill="#000000" d="M12 11.9751c-1.1 0 -2 -0.35 -2.7 -1.05 -0.7 -0.7 -1.05 -1.6 -1.05 -2.7s0.35 -2 1.05 -2.7c0.7 -0.7 1.6 -1.05 2.7 -1.05s2 0.35 2.7 1.05c0.7 0.7 1.05 1.6 1.05 2.7s-0.35 2 -1.05 2.7c-0.7 0.7 -1.6 1.05 -2.7 1.05Zm-8 6.525v-0.85c0 -0.63335 0.158335 -1.175 0.475 -1.625 0.316665 -0.45 0.725 -0.79165 1.225 -1.025 1.11665 -0.5 2.1875 -0.875 3.2125 -1.125s2.05415 -0.375 3.0875 -0.375 2.05835 0.12915 3.075 0.3875c1.01665 0.25835 2.08335 0.62915 3.2 1.1125 0.51665 0.23335 0.93335 0.575 1.25 1.025 0.31665 0.45 0.475 0.99165 0.475 1.625v0.85c0 0.41665 -0.14585 0.77085 -0.4375 1.0625 -0.29165 0.29165 -0.64585 0.4375 -1.0625 0.4375H5.5c-0.41665 0 -0.770835 -0.14585 -1.0625 -0.4375 -0.291665 -0.29165 -0.4375 -0.64585 -0.4375 -1.0625Z" stroke-width="1"></path></svg>
            {{ Auth::user()->name }}
            <a href="#" id="cerrar-sesion">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 25 25" id="Logout-Fill--Streamline-Rounded-Fill---Material-Symbols" height="25" width="25"><path fill="#000000" d="M4.5 21c-0.4 0 -0.75 -0.15 -1.05 -0.45 -0.3 -0.3 -0.45 -0.65 -0.45 -1.05V4.5c0 -0.4 0.15 -0.75 0.45 -1.05C3.75 3.15 4.1 3 4.5 3h6.725c0.2125 0 0.39065 0.072335 0.5345 0.217 0.14365 0.1445 0.2155 0.323665 0.2155 0.5375 0 0.213665 -0.07185 0.391335 -0.2155 0.533 -0.14385 0.141665 -0.322 0.2125 -0.5345 0.2125H4.5v15h6.725c0.2125 0 0.39065 0.07235 0.5345 0.217 0.14365 0.1445 0.2155 0.32365 0.2155 0.5375 0 0.21365 -0.07185 0.39135 -0.2155 0.533 -0.14385 0.14165 -0.322 0.2125 -0.5345 0.2125H4.5Zm13.625 -8.25H9.75c-0.2125 0 -0.3906 -0.07235 -0.53425 -0.217 -0.14385 -0.1445 -0.21575 -0.32365 -0.21575 -0.5375 0 -0.21365 0.0719 -0.39135 0.21575 -0.533 0.14365 -0.14165 0.32175 -0.2125 0.53425 -0.2125h8.325l-2.025 -2.025c-0.15 -0.15 -0.22085 -0.325 -0.2125 -0.525 0.00835 -0.2 0.0875 -0.375 0.2375 -0.525 0.15 -0.15 0.32915 -0.225 0.5375 -0.225 0.20835 0 0.3875 0.075 0.5375 0.225L20.475 11.5c0.15 0.15 0.225 0.325 0.225 0.525s-0.075 0.375 -0.225 0.525l-3.3 3.3c-0.14665 0.15 -0.32085 0.22085 -0.5225 0.2125 -0.20165 -0.00835 -0.38075 -0.0875 -0.53725 -0.2375 -0.1435 -0.15 -0.21525 -0.32915 -0.21525 -0.5375 0 -0.20835 0.075 -0.3875 0.225 -0.5375l2 -2Z" stroke-width="1"></path></svg>
            </a>
            </li> 
            
        </li>
        
          
        </ul>
      </div>
    </div>
  </nav>   
</header>
  

<form id="entregaForm" action="{{ route('entregar.store') }}" method="POST">
  @csrf
<h1 class="titulo flex px-20 text-2xl">Entrega Materiales..<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M16.78 21.84a1.998 1.998 0 1 1-1.56-3.68a1.998 1.998 0 1 1 1.56 3.68M7.62 6c1.11 0 2-.89 2-2a2 2 0 0 0-2-2c-1.12 0-2 .9-2 2c0 1.11.88 2 2 2m14.43 10.34L18.2 18c.22.22.42.5.56.82c.14.33.2.68.24 1l3.83-1.64zM10.16 8.78l.74 1.81c-.24-.09-.46-.21-.64-.33c-.6-.39-1.04-.88-1.33-1.46l-.74-1.57c-.19-.35-.42-.61-.74-.79c-.29-.17-.6-.26-.92-.26s-.62.08-.91.22c-1.4 1.1-1.75 3.14-1.75 3.14l-.34 1.57c-.09.52-.14 1.04-.14 1.57v4.96L1 20.87L2.5 22l2.77-3.75l.17-3.25l1.68 2.34V22h1.85v-6.06l-1.85-2.61v-.65c0-.44 0-.87.11-1.29l.35-1.2c.38.55.84 1.03 1.39 1.44c.45.34 1.71.94 2.9 1.23L14 17.8c.22-.22.5-.42.83-.56c.32-.14.67-.2.99-.24L12 8zm5.2 3.34l1.96 4.6l5.63-2.41L21 9.72"/></svg></h1>
<div class="form-container px-20"> 
    <div class="form-group">
      <label for="departamento" class="block text-sm font-medium leading-6 text-gray-900">Departamento</label>
      <select id="departamento" name="departamento" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
        <option value="">Seleccione un departamento..</option>
        <option>Informática</option>
        <option>Salud</option>
        <option>Administración</option>
        <option>Omil</option>
        <option>Vivienda</option>
        <option>Transporte</option>
        <option>Secretaria</option>
      </select>
      
    </div>
    <div class="form-group">
      <label for="solicitante" class="block text-sm font-medium leading-6 text-gray-900">Solicitante</label>
      <input type="text" id="solicitante" name="solicitante" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
    </div>
    <div class="form-group">
      <label for="encargado" class="block text-sm font-medium leading-6 text-gray-900">Entregado por</label>
      <input type="text" id="encargado" name="encargado" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
    </div>
    <div class="form-group">
      <label for="fecha" class="block text-sm font-medium leading-6 text-gray-900">Fecha y hora de entrega</label>
      <input type="date" id="fecha" name="fecha" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
    </div>
  </div>

<div class="form-group px-20">
  <label for="comentarios" class="block text-sm font-medium leading-6 text-gray-900">Observación</label>
  <textarea id="observacion" name="observacion" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300"></textarea>
</div>

<div class="form-group px-20">
  <label for="productos" class="flex text-sm font-medium leading-6 text-gray-900">Selección de productos<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="black" d="M5.1 4.8a.499.499 0 0 1 .471-.795a.5.5 0 0 1 .329.195L8 7V.5a.5.5 0 0 1 .5-.5a.5.5 0 0 1 .5.5V7l2.1-2.8a.501.501 0 0 1 .895.229a.5.5 0 0 1-.095.371l-3 4c-.006.008-.017.012-.024.02a.5.5 0 0 1-.116.1a.3.3 0 0 1-.05.034a.47.47 0 0 1-.42 0a.3.3 0 0 1-.05-.034a.5.5 0 0 1-.116-.1c-.007-.008-.018-.012-.024-.02zm.65 9.95a1.245 1.245 0 0 1-.772 1.154a1.252 1.252 0 0 1-1.704-.91a1.25 1.25 0 1 1 2.475-.245zm8 0a1.245 1.245 0 0 1-.772 1.154a1.252 1.252 0 0 1-1.704-.91a1.249 1.249 0 1 1 2.475-.245zM14 5.5a.5.5 0 0 0-.5.5l-.5 4H4.09l-1.1-6.58a.5.5 0 0 0-.49-.418h-1a.5.5 0 0 0-.5.5a.5.5 0 0 0 .5.5h.576l1.43 8.58a.496.496 0 0 0 .493.418h9a.5.5 0 0 0 0-1h-8.58l-.167-1h8.74a1 1 0 0 0 .992-.876l.508-4.12a.5.5 0 0 0-.5-.5z"/></svg></label>
  <input type="text" id="productosInput" name="productosInput" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" autocomplete="on">
  <div class="container mx-auto">
        <select id="productoSelect" name="productoSelect" size="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @foreach($productos as $producto)
          <option value="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}" data-cantidad="{{ $producto->cantidad }}">
            ID: {{ $producto->id }} - Producto: {{ $producto->nombre }} - Cantidad: {{ $producto->cantidad }}</option>
          @endforeach
        </select>
</div>
  
  <table id="productosTabla" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="py-3 px-6 style="text-align: right;"">Nombre Encargado</th>
        <th scope="col" class="py-3 px-6 style="text-align: right;"">ID</th>
        <th scope="col" class="py-3 px-6 style="text-align: right;"">Nombre</th>
        <th scope="col" class="py-3 px-6 style="text-align: right;"">Cantidad</th>
        <th scope="col" class="py-3 px-6 style="text-align: right;"">Eliminar</th>
      </tr>
    </thead>
    <tbody id="productos-seleccionados">
      

    </tbody>
  </table>


<br>
<br>
<button type="button" id="agregarBtn" name="agregarBtn" class="flex text-green-500 bg-white border border-green-500 focus:outline-none hover:bg-gray-200 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Agregar...<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.4 -0.4 20 20" id="Amazon-Web-Service-Marketplace-Cart--Streamline-Ultimate" height="20" width="20"><desc>Amazon Web Service Marketplace Cart Streamline Icon: https://streamlinehq.com</desc><path stroke="#1b7e29" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M5.080008 18.31984c0.839472 0 1.5199920000000002 -0.6804800000000001 1.5199920000000002 -1.52 0 -0.83944 -0.68052 -1.51992 -1.5199920000000002 -1.51992s-1.52 0.6804800000000001 -1.52 1.51992c0 0.8395200000000002 0.680528 1.52 1.52 1.52Z" stroke-width="0.8"></path><path stroke="#1b7e29" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M11.08 18.31984c0.83944 0 1.52 -0.6804800000000001 1.52 -1.52 0 -0.83944 -0.68056 -1.51992 -1.52 -1.51992s-1.52 0.6804800000000001 -1.52 1.51992c0 0.8395200000000002 0.68056 1.52 1.52 1.52Z" stroke-width="0.8"></path><path stroke="#1b7e29" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="m0.6000000000000001 5.679880000000001 1.840016 6.31996c0.16000000000000003 0.5599999999999999 0.639992 0.8800800000000001 1.119992 0.8800800000000001H12.200000000000001c0.5599999999999999 0 1.04 -0.40008 1.1199999999999999 -0.8800800000000001l2.5600000000000005 -9.759968c0.24 -0.8 0.96 -1.359992 1.7600000000000002 -1.359992h0.96" stroke-width="0.8"></path><path stroke="#1b7e29" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="m11.079920000000001 8.879600000000002 -3.119984 1.7599200000000002 -3.119992 -1.7599200000000002V5.519552000000001l3.119992 -1.7599840000000002 3.119984 1.7599840000000002v3.360048Z" stroke-width="0.8"></path><path stroke="#1b7e29" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="m11.079920000000001 5.519728000000001 -3.119984 1.6800000000000002 -3.119992 -1.6800000000000002" stroke-width="0.8"></path><path stroke="#1b7e29" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M7.95996 7.199808000000001v3.3600320000000004" stroke-width="0.8"></path></svg></button>
 <br>
 <button type="button" id="entregarBtn" name="entregarBtn" class="flex text-white bg-green-500 border border-green-500 focus:outline-none hover:bg-green-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Entregar...<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M16.78 21.84a1.998 1.998 0 1 1-1.56-3.68a1.998 1.998 0 1 1 1.56 3.68M7.62 6c1.11 0 2-.89 2-2a2 2 0 0 0-2-2c-1.12 0-2 .9-2 2c0 1.11.88 2 2 2m14.43 10.34L18.2 18c.22.22.42.5.56.82c.14.33.2.68.24 1l3.83-1.64zM10.16 8.78l.74 1.81c-.24-.09-.46-.21-.64-.33c-.6-.39-1.04-.88-1.33-1.46l-.74-1.57c-.19-.35-.42-.61-.74-.79c-.29-.17-.6-.26-.92-.26s-.62.08-.91.22c-1.4 1.1-1.75 3.14-1.75 3.14l-.34 1.57c-.09.52-.14 1.04-.14 1.57v4.96L1 20.87L2.5 22l2.77-3.75l.17-3.25l1.68 2.34V22h1.85v-6.06l-1.85-2.61v-.65c0-.44 0-.87.11-1.29l.35-1.2c.38.55.84 1.03 1.39 1.44c.45.34 1.71.94 2.9 1.23L14 17.8c.22-.22.5-.42.83-.56c.32-.14.67-.2.99-.24L12 8zm5.2 3.34l1.96 4.6l5.63-2.41L21 9.72"/></svg></button>
</div>
<script src="js/script.js"></script>
</form>
</body>
</html>
