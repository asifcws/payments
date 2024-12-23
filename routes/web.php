<?php

use Cws\Payments\Http\Controllers\PaymentsController;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'payments',
        'namespace'  => '\Cws\Payments\Http\Controllers',
        'middleware' => [
            SubstituteBindings::class,
        ],
    ],
    function () {
        Route::any('callback/{payment}', [PaymentsController::class, 'callback'])->name('payments.callback');
    }
);