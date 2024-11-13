<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use App\Http\Controllers\EntregasController;
use App\Models\Entrega;


Route::post('/logout', function () {
    Auth::logout();
    return redirect('http://127.0.0.1:8000/login');
})->name('logout');

Route::get('/', function () {
    return view('auth/login');
});

Route::get('dash', function () {
    return view('welcome');
})->name('dash');

Route::get('/dashboard', function () {
    $productos=Producto::all();
    return view('home', ['productos'=>$productos]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('home', function () {
    return view('home');});
    Route::get('vistaProductos', function () {
        return view('vistaProductos');
    });

    Route::get('entregas', function () {
        return view('entregas');
    });
    Route::get('stock', function () {
        return view('stock');
    });
    Route::get('agregarProducto', function () {
        return view('agregarProducto');
    });

    Route::get('ordenes', function () {
        return view('ordenes');
    });

    Route::post('/entregar', [EntregasController::class, 'storeEntrega'])->name('entregar.store');
    Route::get('/entregas', [EntregasController::class, 'index'])->name('entregas.index');
    Route::get('/entregas', [EntregasController::class, 'index'])->name('entregas');

    Route::post('/guardar-y-generar-pdf', [EntregasController::class, 'guardarYGenerarPDF'])->name('guardar_y_generar_pdf');
    Route::get('/vista-previa-pdf', [EntregasController::class, 'vistaPreviaPDF'])->name('vista_previa_pdf');

    Route::get('/stock', [ProductoController::class, 'mostrarProductos'])->name('productos.index');


    Route::get('/producto/crear', [ProductoController::class, 'create'])->name('producto.create');
    Route::post('/producto', [ProductoController::class, 'storeProducto'])->name('producto.storeProducto');

    Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');

    Route::delete('entregas/{id}', [ProductoController::class, 'destroy'])->name('entregas.destroy');





});




require __DIR__.'/auth.php';



