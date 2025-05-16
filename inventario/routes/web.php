<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inventory;
use App\Http\Controllers\Departures;
use App\Http\Controllers\HistoryInv;

// Login personalizado

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/ViewInventory', function () {
    return view('inventory.ViewInventory');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // Rutas del primero modulo
    // Ruta para ver el inventario (index)
    Route::get('/ViewInventory', [Inventory::class, 'index'])->name('inventory.ViewInventory');

    // Ruta para mostrar un producto específico (show)
    Route::get('/ViewInventory/{producto}', [Inventory::class, 'show'])->name('inventory.show');

    // Ruta para mostrar un producto específico (store)
    Route::get('inventory/create', [Inventory::class, 'create'])->name('inventory.create');

    // En routes/web.php
    Route::post('inventory/store', [Inventory::class, 'store'])->name('inventory.store');

    // Ruta para editar un producto específico (update)
    Route::get('/ViewInventory/{producto}/update', [Inventory::class, 'update'])->name('inventory.update');

    // Ruta para eliminar un producto específico (destroy)
    Route::delete('/ViewInventory/{producto}', [Inventory::class, 'destroy'])->name('inventory.destroy');


    //Rutas para el segundo modulo

    // Ruta para ver el inventario (index)
    Route::get('/ViewDepartures', [Departures::class, 'index'])->name('inventory.ViewDepartures');
    Route::get('/ViewDepartures/{producto}', [Departures::class, 'show'])->name('inventory.show');

    // Ruta para mostrar el formulario de salida 
    Route::get('departures/departuresproduct/{id}', [Departures::class, 'departuresproduct'])->name('departure.departuresproduct');

    // Ruta para procesar la salida
    Route::post('departures/store/{id}', [Departures::class, 'store'])->name('departure.store');

    //Rutas para el tercer modulo

    // Ruta para ver el inventario (index)
    Route::get('/ViewHistory', [HistoryInv::class, 'index'])->name('inventory.ViewHistory');

    // Ruta para mostrar un producto específico (show)
    Route::get('/ViewHistory/{producto}', [HistoryInv::class, 'show'])->name('history.show');
});

