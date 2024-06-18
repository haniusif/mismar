<?php

use Illuminate\Support\Facades\Route;
use Modules\Mismar\Controllers\Api\MismarController;

Route::prefix('v1/staging')->middleware('mismar.staging.auth')->group(function () {
    Route::apiResource('orders', MismarController::class);
    Route::get('orders/{order_id}/cancel', [MismarController::class, 'cancel_order'])->name('mismar.orders.cancel');
    Route::get('orders/{order_id}/change_order_time', [MismarController::class, 'change_order_time'])->name('mismar.orders.change_order_time');
});

Route::prefix('v1/live')->middleware('mismar.auth')->group(function () {
    Route::apiResource('orders', MismarController::class);
    Route::get('orders/{order_id}/cancel', [MismarController::class, 'cancel_order'])->name('mismar.orders.cancel');
    Route::get('orders/{order_id}/change_order_time', [MismarController::class, 'change_order_time'])->name('mismar.orders.change_order_time');
});
