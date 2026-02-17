<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hardware_items', [App\Http\Controllers\HardwareItemsController::class, 'index'])->name('hardware_items.index');
Route::get('hardware_items/create', [\App\Http\Controllers\HardwareItemsController::class, 'create'])->name('hardware_items.create');
Route::post('hardware_items', [\App\Http\Controllers\HardwareItemsController::class, 'store'])->name('hardware_items.store');
Route::get('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'show'])->name('hardware_items.show'); 
Route::get('hardware_items/{hardwareItem}/edit', [\App\Http\Controllers\HardwareItemsController::class, 'edit'])->name('hardware_items.edit');
Route::put('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'update'])->name('hardware_items.update');
Route::delete('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'destroy'])->name('hardware_items.destroy');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
Route::get('categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::get('categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::put('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/loans', [App\Http\Controllers\LoansController::class, 'index'])->name('loans.index');
Route::get('loans/{loan}', [\App\Http\Controllers\LoansController::class, 'show'])->name('loans.show');
Route::get('loans/{loan}/edit', [\App\Http\Controllers\LoansController::class, 'edit'])->name('loans.edit');
Route::get('loans/create', [\App\Http\Controllers\LoansController::class, 'create'])->name('loans.create');
Route::put('loans/{loan}', [\App\Http\Controllers\LoansController::class, 'update'])->name('loans.update');
Route::delete('loans/{loan}', [\App\Http\Controllers\LoansController::class, 'destroy'])->name('loans.destroy');
