<?php


use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layouts.app');
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/aanbieden', [CarsController::class, 'offerStep1'])->name('cars.offer.step1');
    Route::post('/aanbieden', [CarsController::class, 'processStep1'])->name('cars.offer.step1.process');
    Route::get('/aanbieden/stap-2', [CarsController::class, 'offerStep2'])->name('cars.offer.step2');
    Route::post('/aanbieden/stap-2', [CarsController::class, 'processStep2'])->name('cars.offer.step2.process');
    Route::get('/cars', [CarsController::class, 'index'])->name('cars.index');
    Route::delete('/cars/{id}', [CarsController::class, 'delete'])->name('cars.delete');

});


require __DIR__.'/auth.php';