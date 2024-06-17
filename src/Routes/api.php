<?php

use Illuminate\Support\Facades\Route;
use Modules\Mismar\Controllers\Api\MismarController;

Route::prefix('api/v1/mismar')->group(function () {
    Route::get('/', [MismarController::class, 'index']);
    Route::get('/{id}', [MismarController::class, 'show']);
    Route::post('/', [MismarController::class, 'store']);
    Route::put('/{id}', [MismarController::class, 'update']);
    Route::delete('/{id}', [MismarController::class, 'destroy']);
});
