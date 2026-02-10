<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hardware_items', [App\Http\Controllers\HardwareItemsController::class, 'index'])->name('hardware_items.index');
Route::get('hardware_items/{HardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'show'])->name('hardware_items.show'); 