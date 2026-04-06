<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/hardware_items', [App\Http\Controllers\HardwareItemsController::class, 'index'])->name('hardware_items.index');
Route::get('hardware_items/create', [\App\Http\Controllers\HardwareItemsController::class, 'create'])->name('hardware_items.create');
Route::post('hardware_items', [\App\Http\Controllers\HardwareItemsController::class, 'store'])->name('hardware_items.store');
Route::get('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'show'])->name('hardware_items.show');
Route::get('hardware_items/{hardwareItem}/edit', [\App\Http\Controllers\HardwareItemsController::class, 'edit'])->name('hardware_items.edit');
Route::put('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'update'])->name('hardware_items.update');
Route::delete('hardware_items/{hardwareItem}', [\App\Http\Controllers\HardwareItemsController::class, 'destroy'])->name('hardware_items.destroy');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
Route::get('categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/loans', [App\Http\Controllers\LoansController::class, 'index'])->name('loans.index');
Route::get('/loans/pending', [App\Http\Controllers\LoansController::class, 'pendingLoans'])->name('loans.pending');
Route::get('/loans/accepteert/{loan}', [App\Http\Controllers\LoansController::class, 'accepteert'])->name('loans.accepteert');
Route::get('/loans/{loan}/reject', [App\Http\Controllers\LoansController::class, 'rejectForm'])->name('loans.reject-form');
Route::post('/loans/{loan}/reject', [App\Http\Controllers\LoansController::class, 'reject'])->name('loans.reject');
Route::post('/loans/check-overdue', [App\Http\Controllers\LoansController::class, 'markOverdue'])
    ->name('loans.checkOverdue');
Route::get('loans/create', [\App\Http\Controllers\LoansController::class, 'create'])->name('loans.create');
Route::post('loans', [\App\Http\Controllers\LoansController::class, 'store'])->name('loans.store');
Route::get('loans/{loan}', [\App\Http\Controllers\LoansController::class, 'show'])->name('loans.show');
Route::get('loans/{loan}/edit', [\App\Http\Controllers\LoansController::class, 'edit'])->name('loans.edit');
Route::put('loans/{loan}', [\App\Http\Controllers\LoansController::class, 'update'])->name('loans.update');
Route::delete('loans/{loan}', [\App\Http\Controllers\LoansController::class, 'destroy'])->name('loans.destroy');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('users/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy'); 

Route::get('/send-test-mail', function () {
    $recipient = 'test@example.com';
    
    // De eigenlijke verzending
    Mail::to($recipient)->send(new DemoMail(auth()->user()->name));

    return "Check je Mailtrap inbox! De mail is onderweg.";
});
require __DIR__.'/auth.php';
