<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix' => ''], function () {
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
        Route::get('/{id}', [OrderController::class, 'show'])->name('orders.show');
    });
})->middleware(['auth', 'can:is_user']);


Route::group(['prefix' => 'admin'], function () {

})->middleware(['auth', 'can:is_admin']);