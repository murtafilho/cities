<?php


use App\Http\Controllers\ProblemaController;

Route::get('/', [ProblemaController::class, 'index'])->name('problemas.index');
Route::get('/problemas/create', [ProblemaController::class, 'create'])->name('problemas.create');
Route::post('/problemas', [ProblemaController::class, 'store'])->name('problemas.store');
Route::get('/problemas/{problema}', [ProblemaController::class, 'show'])->name('problemas.show');
Route::get('/problemas/{problema}/edit', [ProblemaController::class, 'edit'])->name('problemas.edit');
Route::put('/problemas/{problema}', [ProblemaController::class, 'update'])->name('problemas.update');
Route::delete('/problemas/{problema}', [ProblemaController::class, 'destroy'])->name('problemas.destroy');
