<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hardware_items', [App\Http\Controllers\HardwareItemsController::class, 'index'])->name('hardware_items.index');
Route::get('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'show'])->name('hardware_items.show'); 
Route::get('hardware_items/{hardwareItem}/edit', [\App\Http\Controllers\HardwareItemsController::class, 'edit'])->name('hardware_items.edit');
Route::get('hardware_items/create', [\App\Http\Controllers\HardwareItemsController::class, 'create'])->name('hardware_items.create');
Route::put('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'update'])->name('hardware_items.update');
Route::delete('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'destroy'])->name('hardware_items.destroy');