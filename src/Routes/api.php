<?php

use Illuminate\Support\Facades\Route;
use Modules\Mismar\Controllers\Api\MismarController;

Route::prefix('v1/staging')->middleware('mismar.staging.auth')->group(function () {
    Route::apiResource('orders', MismarController::class);
    Route::post('orders/{order_id}/change_location', [MismarController::class, 'change_order_location'])->name('mismar.staging.orders.change_location');
    Route::post('orders/{order_id}/change_time', [MismarController::class, 'change_order_time'])->name('mismar.orders.staging.change_time');
    Route::get('orders/{order_id}/cancel', [MismarController::class, 'cancel_order'])->name('mismar.staging.orders.cancel');
});

Route::prefix('v1/live')->middleware('mismar.auth')->group(function () {
    Route::apiResource('orders', MismarController::class);
    Route::post('orders/{order_id}/change_location', [MismarController::class, 'change_order_location'])->name('mismar.orders.change_location');
    Route::post('orders/{order_id}/change_time', [MismarController::class, 'change_order_time'])->name('mismar.orders.change_time');
    Route::get('orders/{order_id}/cancel', [MismarController::class, 'cancel_order'])->name('mismar.orders.cancel');
});
